<!DOCTYPE html>
<?php
require_once('classes/Indice.php');
require_once('classes/Content.php');
require_once('scripts/comboBox.php');
require_once('classes/Priority.php');

$title = Indice::$title;

$submit_text = '';

$priority = getPriority($user);
$edit_content = '';
$edit_content2 = '';
$script_content = '';
$user_content = '';


if ($priority > 1) {
    $edit_content = '<form method="POST" id="form2" onsubmit="return validateContentUser()"><ul class="nav nav-tabs" id="myTab" role="tablist"></ul><h3 style="margin-top: 20px;margin-bottom: 20px;">Change content</h3>';
    $edit_content2 = '<div class="col-md-3" style="margin-top: 20px;margin-bottom: 20px;">
                                    <div class="align-privacy" >
                                        <div class="form-check form-check-inline" style="position:static;">
                                            <input class="form-check-input" type="radio" name="publicity" id="public" value="option1" required>
                                            <label class="form-check-label" for="inlineRadio1">Public</label>
                                        </div>
                                        <div class="form-check form-check-inline" style="position:static;">
                                            <input class="form-check-input" type="radio" name="publicity" id="private" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Private</label>
                                        </div>
                                        <div class="form-check form-check-inline" style="position:static;">
                                            <input class="form-check-input" type="radio" name="publicity" id="delete" value="option3">
                                            <label class="form-check-label" for="inlineRadio2">Delete</label>
                                        </div>
                                    </div>
                                    <button id="resetBtn" class="profile-edit-btn" type="button" style="margin-top: 20px;background-color: #7D746C; color: #fff;">Reset</button>
                                    <button id="submitContent" name="submitContent" class="profile-edit-btn" type="submit"style="margin-top: 150px;">Submit</button>
                                    <button id="hide" class="profile-edit-btn" type="submit"style="margin-top: 20px;background-color:#b2b2ff;">Hide edition</button>
                                    <p id="invalid2" class="invalid" style="font-size: 16px; text-align: center;margin-top:10px;"/>
                                </div>
                            </form>';
    $script_content = '<script>selectorDistrict();document.addEventListener("click", closeAllSelect);</script>';
    $user_content = getContentSubmitedByUser($user);
}



if (isset($_POST['submit1'])) {//submissão da troca password
    $last_pass = $_POST['pass1'];
    $new_pass = $_POST['pass2'];
    $confirm_pass = $_POST['pass3'];
    if ($priority > 0 && $new_pass == $confirm_pass && strlen($new_pass) > 5 && strlen($new_pass) < 51 && !preg_match('/[^A-Za-z0-9]/', $new_pass)) {
        if (checkExistingUser($user)) {//verifica existe o username, proxima função na faz essa validação
            if (changePassword($user, $new_pass)) {
                $submit_text = '<h1 style="padding-bottom: 10px; color:#7f7fff;">Password changed with sucess</h1>';
            } else {
                $submit_text = '<h3 style="text-align: center;color:#DC143C">Error changing the password</h3>';
            }
        } else {
            $submit_text = '<h3 style="text-align: center;color:#DC143C">Your username dont exist</h3>';
        }
    } else if (preg_match('/[^A-Za-z0-9]/', $new_pass)) {
        $submit_text = '<h3 style="text-align: center;color:#DC143C">Your password can only have english characters and numbers</h3>';
    } else {
        $submit_text = '<h3 style="text-align: center;color:#DC143C">Error submiting the data</h3>';
    }
}

if (isset($_POST['submitContent'])) {
    //verificação da seleção do utilizador
    $radioVal = $_POST["publicity"];
    $public = -1;
    if ($radioVal == "option1") {
        $public = 1;
    } else if ($radioVal == "option2") {
        $public = 2;
    } else if ($radioVal == "option3") {
        $public = 3;
    }

    $selCon = $_POST['dist'];//publicação selecionada
    if( $public != -1 && $priority> 1 && $selCon != 'Select content:'){
        if(changeContent($public,$selCon)){
            $submit_text = '<h1 style="padding-bottom: 10px; color:#7f7fff;">Content changed with sucess</h1>';
        }
    }
    else{
        $submit_text = '<h3 style="text-align: center;color:#DC143C">Error submiting the data</h3>';
    }
}

include 'templates/TemplateUserinfo.php';
