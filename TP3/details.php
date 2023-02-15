<!DOCTYPE html>
<?php
require_once('classes/Indice.php');
require_once('classes/Maps.php');
require_once('classes/Districts.php');

$title = Indice::$title;

$map = getContentOfMonument($_GET['image']);//vai buscar o googleMaps

$auth = checkUserLog($user);//true se o user estiver logado senao false

$info = getNameAndDistrict($_GET['image'],$auth);//Nome e distrito

$description = getDescription($_GET['image'],$auth);//descrição monumento


include 'templates/TemplateDetails.php';