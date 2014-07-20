<?php
        require("../app/core/config.php");
/**
* 	Model for table page
*/
class Page
{

    public $fields = array();
    public $menu = array();

    public function __construct()
    {
        $this->get_pages_menu();
    }

	/**
	* 	look for all the pages, filters if $config has valid data
	*/
    function all($config){
        require("../app/core/database.php");
        $query = "SELECT * 
        	FROM pages 
        	WHERE active = true";

        $filters = array();
        $filterData = array();
        // ADDING FILTER CONDITIONALS        
		if (isset($config['slug']) && trim($config['slug']) != '') {
		        $filters[] = 'slug LIKE ?';
		        $filterData[] = '%' . str_replace(array('%', '_'), array('\\%', '\\_'), $config['slug']) . '%';
		}		
		/**/
		if (isset($config['id']) && trim($config['id']) != '') {
		        $filters[] = 'id = ?';
		        $filterData[] = $config['id'];
		}	
		
        // CONCAT QUERY WITH FILTERS  
        if (!empty($filters)) {
                foreach ($filters as $filter) {
                        $query.=' AND ' . $filter;
                }
        }


    	// FINDING DATA
        try {
        	$results = $db->prepare($query);

        	$n = 0;
        	foreach ($filterData as $key => $value) {
        		$n++;
        		$results->bindParam($n, $value);
        	}
        	
            $results->execute();

            
        } catch (Exception $e) {
            echo "Not possible to run the query... <br>";
            echo $query;
            exit();
        }

        $pages = $results->fetchAll(PDO::FETCH_ASSOC);

        return $pages;        
    }
    /**
    *   Search by slug in pages table
    */
    public function get_pages_single($slug = ''){
        require("../app/core/database.php");
        $results = $db->prepare("SELECT * 
            FROM pages 
            WHERE slug LIKE ?"); 
            
        $results->bindParam(1, $slug);   
        $results->execute();  
        if ($results->rowCount() < 1){
            return false;
        } else {
        $pages = $results->fetchAll(PDO::FETCH_ASSOC);
        $this->set_pages_fields($pages[0]); 
            return true;                
        }
    }
   /**
    *   Load all the pages title/slug to create menu
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
            $this->set_pages_fields($pages[0]); 
               
            foreach ($pages as $key => $value) {
                $this->menu[$key] = $value;
            }
            return true;
        }
    }
    /*
    *   Fill data into $fields with record found
    *   
    */
    public function set_pages_fields($page){
        foreach ($page as $key => $value) {
            $this->fields[$key] = $value;
        }
    }


}