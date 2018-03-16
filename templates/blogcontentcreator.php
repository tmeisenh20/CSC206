<?php
require_once(FS_TEMPLATES . 'templateEngine.php');

class blogcontentcreator extends templateEngine
{

    /**
     * These are the data fields expected for this template. This
     * is a white list of fields.
     *
     * @var array
     */
    protected $whiteList = ['id', 'title', 'content', 'image'];

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



