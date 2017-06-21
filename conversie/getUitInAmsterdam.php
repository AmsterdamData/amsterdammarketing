<?php
require_once 'items.php';
require_once 'csv.php';
require_once("settings.php");

error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
set_time_limit(600);
ini_set('memory_limit', '256M');

$items = new Items();
$items->setDebug(false);
$items->setOutput(DATAFOLDER . "UitInAmsterdam.csv");
$items->setTypeStart("2.1.3");
$items->setAppend(false);
$items->getItems();
$items->saveToCSV();


$items = new Items();
$items->setDebug(false);
$items->setOutput(DATAFOLDER . "UitInAmsterdam.csv");
$items->setTypeStart("3.3.1");
$items->setAppend(true);
$items->getItems();
$items->saveToCSV();


$items = new Items();
$items->setDebug(false);
$items->setOutput(DATAFOLDER . "UitInAmsterdam.csv");
$items->setTypeStart("3.3.2");
$items->setAppend(true);
$items->getItems();
$items->saveToCSV();


$items = new Items();
$items->setDebug(false);
$items->setOutput(DATAFOLDER . "UitInAmsterdam.csv");
$items->setTypeStart("4.3.5");
$items->setAppend(true);
$items->getItems();
$items->saveToCSV();

?>
