<?php

// +---------------------------------------------------------------------------+
// | This file is part of the Mojavi package.                                  |
// | Copyright (c) 2003 Sean Kerr.                                             |
// |                                                                           |
// | For the full copyright and license information, please view the COPYRIGHT |
// | file that was distributed with this source code. If the COPYRIGHT file is |
// | missing, please visit the Mojavi homepage: http://www.mojavi.org          |
// +---------------------------------------------------------------------------+

mb_internal_encoding("EUC-JP");

require_once('/var/www/mojavi/webapp/config.php');

define('DEFAULT_MODULE', 'Default');
define('DEFAULT_ACTION', 'RSS');
define('SCRIPT_PATH', '/rss.php');

define('AUTH_MODULE', 'Manage');
define('AUTH_ACTION', 'Login');

require_once(MOJAVI_FILE);

$controller = Controller::getInstance();

require_once(AUTH_DIR . 'PrivilegeAuthorizationHandler.class.php');
require_once(USER_DIR . 'PrivilegeUser.class.php');

$authHandler = new PrivilegeAuthorizationHandler;
$user        = new PrivilegeUser;
$controller->setAuthorizationHandler($authHandler);
$controller->setUser($user);

$controller->dispatch();

?>
