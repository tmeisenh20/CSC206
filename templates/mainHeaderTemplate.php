<?php

require_once (FS_TEMPLATES . 'templateEngine.php');


class mainHeaderTemplate extends templateEngine
{

    public function __construct()
    {

        $menu = self::CheckLogin();

        $temp = <<<HTML
        <!doctype html>
            <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/images/coffee.ico">

    <title>What's Going On?</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/assets/css/blog.css" rel="stylesheet">
</head>

<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">What's Going On?</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {$menu}
      </div>
    </nav>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Russia Displays Indestructible Warhead</h1>
            <p class="lead my-3">Putin reveals plans for a warhead design that can not be detected by U.S. anti-missile systems</p>
            <p class="lead mb-0"><a href="/viewPost.php?id=9" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>
HTML;

        $this->template = $temp;
    }

    public static function LoggedIn()
    {
        $users = $_SESSION['user'];
        $x = '
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="createPost.php">Create Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="getPosts.php">All Posts</a>
          </li>
        </ul>
         Hello, ' . $users['firstName'] . ' ' . $users['lastName'] .
            ' . <a class="btn btn-outline-primary" href="logoff.php">Logout</a>

    ';
        return $x;
    }

    public static function LoggedOut()

    {
        $x = '
        
        <a class="btn btn-outline-primary" href="login.php">Login</a>';
        return $x;
    }

    public static function CheckLogin()
    {
        if (isset($_SESSION['user'])) {

            return self::LoggedIn();

        } else {

            return self::LoggedOut();
        }
    }
}