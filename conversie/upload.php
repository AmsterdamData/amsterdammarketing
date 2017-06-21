<?php
include("../../AODS/AODS.php"); //Connector to Amsterdam Open Data Store
include("../../box/SharedDataExchange.php");
include("settings.php");

$AODS = new AODS();
$AODS->upload(DATAFOLDER . "Activiteiten.csv");
$AODS->upload(DATAFOLDER . "Tentoonstellingen.csv");
$AODS->upload(DATAFOLDER . "Attracties.csv");
$AODS->upload(DATAFOLDER . "EtenDrinken.csv");
$AODS->upload(DATAFOLDER . "Evenementen.csv");  
$AODS->upload(DATAFOLDER . "Festivals.csv");
$AODS->upload(DATAFOLDER . "MuseaGalleries.csv");
$AODS->upload(DATAFOLDER . "Shoppen.csv");
$AODS->upload(DATAFOLDER . "Theater.csv");
$AODS->upload(DATAFOLDER . "UitInAmsterdam.csv");

$AODS->upload(DATAFOLDER . "Tentoonstellingen.json");
$AODS->upload(DATAFOLDER . "Activiteiten.json");
$AODS->upload(DATAFOLDER . "Attracties.json");
$AODS->upload(DATAFOLDER . "EtenDrinken.json");
$AODS->upload(DATAFOLDER . "Evenementen.json");  
$AODS->upload(DATAFOLDER . "Festivals.json");
$AODS->upload(DATAFOLDER . "MuseaGalleries.json");
$AODS->upload(DATAFOLDER . "Shoppen.json");
$AODS->upload(DATAFOLDER . "Theater.json");
$AODS->upload(DATAFOLDER . "UitInAmsterdam.json");

/*
$SDE = new SharedDataExchange();
$SDE->setFolder("/Toerisme Zakelijk/Toerisme & Cultuur");
$SDE->upload(DATAFOLDER . "Evenementen.csv");
$SDE->upload(DATAFOLDER . "Tentoonstellingen.csv");
$SDE->upload(DATAFOLDER . "Activiteiten.csv");
$SDE->upload(DATAFOLDER . "Festivals.csv");
$SDE->upload(DATAFOLDER . "MuseaGalleries.csv");
$SDE->upload(DATAFOLDER . "Shoppen.csv");
$SDE->upload(DATAFOLDER . "Theater.csv");

$SDE->setFolder("/Toerisme Zakelijk/Horeca/");
$SDE->upload(DATAFOLDER . "EtenDrinken.csv");
$SDE->upload(DATAFOLDER . "UitInAmsterdam.csv");
*/
?>
