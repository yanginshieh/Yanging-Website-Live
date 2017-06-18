<?php
/*
  Template Name: Blank-Page
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Yanging Design</title>
	<link rel="icon" href="<?php echo get_option('favicon_icon'); ?>" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo get_option('favicon_icon'); ?>" type="image/x-icon" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
	
	<script src="//use.typekit.net/qya5wqc.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.0/release/featherlight.min.css" type="text/css" rel="stylesheet" />
	<link href="<?php bloginfo('template_directory');?>/css/index.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory');?>/css/style.css" rel="stylesheet">
	<meta id="meta" name="viewport" content="width=device-width, initial-scale=1.0" />	
	<meta charset="UTF-8">
	<meta name="description" content="Yanging Design Work Portfolio">
	<meta name="author" content="Yangin Shieh">
	<meta name="keywords" content="Yanging,Yangin,Shieh,Design,Brand,Branding,Print">
</head>
<body>
	<?php the_content(); // Dynamic Content ?>
</body>
</html>