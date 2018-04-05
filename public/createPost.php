<?php

$requestType = $_SERVER['REQUEST_METHOD'];

/* 	Start-up activities prior to loading the page content.  This will make a connection
 *	to the database and start a session.
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');

// Include the template files needed for the page
require_once(FS_TEMPLATES . 'mainHeaderTemplate.php');
require_once(FS_TEMPLATES . 'createPostTemplate.php');
require_once(FS_TEMPLATES . 'mainFooterTemplate.php');

// Include the Post class
require_once(FS_INCLUDES . 'posts.php');


// Load page header
$header = new mainHeaderTemplate();
echo $header->renderStatic();



    if ($requestType == 'GET') {

        // Show the Create Post Form
        $form = new createPostTemplate();
        echo $form->render();

    } else {

        $formData = $_POST;
        $formData['created_at'] = date('Y-m-d H:i:s', time());

        $u = new Stories($db);
        $r = $u->create($formData);
        header('Location: http://csc206dev.com/index.php');

    }



// Load page header
$footer = new mainFooterTemplate();
echo $footer->renderStatic();


