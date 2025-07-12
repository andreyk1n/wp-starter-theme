<?php
get_header();
?>

<section class="error">
	<div class="error__container">
		<h1 class="page-title">Сторінка не знайдена</h1>
		<p>Вибачте, але сторінка, яку ви шукаєте, не існує або була видалена.</p>
		<p>Спробуйте скористатися пошуком або повернутися на <a href="<?php echo home_url(); ?>">головну сторінку</a>.
		</p>
		<?php get_search_form(); ?>
	</div>
</section>

<?php
get_footer();
