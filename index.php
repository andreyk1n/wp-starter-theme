<?php
get_header();
?>


<?php
// Масив дозволених блоків
$allowed_blocks = [
	'hero',
	'content',
	'cards',
];

$all_styles = '';

if (have_rows('flexible_field')):
	while (have_rows('flexible_field')):
		the_row();

		$layout = get_row_layout();

		if (in_array($layout, $allowed_blocks)) {
			$style_path = get_template_directory() . '/css/blocks/' . $layout . '.css';

			if (file_exists($style_path)) {
				$all_styles .= file_get_contents($style_path) . "\n";
			}
		}

	endwhile;
endif;

if ($all_styles) {
	echo "<style>\n" . $all_styles . "</style>\n";
}

if (have_rows('flexible_field')):
	while (have_rows('flexible_field')):
		the_row();

		$layout = get_row_layout();

		if (in_array($layout, $allowed_blocks)) {
			get_template_part('template-parts/flexible/' . $layout);
		} else {
			echo "<!-- Блок '{$layout}' не дозволений або не знайдено шаблон -->";
		}

	endwhile;
else:
	echo '<p>Немає жодного блоку в flexible_field.</p>';
endif;
?>

<?php
get_footer();
