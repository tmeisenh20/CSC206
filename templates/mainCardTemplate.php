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
                        <a class="text-dark" href="https://www.theguardian.com/world/2018/feb/12/safe-happy-and-free-does-finland-have-all-the-answers">Featured post</a>
                    </h3>
                    <div class="mb-1 text-muted">4/15/18</div>
                    <p class="card-text mb-auto">Safe, happy, and free: Does Finland have all the answers?</p>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="/assets/images/finland.jpg?theme=thumb" width="200" height="250" alt="Card image cap">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="http://www.vulture.com/2018/04/a-serious-critique-of-the-mcus-off-duty-fashion.html">Featured Post</a>
                    </h3>
                    <div class="mb-1 text-muted">3/16/18</div>
                    <p class="card-text mb-auto">Check out the latest in the fashion industry.</p>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="/assets/images/design.jpg?theme=thumb" width="200" height="250" alt="Card image cap">
            </div>
        </div>
    </div>
</div>
HTML;

        $this->template = $temp;
    }

}


