<?php

$requestType = $_SERVER['REQUEST_METHOD'];

// Load all application files and configurations

require($_SERVER['DOCUMENT_ROOT'] . '../../includes/application_includes.php');

// Include the HTML layout class
require_once(FS_TEMPLATES. 'mainHeaderTemplate.php');
require_once(FS_TEMPLATES .'loginTemplate.php');
require_once(FS_TEMPLATES .'mainFooterTemplate.php');

require_once(FS_INCLUDES. 'user.php');

$header = new mainHeaderTemplate();
echo $header->renderStatic();


if ($requestType == 'GET') {

    $form = new loginTemplate();
    echo $form->render();

} elseif ($requestType == 'POST') {

    $input = $_POST;



    $sql = "select * from users where email = '" . $input['email'] . "'";

    $result = $db->query($sql);

    if (!$result->size() == 0) {

        $users = $result->fetch();

        if (password_verify($input['password'], $users['password'])) {

            $_SESSION['user'] = $users;


            echo '<h1>You are logged in</h1>';

            header('Location: index.php');

        } else {

            echo '<h1>Invalid Password</h1>';

            echo '<h3>Please login again or go back to home</h3>';

        }
    } else {

        echo '<h1>User not found</h1>';

        echo '<h3>Please login again or go back to home</h3>';

    }
}

// Load page footer
$footer = new mainFooterTemplate();
echo $footer->renderStatic();
