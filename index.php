<?php
//TODO: fix DAL-classes so they work with the new tables, gonna have varchar as PK instead of int

require_once("app/view/IView.php");
require_once("app/controller/MasterController.php");


if (Settings::DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}

$mc = new \controller\MasterController();

$mc->run();

