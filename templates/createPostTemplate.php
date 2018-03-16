<?php

class createPostTemplate extends templateEngine {

    /**
     * These are the data fields expected for this template. This
     * is a white list of fields.
     *
     * @var array
     */
    protected $whiteList = ['role_id',
        'New', 'content', 'created_at',
        'endDate', 'startDate', 'image', 'title', 'updated_at',
        'isActive'];

    /**
     * The constructor will be used to save the HTML template to the $template class property.
     * The easiest way to do this is using HEREDOC format.
     *
     * sampleTemplate constructor.
     */
    public function __construct(){

        $temp = <<<HTML
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<form action = "/createPost.php" method="POST">
  <div class="form-group row">
    <label class="col-4 col-form-label" for="title"></label> 
    <div class="col-10">
      <input name="title" class="form-control here" id="title" type="text" placeholder="Title">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4"></label> 
    <div class="col-10">
      <textarea name="content" class="form-control" id="content" rows="10" cols="40"></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" class="btn btn-primary" type="submit">Submit Post</button>
    </div>
  </div>
</form>
HTML;
        $this->template = $temp;

    }
}


