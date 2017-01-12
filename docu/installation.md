How to install
--------------------

### Step 1: Get the Source Code:

You can download https://github.com/sea-watch/SAR-Server/archive/master.zip and unzip it in your www or htdocs folder.


Or just clone this Repo
### Step 2: Use Composer to install dependencies

Laravel utilizes [Composer](http://getcomposer.org/) to manage its dependencies. First, download a copy of the composer.phar.
Once you have the PHAR archive, you can either keep it in your local project directory or move to
usr/local/bin to use it globally on your system.
On Windows, you can use the Composer [Windows installer](https://getcomposer.org/Composer-Setup.exe).

Enter the admin/ directory and run:

    composer dump-autoload
    composer install --no-scripts


### Step 3: Create a Database on your Server with uft8_general_ci

### Step 4: Update the .env file to your local settings

### Step 5: Generate Application Key

Laravel needs an application key. In order to generate it, switch to the admin directory and type:

php artisan key:generate

### Step 5: DB Migration

Go to the admin directory and type

    php artisan migrate
    php artisan db:seed

### Step 6: Change URLS

In
    admin/public/js/config.js


### Apache Config

You need to enable AllowOverride for your DocumentRoot. If you don't do that, then .htaccess has no effect on mod_rewrite.


        <VirtualHost *:80>
            ServerAdmin webmaster@localhost
            DocumentRoot /var/www/sea-watch-app/admin/public

            ErrorLog ${APACHE_LOG_DIR}/error.log
            CustomLog ${APACHE_LOG_DIR}/access.log combined
            <Directory /var/www/sea-watch-app/admin/public>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
            </Directory>
         </VirtualHost>

Development & Test Environment with Vagrant
-------------------------------------------

Instead of executing all steps in [How to install][#how-to-install] you can also
create a development and test environment with [Vagrant](https://www.vagrantup.com/).

### Step 1: Install Vagrant

If you haven't installed Vagrant on your machine yet, please follow the
[Vagrant getting started guide](https://www.vagrantup.com/docs/getting-started/).


### Step 2: Clone the application

You have to clone this repository to your local machine.

    git clone https://github.com/sea-watch/sea-watch-app.git sea-watch-app

### Step 3: Start the virtual machine

Next you have to change into the checkout of the Git repository and start
the virtual machine via Vagrant.

    cd sea-watch-app
    vagrant up

This will install all dependencies, setup the Apache web server and setup
the [Laravel](https://laravel.com/) application.

### Step 4: Access the application

Now you can login to the application by pointing your web browser to [http://localhost:8080/](http://localhost:8080/).

