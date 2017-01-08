# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure('2') do |config|
  config.vm.box = 'boxcutter/ubuntu1604'

  config.vm.network 'forwarded_port', guest: 80, host: 8080

  config.vm.provider "virtualbox" do |vb|
    vb.memory = '512'
  end

  config.vm.provision 'shell', path: 'script/vagrant-provision.sh'
end
