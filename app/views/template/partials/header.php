<html>
<head>

	<title><?php echo $data['title']; ?> | gfuret</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link href="/mvc/public/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	    <div class="collapse navbar-collapse">
	    	<ul class="nav navbar-nav navbar-right">
	    		<li><a href="/mvc/public">Home</a></li>
		        <?php foreach ($menu as $key => $link) { ?>
				        <li><a href="/mvc/public/pages/<?php echo $link['slug']; ?>"><?php echo $link['title']; ?></a></li>
				<?php } ?>
	     	</ul>
	    </div>
	</div>