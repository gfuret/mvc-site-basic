
    <div class="container">
	    <section>
		    <article>
		    	<h1>News Section</h1>
		    	<?php 
		    		foreach ($data as $news) {
		    	?>
			    		<h3>
			    				<a href="<?php echo 'news/' . $news['slug']; ?>"><?php echo $news['title']; ?></a>
						</h3>
						<p><?=$news['created_at']?></p>
						<p>
			    				<?php echo $news['body']; ?>
						</p>
			    		<hr>
		    	<?php 		    			
		    		}
		    	?>
		    </article>
		</section>
	</div>
