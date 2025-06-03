<?php
// Файл functions.php підключається автоматично WordPress при активації теми
// Тут ми додаємо підтримку базового функціоналу теми

// 1. Підключаємо стилі та скрипти теми
function mytheme_enqueue_scripts() {
    // Основний файл стилів
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());

    // Приклад підключення додаткового CSS (якщо є)
    // wp_enqueue_style('mytheme-custom', get_template_directory_uri() . '/assets/css/custom.css');

    // Приклад підключення скрипту (якщо є)
    // wp_enqueue_script('mytheme-script', get_template_directory_uri() . '/assets/js/script.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

// 2. Реєстрація підтримки основних можливостей теми
function mytheme_setup() {
    // Додаємо підтримку тегу <title> у <head>
    add_theme_support('title-tag');

    // Додаємо підтримку мініатюр (featured image)
    add_theme_support('post-thumbnails');

    // Додаємо підтримку HTML5 для деяких елементів
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Реєстрація одного або кількох меню
    register_nav_menus(array(
        'header_menu' => 'Головне меню', // Основне меню в хедері
        'footer_menu' => 'Меню в підвалі сайту' // Меню у футері
    ));
}
add_action('after_setup_theme', 'mytheme_setup');

// 3. Реєстрація області для віджетів (сайдбар або футер)
function mytheme_widgets_init() {
    register_sidebar(array(
        'name'          => 'Бокова панель',
        'id'            => 'sidebar-1',
        'description'   => 'Область для віджетів у сайдбарі',
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'mytheme_widgets_init');

// 4. Підключення хедера і футера у шаблонах теми
// Це виконується в файлах шаблонів (не у functions.php), наприклад:
/* <?php get_header(); ?> — вставляє header.php
<?php get_footer(); ?> — вставляє footer.php -->

 // 5. Додатково (опціонально): Заборонити адмін-панель для неадміністраторів
/*
function mytheme_redirect_non_admin_users() {
    if (is_admin() && !current_user_can('administrator') && !(defined('DOING_AJAX') && DOING_AJAX)) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('admin_init', 'mytheme_redirect_non_admin_users');
*/ 

?>
