<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'nasonov' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'Nasonov Maxim' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'rsWiCt6r~^_a?F R|qHtXnTKv~[,`P{oC}PQ<Z#,Zl|a]>I`vUi_[h=n|zi<O@H(' );
define( 'SECURE_AUTH_KEY',  '{]L,Er|C;O4xA39mm(||9$A!_jzCk~xwJZ<bMu*_sJOFuH5:+bcdv8&Qf@[`e^A6' );
define( 'LOGGED_IN_KEY',    'ES]!O4CL:{S.}9,R(u7mDknUK/{&dh[ Z,[y7Q1h=0D9gC&:I_Wuk|OKO}llF RA' );
define( 'NONCE_KEY',        'oke2|v**yT+quVHar#(Uic_Vn3IbU&Kq[I&[G},svW0[C5LwDs$nMG]82A .lX.v' );
define( 'AUTH_SALT',        'Mr`ntP&qN&0S(wmBR7` HufV:iC/xv#hP:$d=9->.iiES+4W<E(W>(u{e.=t}Y( ' );
define( 'SECURE_AUTH_SALT', 'xa=4hxE?)b,(qH^<<|Tx##@I3.cc7roo#.N4]qsgg}Er4SA9(cy>oEg/zpo04B4B' );
define( 'LOGGED_IN_SALT',   '.7$YswfVK=u!#oex/QJVX>p4J@;F#iYUcGbrk}],E=8ZWPW/~vQ8`Hr/pk-~cIG(' );
define( 'NONCE_SALT',       '10/KRJV$0L`^w/{-+ZS,GB()r1()B;Jy^sj(GY@<mW#)(Feqy_S|/yEexelx^0:F' );

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
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'wordpress.loc');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
