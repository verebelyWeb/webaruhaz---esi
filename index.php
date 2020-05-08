<?php

ini_set('display_errors', '1');

define('APPPATH', 'Application/');
define('CONF_FILE_PATH', 'config.json');

$controller = @$_GET['c'] ? $_GET['c'] : 'home';


require_once APPPATH.'Core/controllers.php';
require_once APPPATH.'Core/functions.php';
require_once APPPATH.'Database/database.php';

require_once APPPATH.'Core/core.php';