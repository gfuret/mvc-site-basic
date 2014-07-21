<?php
        require_once("../app/core/config.php");
        require_once("article.php");        
/**
* 	Model for table page
*/
class NewsModel extends article
{

    public function __construct()
    {
        $this->table = 'news';
    }

}