<?php include '../app/views/template/partials/header.php'; ?>
<?php include '../app/views/template/partials/jumbotron.php'; ?>
    <div class="container">
	    <section>
		    <article>
		    	<p>Home page information</p>
		    </article>
		</section>
	</div>     
    <?php
        $news = $this->model('NewsModel');
        $this->view('news/all', $news->all(array(), 'news')); 
    ?>  
<?php include '../app/views/template/partials/footer.php'; ?>