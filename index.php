<?php
require "admin/Controllers/BaseController.php";
require "admin/Database/Database.php";
require "admin/Models/BaseModel.php";

if (!isset($_REQUEST['controller'])) {
	$controller = $_REQUEST['controller'] ?? 'HomeController';

	$action = $_REQUEST['action'] ?? 'index';

	require "admin/Controllers/HomeController.php";

	$controllerObject = new $controller;

	$controllerObject->$action();
} else {
	$controller = ucfirst((strtolower($_REQUEST['controller']) ?? 'dashboard') . 'Controller');

	$action = $_REQUEST['action'] ?? 'index';

	require "admin/Controllers/${controller}.php";

	$controllerObject = new $controller;

	$controllerObject->$action();
}
