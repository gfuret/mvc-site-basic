<?php


/**
* Controller for pages 
* for example: About, Portfolio
*/
class Pages extends Controller
{
	
	public function index($slug = '')
	{
		$pages = $this->model('Page');
		if($pages->get_pages_single($slug)){
			$this->view('pages/index', $pages->fields, $pages->menu);
		}else{
			$this->view('pages/lost');	
		}
	}
}