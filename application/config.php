<?php

/*
 * Author: Louie Zhu
 * Date: Mar 6, 2019
 * File: config.php
 * Description: set application settings
 * 
 */

//error reporting level: 0 to turn off all error reporting; E_ALL to report all
error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application
define("BASE_URL", "http://localhost/PHP-SQL--Bread-Blog-Site");

/*************************************************************************************
 *                       settings for recipes                                         *
 ************************************************************************************/

//define default path for media images
define("BREAD_IMG", "www/img/bread/");
define("COOKIE_IMG", "www/img/cookie/");
define("CAKE_IMG", "www/img/cake/");
