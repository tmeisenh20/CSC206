<?php

// Load all application files and configurations

require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');

// Include the HTML layout class

require_once(FS_TEMPLATES . 'mainHeaderTemplate.php');
require_once(FS_TEMPLATES . 'getPostsTemplate.php');
require_once(FS_TEMPLATES . 'mainFooterTemplate.php');
require_once (FS_INCLUDES . 'posts.php');


// Initialize variables

$requestType = $_SERVER['REQUEST_METHOD'];

$sql = 'select * from stories order by startDate DESC';

$posts = $db->query($sql);

// Run a simple query that will be rendered in column 2 below

$res = $db->query($sql);

// Generate the HTML for the top of the page

$header = new mainHeaderTemplate();
echo $header->renderStatic();

// Page content goes here

// Create the table Header

?>

    <div class="top10">

        <table align="center" class="table">

            <tr>

                <th>ID</th>

                <th>Title</th>

                <th>Content</th>

                <th>Start Date</th>

                <th>End Date</th>

            </tr>


            <?php

            // Loop through the posts and display them

            while ($post = $posts->fetch()) {

                // Call the method to create the layout for a post

                getPosts::story($post);

            }

            ?>

        </table>
    </div>
<?php

// Generate the page footer

$footer = new mainFooterTemplate();
echo $footer->renderStatic();

