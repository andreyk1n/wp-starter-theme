<?php
get_header();
?>

<div class="single">
	<div class="single__container">
		<h1><?php the_title(); ?></h1>
		<div class="single__content"><?php the_content(); ?></div>
	</div>
</div>

<?php

get_footer();
