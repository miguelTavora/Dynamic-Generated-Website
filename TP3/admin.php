<!DOCTYPE html>
<?php
require_once('classes/Indice.php');
require_once('classes/AdminEditor.php');
require_once('scripts/comboBox.php');
require_once('classes/Priority.php');

$title = Indice::$title;

$submit_text = '';

$priority = getPriority($user);

$all_user = getUsers();
$all_user2 = getUsers2();
$all_content = getAllContent();


if (isset($_POST['submit1'])) {//submissão alteração do utilizador
//verificação da seleção do utilizador
    $radioVal = $_POST["user"];
    $edit = -1;
    if ($radioVal == "option1") {
        $edit = 1;
    } else if ($radioVal == "option2") {
        $edit = 2;
    } else if ($radioVal == "option3") {
        $edit = 3;
    }

    $selUser = $_POST['dist']; //user selecionado
    $newValue = $_POST['new']; //valor escrito pelo utilizador

    if ($edit != -1 && $priority > 2 && $selUser != 'Select user:') {
        if ($edit == 2) {//mudança password
            if (!preg_match('/[^A-Za-z0-9]/', $newValue) && strlen($newValue) > 5 && strlen($newValue) < 50) {
                if (changeUserInfo($edit, $selUser, $newValue)) {
                    $submit_text = '<h1 style="padding-bottom: 10px; color:#7f7fff;">Content changed with sucess</h1>';
                } else {
                    $submit_text = '<h3 style="text-align: center;color:#DC143C">Error sending the info</h3>';
                }
            } else {
                $submit_text = '<h3 style="text-align: center;color:#DC143C">Password dont have only english letters and numbers or has less than 6 characters or more than 50</h3>';
            }
        } else if ($edit == 1) {//mundaça email
            if (filter_var($newValue, FILTER_VALIDATE_EMAIL)) {
                if (!checkExistingEmail($newValue)) {
                    if (changeUserInfo($edit, $selUser, $newValue)) {
                        $submit_text = '<h1 style="padding-bottom: 10px; color:#7f7fff;">Content changed with sucess</h1>';
                    } else {
                        $submit_text = '<h3 style="text-align: center;color:#DC143C">Error sending the info</h3>';
                    }
                } else {
                    $submit_text = '<h3 style="text-align: center;color:#DC143C">The email already exists</h3>';
                }
            } else {
                $submit_text = '<h3 style="text-align: center;color:#DC143C">The email is not valid</h3>';
            }
        } else if ($edit == 3) {//apagas user
            if (changeUserInfo($edit, $selUser, '')) {
                $submit_text = '<h1 style="padding-bottom: 10px; color:#7f7fff;">Content changed with sucess</h1>';
            } else {
                $submit_text = '<h3 style="text-align: center;color:#DC143C">Error sending the info</h3>';
            }
        }
    } else {
        $submit_text = '<h3 style="text-align: center;color:#DC143C">Error sending the info</h3>';
    }
}

if (isset($_POST['submit2'])) {//submissão alteração da prioridade do utilizador
//verificação da seleção do utilizador
    $radioVal = $_POST["priority"];
    $edit = -1;
    if ($radioVal == "o1") {
        $edit = 1;
    } else if ($radioVal == "o2") {
        $edit = 2;
    } else if ($radioVal == "o3") {
        $edit = 3;
    }

    $selUser = $_POST['dist2']; //prioridade selecionado

    if ($edit != -1 && $priority > 2 && $selUser != 'Select user:') {
        if (changePriorityUserByAdmin($edit, $selUser)) {
            $submit_text = '<h1 style="padding-bottom: 10px; color:#7f7fff;">Priority changed with success</h1>';
        } else {
            $submit_text = '<h3 style="text-align: center;color:#DC143C">Error changing the priority</h3>';
        }
    }
}

if (isset($_POST['submit3'])) {//alteração dos conteudos
//verificação da seleção do utilizador
    $radioVal = $_POST["cont"];
    $edit = -1;
    if ($radioVal == "opt1") {
        $edit = 1;
    } else if ($radioVal == "opt2") {
        $edit = 2;
    } else if ($radioVal == "opt3") {
        $edit = 3;
    }

    $selUser = $_POST['dist3']; //prioridade selecionado

    if ($edit != -1 && $priority > 2 && $selUser != 'Select content:') {
        if (changeContentByAdmin($edit, $selUser)) {
            $submit_text = '<h1 style="padding-bottom: 10px; color:#7f7fff;">Content changed with sucess</h1>';
        } else {
            $submit_text = '<h3 style="text-align: center;color:#DC143C">Error changing the content</h3>';
        }
    } else {
        $submit_text = '<h3 style="text-align: center;color:#DC143C">Error changing the data</h3>';
    }
}

include 'templates/TemplateAdmin.php';
