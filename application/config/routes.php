<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*echo $_SERVER['REQUEST_URI'];*/

 $url = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

   $default_controller = "web";
 	
    $controller_exceptions = array('admin');
   
   $route['default_controller'] = $default_controller;
  $route["^((?!\b".implode('\b|\b', $controller_exceptions)."\b).*)$"] = $default_controller.'/$1';
if (strpos($url,'admin') !== false) {
	
   $route['404_override'] = "admin/adminerror";
} else {
	
   $route['404_override'] = "web404error";
}


$route['translate_uri_dashes'] = TRUE;