<?php

class loginTemplate extends templateEngine {

    /**
     * These are the data fields expected for this template. This
     * is a white list of fields.
     *
     * @var array
     */
    protected $whiteList = ['id',
                            'role_id',
                            'firstName',
                            'middleName',
                            'lastName',
                            'address1',
                             'address2',
                            'city',
                            'state',
                             'zip',
                            'password',
                            'phone',
                            'email',
                            'isActive',
                            'created_at',
                            'updated_at'];

    /**
     * The constructor will be used to save the HTML template to the $template class property.
     * The easiest way to do this is using HEREDOC format.
     *
     * sampleTemplate constructor.
     */
    public function __construct(){

        $temp = <<<HTML
            <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
    
  </head>

  <body class="text-center">
    <form action="/login.php" method = "POST">
    <form class="form-login">
      <img class="mb-4" src="/assets/images/coffee.ico" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <p class="mt-5 mb-3 text-muted">Travis inc. &copy;2018</p>
    </form>
  </body>
</html>
</form>
HTML;
        $this->template = $temp;

    }
}
