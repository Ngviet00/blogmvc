<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

require "./Controllers/BaseController.php";
require "./Database/Database.php";
require "./Models/BaseModel.php";


if(!isset($_REQUEST['controller'])){	
	header("Location:login.php");
}
else{
	$controller = ucfirst((strtolower($_REQUEST['controller']) ?? 'dashboard') . 'Controller');

	$action = $_REQUEST['action'] ?? 'index';

	require "./Controllers/${controller}.php";

	$controllerObject = new $controller;

	$controllerObject->$action();
}
