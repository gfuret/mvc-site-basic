<?php

/**
* Controller for news 
* for example: new-concert, special-offers-travel
*/
class News extends Controller
{
	
	public function index($slug = '')
	{
		$news = $this->model('NewsModel');
		$pages = $this->model('Page');

		$news->get_article_single($slug, 'news');

		if($news->get_article_single($slug, 'news')){
			$this->view('news/index', $news->fields, $pages->menu);
		}else{
			$pages = $this->model('Page');
			$this->view('home/index', array('title' => $slug), $pages->menu);	
		}

	}
}