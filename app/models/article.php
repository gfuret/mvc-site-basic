<?php
        require_once("../app/core/config.php");
/**
* 	Model for table page
*/
class Article
{
    public $fields = array();
    public $menu = array();
    public $table = '';	

	/**
	* 	look for all the news, filters if $config has valid data
	*/
    function all($config = array(), $table = null){
        if($table){
	            require("../app/core/database.php");
	            $query = "SELECT * 
	            	FROM " . $table . " 
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

	            $news = $results->fetchAll(PDO::FETCH_ASSOC);

	            return $news; 
        } else {
        		return false;
        }      
    }


    /**
    *   Search by slug in news table
    */
    public function get_article_single($slug = '', $table){
        require("../app/core/database.php");
        $results = $db->prepare("SELECT * 
            FROM " . $table . " 
            WHERE slug LIKE ?"); 
            
        $results->bindParam(1, $slug);   
        $results->execute();  
        if ($results->rowCount() < 1){
            return false;
        } else {
        $news = $results->fetchAll(PDO::FETCH_ASSOC);
        $this->set_article_fields($news[0]); 
            return true;                
        }
    }


    /*
    *   Fill data into $fields with record found
    *   
    */
    public function set_article_fields($article){
        foreach ($article as $key => $value) {
            $this->fields[$key] = $value;
        }
    }    

}