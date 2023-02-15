<!DOCTYPE html>
<?php
require_once('classes/Indice.php');
require_once('classes/DebugConsole.php');
require_once('classes/Districts.php');
require_once('classes/Priority.php');

$title = Indice::$title;

if (isset($_GET['logout'])) {
    logoutBtn();
}

$sectionDis = sectionDistrictsUsed();//secetionDistricts();//mostra os distritos na base dados

$auth = checkUserLog($user);//true se o user estiver logado senao false

$conteudo = showContent($auth);//mostra conteudo baseado se o user esta logado ou não

$sectionVideo = showVideoContent($auth);//mostra conteudo videos

$show_logged = checkLogIn($user);//mostra tab do user quando está logado

$user_info = getVisebleContent($user,getPriority($user));//mostra quando logado a tab do user conforma as permissões

include 'templates/Template.php';
?>