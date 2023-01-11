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
define( 'DB_NAME', 'users' );

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
define( 'AUTH_KEY',         'x<6)JBW]CkZt$5U|yF?X*@wJ5c{jf 1`d}IT7--=/[=m U DW%c[4Uc$CB,.7IT*' );
define( 'SECURE_AUTH_KEY',  'tjy~YM#xU|,hLi.`.#W}%OE#%Ea5jet+!,sLt|RM&Gf@}ppS/v_Q1MH]t$#,1dtQ' );
define( 'LOGGED_IN_KEY',    '+h2WRdE{nE}OY{L)_hz}u<H5)_<.& CgcA+R2Z>pUh0u2qkDi|3#?U3t-RciJ;{g' );
define( 'NONCE_KEY',        '2.~a(BfzzZG.j+a#@-3QffSKFO{Tp!YBa4XL/H{`]W6Mw@B1L#|/R8hgk<7Fl}0!' );
define( 'AUTH_SALT',        '#158w-Bt!G{K;k?Tz*qyF]p%o47U)z3+7NTp%b+obBu=c++U>:Fqljlr!YwzXiw{' );
define( 'SECURE_AUTH_SALT', '`[0)rt2ARBB!fQN%q_^GZri8H[1ab-G<%=i`Y.$_[#DF~xIZr$Y]( C^m^O(hP*d' );
define( 'LOGGED_IN_SALT',   ',6<U`s)j 12a.:;UCYj*:?f<uQ}>A3.elRZ= o1[6&NFy;tP$j-TvsDcZ@a*S_{k' );
define( 'NONCE_SALT',       'L`l2&9+B%/+dQ|yNi$dP|y:jCS4ss?;R;liX6ip+T_35dooC.m_Kg1B~$:?//Mr4' );

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
