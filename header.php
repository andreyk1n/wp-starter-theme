<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div class="wrapper">
		<header class="header">
			<div class="header__container">
				<a href="<?php echo home_url(); ?>" class="header__logo">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Header logo">
				</a>
				<nav class="header__nav">
					<!-- Навігаційні посилання тут -->
				</nav>
				<div class="header__burger">
					<span></span>
				</div>
			</div>
		</header>