<?php
/*
 * Author: Miguel Olivares
 * Date: April 20th, 2020
 * Name: index.php
 * Description: calls config and since we are launching using this page will automatically direct is to the welcome page.
 */
//load application settings
require_once ("application/config.php");

//load autoloader will auto load all our class files do we can create new objects
require_once ("vendor/autoload.php");

//load the dispatcher that dissects a request URL Here we will call methods listed in the url and hide out directory.
new Dispatcher();

// Admin Login credentials will be Username: Admin and Password: Password