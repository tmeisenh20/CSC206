<?php

    require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');

    // Include the template files needed for the page
    require_once(FS_TEMPLATES . 'mainHeaderTemplate.php');
    require_once(FS_TEMPLATES . 'mainCardTemplate.php');
    require_once(FS_TEMPLATES . 'blogcontentcreator.php');
    require_once(FS_TEMPLATES . 'mainSidebarTemplate.php');
    require_once(FS_TEMPLATES . 'mainFooterTemplate.php');
    require_once (FS_INCLUDES . 'posts.php');


    // Load page header
    $header = new mainHeaderTemplate();
    echo $header->renderStatic();

?>
        <div class="container" >
        <div class="row">

<?php
    $Card = new mainCardTemplate();
    echo $Card->renderStatic();
?>

    <div class="container" >
    <div class="row">
        <div class="col-md-9 blog-main">
            <div class="row">
                <h3 class ="pb-3 mb-4 font-italic border-bottom">Most Recent Posts</h3>
            </div>
            <div class="row">

<?php
// Load mocked up page content
$posts = new Stories($db);
$data = $posts->getPosts();

$content = new blogcontentcreator();
echo $content->data($data)->renderList();
?>
            </div>
        </div>
        <div class="col-md-3">

<?php
        $Sidebar = new mainSidebarTemplate();
        echo $Sidebar->renderStatic();
?>
        </div>
    </div>
    </div>
        <hr>
    </div>

<?php
    $footer = new mainFooterTemplate();
    echo $footer->renderStatic();


