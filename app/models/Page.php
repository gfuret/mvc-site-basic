<?php
        require_once("../app/core/config.php");
        require_once("article.php");          
/**
* 	Model for table page
*/
class Page extends article
{

    public function __construct()
    {
        $this->get_pages_menu();
        $this->table = 'pages';
    }


   /**
    *   Load all the pages title/slug to create menu " . $this->table . "
    */
    public function get_pages_menu(){
        require("../app/core/database.php");
        $results = $db->prepare("SELECT slug, title, id, parent  
            FROM pages 
            WHERE active = 1");    
        $results->execute();  
        if ($results->rowCount() < 1){
            return false;
        } else {
            $pages = $results->fetchAll(PDO::FETCH_ASSOC);
            $this->set_article_fields($pages[0]); 
               
            foreach ($pages as $key => $value) {
                $this->menu[$key] = $value;
            }
            return true;
        }
    }
}