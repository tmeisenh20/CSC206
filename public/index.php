<?php

class loginFeatures
{

    public static function LoggedIn()

    {
        $users = $_SESSION['user'];
        $x = '

        <div class="blog-masthead" >

        <div class="container" >

            <nav class="blog-nav" >

               <a class="blog-header-logo text-dark" href="index.php">What\'s Going On?</a>

                <a class="blog-nav-item" href = "createPost.php" >Create Post</a >

                <a class="blog-nav-item" href = "getPosts.php" >All Posts</a >

                <div class="blog-nav-item3">Hello, ' . $users['firstName'] . ' ' . $users['lastName'] .

            '</div><a class="blog-nav-item2" href="logoff.php">Logout</a>
            </nav >
        </div >
    </div >';
        return $x;
    }


    public static function LoggedOut()

    {
        $x = '
        <div class="blog-masthead" >

        <div class="container" >

            <nav class="blog-nav" >


                <a class="blog-header-logo text-dark" href="index.php">What\'s Going On?</a>

                <a class="btn btn-outline-primary" href="login.php">Login</a>

            </nav >
        </div >
    </div >';
        return $x;
    }

    public static function CheckLogin()

    {
        if (isset($_SESSION['user'])) {

            $menu = static::LoggedIn();

        } else {

            $menu = static::LoggedOut();
        }

        echo <<<pageTop
pageTop;
    }


}


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
        <!--Example row of columns-->
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
     <!-- /container -->
    </div>
        <hr>
    </div>

<?php
    // Load page header
    $footer = new mainFooterTemplate();
    echo $footer->renderStatic();


