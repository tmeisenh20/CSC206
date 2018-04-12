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

// Generate the HTML for the top of the page

$header = new mainHeaderTemplate();
echo $header->renderStatic();

// Page content goes here

?>

<div class="container top25">

    <!-- <div class="col-md-8"> -->

    <section class="content">



        <?php

        if ($requestType == 'GET') {

            $sql = 'select * from stories where id = ' . $_GET['id'];

            $result = $db->query($sql);

            $row = $result->fetch();

            $id = $row['id'];

            $title = $row['title'];

            $content = $row['content'];

            $startDate = $row['startDate'];

            $endDate = $row['endDate'];



            echo <<<postform

    <table align="center" class="table">

        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Start Date</th>
            <th>End Date</th>

        </tr>
        <tr>
        <th>$title</th>
        <th>$content</th>
        <th>$startDate</th>
        <th>$endDate</th>
        </tr>
        </table>



postform;

        } elseif ($requestType == 'POST') {

            //Validate data

            // Save data

            $id = $_POST['id'];

            $title = htmlspecialchars($_POST['title'], ENT_QUOTES);

            $content = htmlspecialchars($_POST['content'], ENT_QUOTES);



            //  echo '<pre>' . print_r($_POST) . '</pre>';

            $sql = "update stories set title = '$title', content = '$content' where id = $id;";

            $result = $db->query($sql);

        }

        ?>

<?php

// Generate the page footer

$footer = new mainFooterTemplate();
echo $footer->renderStatic();

?>