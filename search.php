<?php
get_header();
?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				Результати пошуку за: <?php echo get_search_query(); ?>
			</h1>
		</header>

		<?php
		// Цикл виводу результатів пошуку
		while ( have_posts() ) : the_post();

			// Підключаємо шаблон для вмісту (типово content-search.php або content.php)
			get_template_part( 'template-parts/content', 'search' );

		endwhile;

		the_posts_navigation();

	else :
		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main><!-- #primary -->

<?php
get_footer();
