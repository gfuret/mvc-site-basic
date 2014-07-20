<?php

/*
*	Controller for index page
* 
*/
class Home extends Controller
{
	
	public function index($slug = '')
	{
		$pages = $this->model('Page');

		$this->view('home/index', array('title' => $slug), $pages->menu);		
	}
}
