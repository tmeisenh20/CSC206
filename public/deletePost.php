<?php

// Load all application files and configurations

require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');

// Include the HTML layout class
require_once(FS_TEMPLATES . 'mainHeaderTemplate.php');
require_once(FS_TEMPLATES . 'mainFooterTemplate.php');

// Include the Post class
require_once(FS_INCLUDES . 'posts.php');



// Initialize variables

$requestType = $_SERVER['REQUEST_METHOD'];

$sql = "delete from stories where id=" . $_GET['id'];
echo $sql;
$result = $db->query($sql);
header('Location: index.php');



// Generate the page footer

$footer = new mainFooterTemplate();
echo $footer->renderStatic();