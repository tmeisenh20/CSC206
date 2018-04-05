<?php

require_once(FS_TEMPLATES . 'templateEngine.php');

class mainFooterTemplate extends templateEngine
{
    public function __construct(){

        $temp = <<<HTML
<footer class="blog-footer">
    <p>Visit my Linkedin profile. <a href="https://www.linkedin.com/in/travis-eisenhauer/">Linkedin</a> CSC 206 2018 &copy; All Rights Reserved.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../dist/js/bootstrap.min.js"></script>
<script src="../../../../assets/js/vendor/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
HTML;

        $this->template = $temp;
    }



}