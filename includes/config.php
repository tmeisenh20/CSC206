<?php
/**
 * Define the database connection constants
 **/
if (! defined('DB_HOST'))       {define('DB_HOST', '127.0.0.1');}
if (! defined('DB_DATABASE'))   {define('DB_DATABASE', 'csc206'); }
if (! defined('DB_USERNAME'))   {define('DB_USERNAME', 'CSC206'); }
if (! defined('DB_PASSWORD'))   {define('DB_PASSWORD', 'Geneva2018'); }
/**
 * These constants point to various places in the filesystem where you will store certain
 * types of files. For you windows / graphical people these are the folders that you see in
 * windows explorer or in the navigation pane in PHPStorm.  These locations will be used in your PHP
 * files to include other files.
 *
 * The following descriptions assume that your code is stored in C:\xampp\htdocs and your
 * web pages are in C:\xampp\htdocs\public (This is the structure that I mandated in class.)
 *
 * FS_ROOT - This is the root (base) directory of our entire application and makes use of the SERVER
 * array $_SERVER defined by our apache configuration.
 *
 * In our Apache configuration we defined DOCUMENT_ROOT as C:\xampp\htdocs\public.  This is where the
 * server is looking for the web pages (html or PHP) that we want to render.  In order to access our
 * include directory and our templates directory, we need to "back up" one level since these two directories
 * are on the same level as public.
 *
 * For more info on the "dot" in computer software, read this short article :
 *
 *     http://www.linfo.org/dot.html
 *
 * FS_ROOT is defined as C:\xampp\htdocs\public/../  which equates to C:\xampp\htdocs\
 *
 * FS_INCLUDES is defined as FS_ROOT + includes/  OR  C:\xampp\htdocs\includes/
 *
 * FS_TEMPLATES is defined as FS_ROOT + includes/  OR  C:\xampp\htdocs\templates/
 *
$_SERVER['DOCUMENT_ROOT']  = 'D:/GenevaCode/CSC206/public'
 */
if (! defined('FS_ROOT')) define('FS_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/../');
if (! defined('FS_INCLUDES')) define('FS_INCLUDES',  FS_ROOT.'includes/');
if (! defined('FS_TEMPLATES')) define('FS_TEMPLATES', FS_ROOT . 'templates/');
/**
 * These constants define various locations on your website from your web browser's perspective and will
 * be used in your HTML to make finding images, CSS and eventually javaScript easier.  We never want to
 * hardcode paths into our code as they may change.
 *
 * WS_ROOT is the root of your web site.  In our case this will equate to http://localhost/
 *
 * WC_CSS is where your custom CSS files reside.  The URL to get to these CSS files would become:
 *      http://localhost/assets/css/
 *
 * WS_IMAGES is where your image files reside.  The URL to get to these images would become:
 *      http://localhost/assets/images/
 *
 */
if (! defined('WS_ROOT')) define('WS_ROOT', '/');
if (! defined('WS_CSS')) define('WS_CSS', '/assets/css/');
if (! defined('WS_IMAGES')) define('WS_IMAGES', '/assets/images/');