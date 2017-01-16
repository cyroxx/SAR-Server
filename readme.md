SEA WATCH APP [![Build Status](https://travis-ci.org/sea-watch/SAR-Server.svg?branch=master)](https://travis-ci.org/sea-watch/SAR-Server)
===================

About this Project
---------------------
This Application shall be used to organize emergency calls to a coordination center which can send the emergency calls to a rescue team.

This repo contains the adminstration backend and the database. 

There is also:

-  a "client application" for the vessels. It is used to store new cases, show the positions of the vehicles on an offline map and to organize the communcation between the different SAR vessels. It can be found [here](https://github.com/sea-watch/swCommand-Desktop-Client)

*The app is build with [github electrion](https://github.com/electron/electron) to support as many systems as possible.* 

A short description of features which need to be implemented can be found [here](./docu/idea.md').

For background and development infos [see here](./docu/dev_informations.md).

Requirements
----------------

- PHP >= 5.5.9
- OpenSSL PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- MySQL

*The backend is build with [Laravel 5](https://github.com/laravel/laravel) and is based on [Laravel Framework 5.1 Bootstrap 3 Starter Site](https://github.com/mrakodol/Laravel-5-Bootstrap-3-Starter-Site).*


Installation
----------------

The installation guide can be found here [see here](./docu/installation.md).


Contributing
---------------

You want to contribute to this project? Just write a mail to nic@sea-watch.org 


More...
--------
... docu can be found in **docu/**

