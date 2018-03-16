<?php

require_once(FS_TEMPLATES . 'templateEngine.php');

class mainCardTemplate extends templateEngine
{
    public function __construct(){

        $temp = <<<HTML

 <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">World</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Featured post</a>
                    </h3>
                    <div class="mb-1 text-muted">Date of post</div>
                    <p class="card-text mb-auto">Safe, happy, and free: Does Finland have all the answers?</p>
                    <a href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" data-src="/assets/images/finland.jpg/200x250?theme=thumb">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Featured Post</a>
                    </h3>
                    <div class="mb-1 text-muted">Date of post</div>
                    <p class="card-text mb-auto">Check out the latest in the fashion industry.</p>
                    <a href="viewPost.php">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" data-src="/assets/images/design.jpg/200x250?theme=thumb">
            </div>
        </div>
    </div>
</div>
HTML;

        $this->template = $temp;
    }

}


