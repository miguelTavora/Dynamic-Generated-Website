<!DOCTYPE html>
<?php
require_once('classes/Indice.php');
require_once('classes/Districts.php');
require_once('classes/Priority.php');
require_once('scripts/comboBox.php');

$title = Indice::$title;

$username = $user;

$msg = '';
$msg_error = '';

$districts = getDistricts();


if (isset($_POST['submit'])) {
    // Create database connection
    $db = new mysqli("localhost", "root", "", "base");
    // Get image name
    $image = $_FILES['image']['name'];

    //nome monumento
    $name = $_POST['monument-name'];

    // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['content']);

    // image file directory
    $target = "Img/" . $username . "/" . basename($image);

    //verificação da privacidade do conteudo
    $radioVal = $_POST["publicity"];
    $public = -1;
    if ($radioVal == "option1") {
        $public = 0;
    } else if ($radioVal == "option2") {
        $public = 1;
    }

    //distrito selecionado
    $selDistrict = $_POST['dist'];

    //verificação da extensão do ficheiro
    $allowed_img = array('png', 'jpg', 'jpeg');
    $allowed_video = array('mp4', 'm4a', 'm4v', 'f4v', 'f4a', '3gp', 'ogg');
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $type_file = '';
    if (in_array($ext, $allowed_img)) {
        $type_file = 'image';
    } else if (in_array($ext, $allowed_video)) {
        $type_file = 'video';
    }

    //verificar prioridade
    $prioUser = getPriority($username);

    $existingImg = checkExistingImg($image); //retorna false se não existir e true se existir a imagem na bd
    
    $existingPubName = checkExistingName($name);//retorna false se não existir nenhum monumento com o nome dado pelo utilizador true se existir

    if ($username != '' && $_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && strlen($name) > 2 && strlen($name) < 40 && strlen($image_text) > 9 && strlen($image_text) < 1000 && $public != -1 && $type_file != '' && $selDistrict != 'Select district:' && $prioUser > 1 && !$existingImg && !$existingPubName) {
        $sql = "INSERT INTO contentfile (id, image, name, content, public, district, file) VALUES ('$username','$image','$name','$image_text' , $public, '$selDistrict', '$type_file');";

        // execute query
        mysqli_query($db, $sql);

        //verifica se existe a diretoria com o nome do user se não existir cria
        if (!file_exists('Img/' . $username)) {
            mkdir('Img/' . $username, 0777, true);
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = '<h1 style="padding-bottom: 10px; color:#7f7fff;">Content submited with sucess</h1>';
            $msg_error = '';
            $db->close();
        }
    } else if ($type_file == '') {
        $msg = '';
        $msg_error = '<h3 style="text-align: center;color:#DC143C">File extension is not authorized</h3>';
        $db->close();
    } else if ($selDistrict == 'Select district:') {
        $msg = '';
        $msg_error = '<h3 style="text-align: center;color:#DC143C">A district must be selected</h3>';
        $db->close();
    } else if ($prioUser < 2) {
        $msg = '';
        $msg_error = '<h3 style="text-align: center;color:#DC143C">You dont have priority to submit content</h3>';
        $db->close();
    } else if ($existingImg) {
        $msg = '';
        $msg_error = '<h3 style="text-align: center;color:#DC143C">There is a image in the data base with the same name as your image, please change the name</h3>';
        $db->close();
    }else if ($existingPubName) {
        $msg = '';
        $msg_error = '<h3 style="text-align: center;color:#DC143C">The name of the publication already exists please change</h3>';
        $db->close();
    } else {
        $msg = '';
        $msg_error = '<h3 style="text-align: center;color:#DC143C">Error submiting the content</h3>';
        $db->close();
    }
}

include 'templates/TemplateUpload.php';


