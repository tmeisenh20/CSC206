<?php

require_once (FS_TEMPLATES . 'templateEngine.php');


class mainHeaderTemplate extends templateEngine
{

    /**
     * This is the html code that makes up the template.  This will
     * be unique to and set in eacb instance of the class
     *
     * @var null
     */

    public function __construct()
    {
        $temp = <<<HTML
        <!doctype html>
            <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="coffee.ico">

    <title>What's Going On?</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/assets/css/blog.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                 <a class="btn btn-outline-primary" href="createPost.php">Create Post</a>
                 <a class="btn btn-outline-primary" href="getPosts.php">All Posts</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="index.php">What's Going On?</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#">
                    <nav class="blog-pagination">
            </nav>
                </a>
                <a class="btn btn-outline-primary" href="#">Login</a>
            </div>
        </div>
    </header>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Russia Displays Indestructible Warhead</h1>
            <p class="lead my-3">Putin reveals plans for a warhead design that can not be detected by U.S. anti-missile systems</p>
            <p class="lead mb-0"><a href="viewPost.php" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>
HTML;

        $this->template = $temp;

    }
}