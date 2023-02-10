<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php bloginfo('name'); ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
	
	<!-- <link rel="stylesheet/less" type="text/css" href="http://localhost/hcglobal/wp-content/themes/hcglobal/assets/css/main.less" /> -->
	
</head>
<body <?php body_class(); ?>>
	<?php get_template_part( "templates/partials/header-nav" ); ?>
	