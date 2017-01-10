#!/bin/bash

# Provision script to bootstrap a Vagrant VM to develop and test the application.

# WARNING: This script prepares a virtual machine to run a DEVELOPMENT and
#          TEST environment. This is NOT suited for production use!
#          It uses simple hardcoded passwords or none at all!

set -e

composer_url="https://getcomposer.org/download/1.3.0/composer.phar"

# The user account inside the Vagrant VM.
vagrant_user="vagrant"

# Database name and credentials.
db_name="sar_server"
db_user="sar_server"
db_password="sar_server"

# All required PHP packages.
php_packages="php7.0 php7.0-cli php7.0-imap php7.0-mbstring php7.0-mysql php7.0-xml php7.0-zip"

# Ensure a sane environment.
export DEBIAN_FRONTEND=noninteractive
export PATH="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"


apt-get update
apt-get install -y $php_packages mysql-server git apache2 libapache2-mod-php7.0

a2enmod rewrite

# The Apache web server needs to run as the Vagrant user to be able to write
# the application logs and other data into `storage'.
sed -i -e "s,APACHE_RUN_USER=www-data,APACHE_RUN_USER=${vagrant_user},g" \
	-e "s,APACHE_RUN_GROUP=www-data,APACHE_RUN_GROUP=${vagrant_user},g" \
	/etc/apache2/envvars

cat <<__APACHE > /etc/apache2/sites-available/000-default.conf
<VirtualHost *:80>
	ServerAdmin webmaster@localhost
	DocumentRoot /vagrant/public

	ErrorLog /var/log/apache2/error.log
	CustomLog /var/log/apache2/access.log combined

	<Directory /vagrant/public/>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
__APACHE

systemctl restart apache2

# Create the MySQL database with the correct charset and create a user for
# the application.
mysql -u root -v -e "CREATE DATABASE IF NOT EXISTS ${db_name} DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;"
mysql -u root -v -e "GRANT ALL PRIVILEGES ON ${db_name}.* TO '${db_user}'@'localhost' IDENTIFIED BY '${db_password}';"

# Globally install the composer tool.
curl -o /usr/local/bin/composer -sL $composer_url
chmod +x /usr/local/bin/composer

# The following commands are all executed in the checkout directory of the app.
cd /vagrant

composer dump-autoload
composer install --no-scripts --no-progress

# Do not overwrite the .env file if it already exists to avoid overwriting
# custom settings on `vagrant provision'.
if [ ! -e .env ]; then
	install -o ${vagrant_user} -g ${vagrant_user} -m 600 .env.example .env
fi

# Add database settings to the .env file so the app can connect to MySQL.
sed -i -e "s,=homestead,=${db_name},g" -e "s,=secret,=${db_password},g" .env

# Only generate the key once.
if fgrep -q 'APP_KEY=SomeRandomString' .env; then
	php artisan key:generate
fi

php artisan migrate

# Only seed the database once.
user_count=$(mysql -u root -sN -e 'SELECT count(*) from users' ${db_name})
if [ $user_count -lt 1 ]; then
	php artisan db:seed
fi
