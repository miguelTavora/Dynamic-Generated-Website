<?php

function getContentSubmitedByUser($username) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM contentfile";

    $result = mysqli_query($db, $sql);
    $output = '<div class="custom-select" style="border-radius: 10px;"><select id="district-name"><option value="0" selected="selected">Select content:</option>';
    $output2 = '</select><input class="select-selected" name="dist" id="district-name2" value="Select content:" style="background-color: #ececec;border-radius:10px;"><div class="select-items select-hide" id="teste">';
    $counter = 1;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            if ($row["id"] == $username) {
                $output = $output . '<option value="' . $counter . '">' . $row["name"] . '</option>';
                $output2 = $output2 . '<div id="d' . $counter . '">' . $row["name"] . '</div>';
                $counter++;
            }
        }
        $output2 = $output2 . '</div></div>';
        $output = $output . $output2;
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $output;
}

//muda a password baseado no username
function changePassword($username, $new_pass) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE tab SET pass='$new_pass' WHERE user='$username'";

    if (mysqli_query($db, $sql)) {
        mysqli_close($db);
        return true;
    } else {
        mysqli_close($db);
        return false;
    }
}

//verifica se existe na base dados o username, util para a função de cima que da true mesmo n existindo o user
function checkExistingUser($username) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM tab";

    $result = mysqli_query($db, $sql);
    $exists = false;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            if ($row["user"] == $username) {
                $exists = true;
                break;
            }
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $exists;
}

//retorna os distritos utilizados na base dados
function changeContent($code, $content_name) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if ($code == 3) {
        $sql = "DELETE FROM contentfile WHERE name='$content_name'";
    } else if ($code == 2 || $code == 1) {
        $real_code = $code - 1;
        $sql = "UPDATE contentfile SET public=$real_code WHERE name='$content_name'";
    } else {
        mysqli_close($db);
        return false;
    }

    if (mysqli_query($db, $sql)) {
        mysqli_close($db);
        return true;
    } else {
        mysqli_close($db);
        return false;
    }
}
