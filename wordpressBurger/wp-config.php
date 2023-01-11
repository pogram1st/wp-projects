<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpressburger' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7L@hzm#+slLA=k(AJpTBm/mg3y#)_BV=65x&!TDc4UYRCQEkxT(D][|Rz?TzqDGc' );
define( 'SECURE_AUTH_KEY',  'ZhV`SL_6/`I~xQh&d%[U|*,F6!`KY=Xj?FzC/.TTZ:-tSE1;gH/%|/#WGU]nX^S@' );
define( 'LOGGED_IN_KEY',    'p@aHJQ7Wjf}|8>V<<?2(moKnWV;aSiI60,GB~CO.soJVHvx.sZz&db/cB-)~X:k.' );
define( 'NONCE_KEY',        'aa%m} >7Vq~$Nm`TzFrahsGKd bb(T_j$m^Uf8Bh;X}ps<+D{%#W|5B>yAGo2L+L' );
define( 'AUTH_SALT',        '}>(k7d]kV,q*y>*];mfsGE<rIU~?:m9j{YV{%feC23BHZ*%9zUUj3F*0JJQ[FoTw' );
define( 'SECURE_AUTH_SALT', 'S`?-]$:.3b@~1Q=Hu<mi`;N?L,T:ReVOxmyHA2<HJg#L`g+:P*y6t$E7O,-kRC#P' );
define( 'LOGGED_IN_SALT',   '.BQIKMu[e[sHwo;X!Z;BH`5R80iJMS{tvsJ6Op*5be>4S`I6>SX$>~J-va7d|sZY' );
define( 'NONCE_SALT',       'o,SQl<yZab)j=wpBNJ^2Z=N0t:c|TG#1#e@6-B^gt:vF4{A(OGP&JR7gP<a<Hk{{' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
