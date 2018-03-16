<?php

require_once(FS_TEMPLATES . 'templateEngine.php');

class mainSidebarTemplate extends templateEngine
{
public function __construct(){

$temp = <<<HTML
 <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                <h4 class="font-italic">About this blog</h4>
                <p class="mb-0">Hi! Welcome to What's Going On. This is the best place to post things you find interesting and to simply find what's going on! </p>
            </div>


            <div class="p-3">
                <h4 class="font-italic">Social Media</h4>
                <ol class="list-unstyled">
                    <li><a href="https://www.instagram.com/presidenteisenhauer/?hl=en">Instagram</a></li>
                    <li><a href="https://www.linkedin.com/in/travis-eisenhauer/">Linkedin</a></li>
                    <li><a href="https://www.facebook.com/travis.eisenhauer">Facebook</a></li>
                </ol>
            </div>
        </aside><!-- /.blog-sidebar -->
HTML;

$this->template = $temp;
}



}