<?php include '../app/views/template/partials/header.php'; ?>
<?php include '../app/views/template/partials/jumbotron.php'; ?>
    <div class="container">
	    <section>
		    <article>
		    	<h1><?php echo $data['title']; ?></h1>
		    	<p><?=$data['created_at']?></p>
					<p>
		    			<?php echo $data['body']; ?>
					</p>
		    </article>
		</section>
	</div>
<?php include '../app/views/template/partials/footer.php'; ?>