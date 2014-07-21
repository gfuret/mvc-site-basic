<?php include '../app/views/template/partials/header.php'; ?>
    <!-- Jumbotron -->
    <div class="jumbotron">
    	<div class="container">
    		<h1>Hey Buddy!</h1>
    		<p>Which page are you interested in?</p>
    	</div>
    </div><!-- End Jumbotron -->
    <div class="container">
	    <section>
		    <article>
				<h2><a href="#"><?=$data['title']?></a></h2>
				<div><?=$data['body']?></div>
		    </article>
		</section>
	</div>
<?php include '../app/views/template/partials/footer.php'; ?>