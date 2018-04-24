<?php
require_once(FS_TEMPLATES . 'templateEngine.php');

class blogcontentcreator extends templateEngine
{

    protected $whiteList = ['id', 'title', 'content'];

    public function __construct(){

        $temp = <<<HTML

        <div class="col-md-8" >
            <h2 >{{title}}</h2 >
            <p >{{content}}</p >
            <p ><a class="btn btn-secondary" href = "/viewPost.php?id={{id}}" role = "button" > Full Story &raquo;</a ></p >
        </div >

HTML;

        $this->template = $temp;
    }
}



