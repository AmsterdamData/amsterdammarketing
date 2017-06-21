<?php
require_once 'items.php';
require_once 'csv.php';
require_once("settings.php");

error_reporting(E_ALL ^E_NOTICE);
set_time_limit(600);
ini_set('memory_limit', '256M');

$items = new Items();
$items->setDebug(false);
$items->setOutput(DATAFOLDER . "AllEvenementen.csv");
$items->setTypeStart("2.3.");
$items->setNoDateFilter();
$items->setAppend(false);
$items->getItems();
$items->saveToCSV();

$items = new Items();
$items->setDebug(false);
$items->setOutput(DATAFOLDER . "AllEvenementen.csv");
$items->setTypeStart("2.4.");
$items->setNoDateFilter();
$items->setAppend(true);
$items->getItems();
$items->saveToCSV();

?>
