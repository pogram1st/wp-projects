<?php
// правильный способ подключить стили и скрипты
add_filter('show_admin_bar', '__return_false');
add_action('wp_enqueue_scripts', 'theme_name_scripts');
function theme_name_scripts()
{
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Montserrat:900%7CRoboto:300&display=swap&subset=cyrillic');
    wp_enqueue_style('main-style', get_stylesheet_uri());

    wp_enqueue_script('focus-visible', 'https://unpkg.com/focus-visible@5.0.2/dist/focus-visible.js', array(), '1.0.0', true);
    wp_enqueue_script('vanilla-lazyload', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js', array(), '1.0.0', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    wp_localize_script('main-js', 'WPJS', [
        'siteUrl' => get_template_directory_uri() . '/assets/',
    ]);
}

add_action('after_setup_theme', 'theme_support'); //Создание меню в WP

function theme_support()
{
    register_nav_menu('menu_main_header', 'Меню в шапке');
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('includes/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}
add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields()
{
    require_once('includes/carbon-fields-options/theme-options.php');
}
add_action('init', 'create_global_variables');
function create_global_variables()
{
    global $pizzaTime;
    $pizzaTime = [
        'phone' => carbon_get_theme_option('phone'),
        'phone_digits' => carbon_get_theme_option('phone_digits'),
        'adress' => carbon_get_theme_option('adress'),
        'map_coordinates' => carbon_get_theme_option('map_coordinates'),
        'vk_url' => carbon_get_theme_option('vk_url'),
        'inst_url' => carbon_get_theme_option('inst_url'),
        'facebook_url' => carbon_get_theme_option('facebook_url'),
    ];
}
?>