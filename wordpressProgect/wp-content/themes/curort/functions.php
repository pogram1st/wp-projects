<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('gFAPI', 'https://fonts.googleapis.com');
    wp_enqueue_style('gFStatic', 'https://fonts.gstatic.com');
    wp_enqueue_style('fontOranienbaum', 'https://fonts.googleapis.com/css2?family=Oranienbaum&family=Roboto:wght@400;500;700;900&display=swap');
    wp_enqueue_style('fontLobster', 'https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    wp_enqueue_style('fontRusso', 'https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('styleProkat', get_template_directory_uri() . '/assets/css/prokat.css');
    wp_enqueue_style('styleHotel', get_template_directory_uri() . '/assets/css/hotel.css');
    wp_enqueue_style('styleLogin', get_template_directory_uri() . '/assets/css/login.css');
    // wp_enqueue_style('script', get_template_directory_uri() . '/assets/js/index.js');

    wp_enqueue_script('scriptJS2', get_template_directory_uri() . '/assets/js/index.js', array(), '1.0.0', true);
});

add_action('init', 'register_post_types');


// вкладка товары
function register_post_types()
{

    register_post_type('post_type_name', [
        'label' => null,
        'labels' => [
            'name' => 'Товары',
            // основное название для типа записи
            'singular_name' => 'Товар',
            // название для одной записи этого типа
            'add_new' => 'Добавить товар',
            // для добавления новой записи
            'add_new_item' => 'Добавление нового товара',
            // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование товара',
            // для редактирования типа записи
            'new_item' => 'Новый товар',
            // текст новой записи
            'view_item' => 'Смотреть товар',
            // для просмотра записи этого типа.
            'search_items' => 'Искать товар',
            // для поиска по этим типам записи
            'not_found' => 'Не найдено',
            // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине',
            // если не было найдено в корзине
            'parent_item_colon' => '',
            // для родителей (у древовидных типов)
            'menu_name' => 'Товары',
            // название меню
        ],
        'description' => 'dashicons-cart',
        'public' => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu' => null,
        // показывать ли в меню админки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest' => null,
        // добавить в REST API. C WP 4.7
        'rest_base' => null,
        // $post_type. C WP 4.7
        'menu_position' => 5,
        'menu_icon' => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => true,
        'rewrite' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'hotels']
    ]);
    register_taxonomy('taxonomy', ['post'], [
        'label' => '',
        // определяется параметром $labels->name
        'labels' => [
            'name' => 'Категории товаров',
            'singular_name' => 'Категория товара',
            'search_items' => 'Искать категории',
            'all_items' => 'Все категории',
            'view_item ' => 'View Genre',
            'parent_item' => 'Parent Genre',
            'parent_item_colon' => 'Parent Genre:',
            'edit_item' => 'Изменить категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новое название категории',
            'menu_name' => 'Категории',
            'back_to_items' => '← Back to Genre',
        ],
        'description' => '',
        // описание таксономии
        'public' => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical' => true,

        'rewrite' => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities' => array(),
        'meta_box_cb' => null,
        // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column' => false,
        // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest' => null,
        // добавить в REST API
        'rest_base' => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ]);

}

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');
?>