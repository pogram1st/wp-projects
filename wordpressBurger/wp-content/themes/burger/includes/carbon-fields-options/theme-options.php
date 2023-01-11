<?php
if (!defined('ABSPATH')) {
    exit;
}
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', 'Настройки сайта')
    ->add_tab(
        'Общие настройки',
        [
            Field::make('image', 'site_logo', 'Логотип')
        ]
    )
    ->add_tab(
        'Контакты',
        [
            Field::make('text', 'phone', 'Номер телефона'),
            Field::make('text', 'phone_digits', 'Номер телефона без скобок и пробелов в формате +79999999999'),
            Field::make('text', 'adress', 'Адрес'),
            Field::make('text', 'map_coordinates', 'Координаты карты'),
            Field::make('text', 'vk_url', 'Ссылка Вконтакте'),
            Field::make('text', 'inst_url', 'Ссылка Instagram'),
            Field::make('text', 'facebook_url', 'Ссылка Facebook'),
        ]
    );