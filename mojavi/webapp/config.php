<?php

// +---------------------------------------------------------------------------+
// | This file is part of the Mojavi package.                                  |
// | Copyright (c) 2003 Sean Kerr.                                             |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit the Mojavi homepage: http://www.mojavi.org          |
// +---------------------------------------------------------------------------+


// ----- FILE-SYSTEM DIRECTORIES -----


/**
 * An absolute file-system path to the webapp directory.
 */
define('BASE_DIR', '/var/www/mojavi/webapp/');

/**
 * An absolute file-system path to the filter directory.
 */
define('FILTER_DIR', BASE_DIR. 'filters/');

/**
 * An absolute file-system path to the log directory.
 *
 * Note: This directory must be writable by any user.
 */
define('LOG_DIR', BASE_DIR . 'logs/');

/**
 * An absolute file-system path to the all-in-one class file Mojavi
 * uses.
 */
define('MOJAVI_FILE', '/var/www/mojavi/mojavi/mojavi-all-classes.php');

/**
 * An absolute file-system path to the optional classes directory.
 */
define('OPT_DIR', '/var/www/mojavi/mojavi/opt/');


// ----- WEB DIRECTORIES AND PATHS -----


/**
 * An absolute web path where modules can store public information such as
 * images and CSS documents.
 */
define('WEB_MODULE_DIR', '/modpub/');

/**
 * An absolute web path to the index.php script.
 */
// define('SCRIPT_PATH', '/index.php');


// ----- ACCESSOR NAMES -----

/**
 * The parameter name used to specify a module.
 */
define('MODULE_ACCESSOR', 'module');

/**
 * The parameter name used to specify an action.
 */
define('ACTION_ACCESSOR', 'action');


// ----- MODULES AND ACTIONS -----


/**
 * The action to be executed when an unauthenticated user makes a request for
 * a secure action.
 */
//define('AUTH_MODULE', 'Default');
//define('AUTH_ACTION', 'Login');

/**
 * The action to be executed when a request is made that does not specify a
 * module and action.
 */
//define('DEFAULT_MODULE', 'Default');
//define('DEFAULT_ACTION', 'DefaultIndex');

/**
 * The action to be executed when a request is made for a non-existent module
 * or action.
 */
define('ERROR_404_MODULE', 'Default');
define('ERROR_404_ACTION', 'PageNotFound');

/**
 * The action to be executed when an authenticated user makes a request for
 * an action for which they do not possess the privilege.
 */
define('SECURE_MODULE', 'Default');
define('SECURE_ACTION', 'GlobalSecure');

/**
 * The action to be executed when the available status of the application
 * is unavailable.
 */
define('UNAVAILABLE_MODULE', 'Default');
define('UNAVAILABLE_ACTION', 'Unavailable');


// ----- MISC. SETTINGS -----


/**
 * Whether or not the web application is available or if it's out-of-service
 * for any reason.
 */
define('AVAILABLE', TRUE);

/**
 * Should typical PHP errors be displayed? This should be used only for
 * development purposes.
 *
 * 1 = on, 0 = off
 */
define('DISPLAY_ERRORS', 0);

/**
 * The associative array that may contain a key that holds path information
 * for a request, and the key name.
 *
 * 1 = $_SERVER array
 * 2 = $_ENV array
 *
 * Note: This only needs set if URL_FORMAT = 2.
 */
define('PATH_INFO_ARRAY', 1);
define('PATH_INFO_KEY',   'PATH_INFO');

/**
 * The format in which URLs are generated.
 *
 * 1 = GET format
 * 2 = PATH format
 *
 * GET  format is ?key=value&key=value
 * PATH format is /key/value/key/value
 *
 * Note: PATH format may required modifications to your webserver configuration.
 */
define('URL_FORMAT', 2);

/**
 * Should we use sessions?
 */
define('USE_SESSIONS', TRUE);

/**
 * Smarty Setting
*/
define('SMARTY_DIR', OPT_DIR . 'smarty/');
define('SMARTY_CACHING', false);
define('SMARTY_CACHE_DIR', BASE_DIR . 'smarty/cache/');
define('SMARTY_CACHE_LIFETIME', 60);
define('SMARTY_COMPILE_DIR', BASE_DIR . 'smarty/compile/');
//define('SMARTY_FORCE_COMPILE', false);
define('SMARTY_FORCE_COMPILE', true);
define('SMARTY_DEBUG_TPL', OPT_DIR . 'smarty/debug.tpl');
define('SMARTY_DEBUGGING_CTRL', 'NONE');
//define('SMARTY_DEBUGGING', false);
define('SMARTY_DEBUGGING', false);

/**
 * ADOdb Setting
*/
define('ADODB_DIR', OPT_DIR . 'adodb/');
define('ADODB_CACHE_DIR' , BASE_DIR . 'adodb');
define('ADODB_CACHE_SECS' ,  '60');
define('ADODB_DEBUG' , false);
define('SQL_TYPE' , 'mysql');
define('SQL_SERVER', 'localhost');
define('SQL_USER', 'xxxxx');
define('SQL_PASSWORD', 'xxxxx');
define('SQL_DATABASE', 'xxxxx'); 

/**
 * SONPO CMS Setting
*/
//define('SONPO_SITE_URL',      'http://210.136.187.199');
//define('SONPO_SITE_URL',      'http://vm-sonpo.p1dlan');
define('SONPO_SITE_URL',      'https://www.sonpo-form.jp');

define('SONPO_DOCUMENT_ROOT','/var/www/html');

define('SONPO_IMAGE_DIR',      '/var/www/html/news/image/');
define('SONPO_FILE_DIR',       '/var/www/html/news/file/');
define('SONPO_TEMP_IMAGE_DIR', '/var/www/html/news/image/_temp/');

define('SONPO_NEWS_FILE_DIR',    '/var/www/html/news/release/');
define('SONPO_NEWINFO_FILE_DIR', '/var/www/html/news/new_info/');
define('SONPO_INDEX_FILE_DIR',   '/var/www/html/');
define('SONPO_BRANCH_FILE_DIR',  '/var/www/html/about/action/branch/');
define('SONPO_PRIZE_FILE_DIR',  '/var/www/html/news/application/');
define('SONPO_TOPIC_FILE_DIR',  '/var/www/html/news/information/');

define('SONPO_EN_NEWS_FILE_DIR',    '/var/www/html/en/news/');
define('SONPO_EN_STATE_FILE_DIR',   '/var/www/html/en/statements/');

define('SONPO_TOP_FILE_DIR', '/var/www/html/news/list/');
define('SONPO_RSS_FILE_DIR', '/var/www/html/rss/');
define('SONPO_EN_RSS_FILE_DIR','/var/www/html/en/rss/');


define('SONPO_IMAGE_URL',      '/news/image/');
define('SONPO_FILE_URL',       '/news/file/');
define('SONPO_TEMP_IMAGE_URL', '/news/image/_temp/');

define('SONPO_IMAGE_MAX_SIZE',  2048);
define('SONPO_IMAGE_MAX_WIDTH', 10000);
define('SONPO_IMAGE_MAX_HEIGHT',10000);

define('SONPO_PDF_MAX_SIZE',  2048);
define('SONPO_PDF_DIR',      '/var/www/contact/pdf/');
define('SONPO_TEMP_PDF_DIR', '/var/www/contact/pdf/_temp/');

define('SONPO_IMAGE_WIDTH',    600);
define('SONPO_TOPIMAGE_WIDTH', 160);

?>
