<?php

function getUsers() {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM tab";

    $result = mysqli_query($db, $sql);


    $output = '<div class="custom-select" style="border-radius: 10px;"><select id="district-name"><option value="0" selected="selected">Select user:</option>';


    $output2 = '';
    $counter = 1;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            $output = $output . '<option value="' . $counter . '">' . $row["user"] . '</option>';
            $output2 = $output2 . '<div id="d' . $counter . '">' . $row["user"] . '</div>';
            $counter++;
        }
        $output = $output . '</select><input class="select-selected" name="dist" id="district-name2" value="Select user:" style="background-color: #ececec;border-radius:10px;"><div class="select-items select-hide" id="teste">';
        $output = $output . $output2 . '</div></div>';
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $output;
}

function getUsers2() {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM tab";

    $result = mysqli_query($db, $sql);

    $output = '<div class="custom-select" style="border-radius: 10px;position: relative;"><select id="district-name4"><option value="0" selected="selected">Select content:</option>';

    $output2 = '';
    $counter = 1;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            $output = $output . '<option value="' . $counter . '">' . $row["user"] . '</option>';
            $output2 = $output2 . '<div id="e' . $counter . '">' . $row["user"] . '</div>';
            $counter++;
        }
        $output = $output . '</select><input class="select-selected" name="dist2" id="district-name3" value="Select user:" style="background-color: #ececec;border-radius:10px;"><div class="select-items select-hide" id="teste2">';
        $output = $output . $output2 . '</div></div>';
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $output;
}

function getAllContent() {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM contentfile";

    $result = mysqli_query($db, $sql);
    $output = '<div class="custom-select" style="border-radius: 10px;position: relative;margin-top: 40px;"><select id="district-name6"><option value="0" selected="selected">Select content:</option>';
    $output2 = '';
    $counter = 1;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            $output = $output . '<option value="' . $counter . '">' . $row["name"] . '</option>';
            $output2 = $output2 . '<div id="f' . $counter . '">' . $row["name"] . '</div>';
            $counter++;
        }
        $output = $output . '<input class="select-selected" name="dist3" id="district-name5" value="Select content:" style="background-color: #ececec;border-radius:10px;"><div class="select-items select-hide" id="teste3">';
        $output = $output . $output2 . '</div></div>';
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $output;
}

function changeUserInfo($code, $user, $new_value) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if ($code == 3) {
        $sql = "DELETE FROM tab WHERE user='$user';";
        $sql2 = "DELETE FROM prioridade WHERE user='$user'";
    } else if ($code == 2) {
        $sql = "UPDATE tab SET pass='$new_value' WHERE user='$user'";
    } else if ($code == 1) {
        $sql = "UPDATE tab SET email='$new_value' WHERE user='$user'";
    } else {
        mysqli_close($db);
        return false;
    }

    if ($code == 3) {
        if (mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
            mysqli_close($db);
            return true;
        }
        mysqli_close($db);
        return false;
    } else if (mysqli_query($db, $sql)) {

        mysqli_close($db);
        return true;
    } else {
        mysqli_close($db);
        return false;
    }
}

function checkExistingEmail($email) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM tab";
    $exists = false;
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            if ($row["email"] == $email) {
                $exists = true;
            }
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $exists;
}

function changePriorityUserByAdmin($code, $user) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if ($code == 3) {
        $sql = "UPDATE prioridade SET tipo='admin' WHERE user='$user'";
        $sql2 = "UPDATE prioridade SET prioridade=3 WHERE user='$user'";
    } else if ($code == 2) {
        $sql = "UPDATE prioridade SET tipo='simpatizante' WHERE user='$user'";
        $sql2 = "UPDATE prioridade SET prioridade=2 WHERE user='$user'";
    } else if ($code == 1) {
        $sql = "UPDATE prioridade SET tipo='utilizador' WHERE user='$user'";
        $sql2 = "UPDATE prioridade SET prioridade=1 WHERE user='$user'";
    } else {
        mysqli_close($db);
        return false;
    }

    if (mysqli_query($db, $sql) && mysqli_query($db, $sql2)) {
        mysqli_close($db);
        return true;
    } else {
        mysqli_close($db);
        return false;
    }
}


function changeContentByAdmin($code, $content_name) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if ($code == 3) {
        $sql = "DELETE FROM contentfile WHERE name='$content_name';";
    } else if ($code == 2 || $code == 1) {
        $real_val = $code-1;
        $sql = "UPDATE contentfile SET public=$real_val WHERE name='$content_name'";
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

/*<div class="custom-select" style="border-radius: 10px;">
                                <select id="district-name">
                                    <option value="0" selected="selected">Select content:</option>
                                    <option value="1">Templo Romano</option>
                                    <option value="2">Santuário de Fátima</option>
                                    <option value="3">Castelo dos Mouros</option>
                                    <option value="4">Castelo de São Jorge</option>
                                    <option value="5">Cristo Rei</option>
                                    <option value="6">Mosteiro dos Jerónimos</option>
                                    <option value="7">Palácio Nacional de Mafra</option>
                                    <option value="8">Palácio Nacional da Pena</option>
                                    <option value="9">Torre de Belém</option>
                                    <option value="10">Fundação de Serralves</option>
                                    <option value="11">Palácio de Cristal</option>
                                    <option value="12">Mosteiro da Batalha</option>
                                    <option value="13">Mosteiro de Alcobaça</option>
                                    <option value="14">Convento de Cristo</option>
                                    <option value="15">Castelo de Almourol</option>
                                    <option value="16">Capela dos Ossos</option>
                                    <option value="17">Museu Calouste Gulbenkian</option>
                                    <option value="18">Convento do Carmo</option>
                                    <option value="19">Castelo de Guimarães</option>
                                    <option value="20">Santuário Jesus do Monte</option>
                                    <option value="21">Exemplos Monúmentos</option>
                                    <option value="22">Monumentos mais vistos</option>
                                    <option value="23">Monumentos de exemplo</option>
                                    <option value="24">Exemplos Monúmentos 2</option>
                                    <option value="25">Sé Velha</option>
                                </select>
                                <input class="select-selected" name="dist" id="district-name2" value="Select user:" style="background-color: #ececec;border-radius:10px;">
                                <div class="select-items select-hide" id="teste">
                                    <div id="d1">Templo Romano</div>
                                    <div id="d2">Santuário de Fátima</div>
                                    <div id="d3">Castelo dos Mouros</div>
                                    <div id="d4">Castelo de São Jorge</div>
                                    <div id="d5">Cristo Rei</div>
                                    <div id="d6">Mosteiro dos Jerónimos</div>
                                    <div id="d7">Palácio Nacional de Mafra</div>
                                    <div id="d8">Palácio Nacional da Pena</div>
                                    <div id="d9">Torre de Belém</div>
                                    <div id="d10">Fundação de Serralves</div>
                                    <div id="d11">Palácio de Cristal</div>
                                    <div id="d12">Mosteiro da Batalha</div>
                                    <div id="d13">Mosteiro de Alcobaça</div>
                                    <div id="d14">Convento de Cristo</div>
                                    <div id="d15">Castelo de Almourol</div>
                                    <div id="d16">Capela dos Ossos</div>
                                    <div id="d17">Museu Calouste Gulbenkian</div>
                                    <div id="d18">Convento do Carmo</div>
                                    <div id="d19">Castelo de Guimarães</div>
                                    <div id="d20">Santuário Jesus do Monte</div>
                                    <div id="d21">Exemplos Monúmentos</div>
                                    <div id="d22">Monumentos mais vistos</div>
                                    <div id="d23">Monumentos de exemplo</div>
                                    <div id="d24">Exemplos Monúmentos 2</div>
                                    <div id="d25">Sé Velha</div>
                                </div>
                            </div>*/


/*<div class="custom-select" style="border-radius: 10px;position: relative;">
                                <select id="district-name4">
                                    <option value="0" selected="selected">Select content:</option>
                                    <option value="1">Templo Romano</option>
                                    <option value="2">Santuário de Fátima</option>
                                    <option value="3">Castelo dos Mouros</option>
                                    <option value="4">Castelo de São Jorge</option>
                                    <option value="5">Cristo Rei</option>
                                    <option value="6">Mosteiro dos Jerónimos</option>
                                    <option value="7">Palácio Nacional de Mafra</option>
                                    <option value="8">Palácio Nacional da Pena</option>
                                    <option value="9">Torre de Belém</option>
                                    <option value="10">Fundação de Serralves</option>
                                    <option value="11">Palácio de Cristal</option>
                                </select>
                                <input class="select-selected" name="dist" id="district-name3" value="Select user:" style="background-color: #ececec;border-radius:10px;">
                                <div class="select-items select-hide" id="teste2">
                                    <div id="e1">Templo Romano</div>
                                    <div id="e2">Santuário de Fátima</div>
                                    <div id="e3">Castelo dos Mouros</div>
                                    <div id="e4">Castelo de São Jorge</div>
                                    <div id="e5">Cristo Rei</div>
                                    <div id="e6">Mosteiro dos Jerónimos</div>
                                    <div id="e7">Palácio Nacional de Mafra</div>
                                    <div id="e8">Palácio Nacional da Pena</div>
                                    <div id="e9">Torre de Belém</div>
                                    <div id="e10">Fundação de Serralves</div>
                                    <div id="e11">Palácio de Cristal</div>
                                </div>
                            </div>*/

/*<div class="custom-select" style="border-radius: 10px;position: relative;margin-top: 40px;">
                                <select id="district-name6">
                                    <option value="0" selected="selected">Select content:</option>
                                    <option value="1">Templo Romano</option>
                                    <option value="2">Santuário de Fátima</option>
                                    <option value="3">Castelo dos Mouros</option>
                                    <option value="4">Castelo de São Jorge</option>
                                    <option value="5">Cristo Rei</option>
                                    <option value="6">Mosteiro dos Jerónimos</option>
                                    <option value="7">Palácio Nacional de Mafra</option>
                                    <option value="8">Palácio Nacional da Pena</option>
                                    <option value="9">Torre de Belém</option>
                                    <option value="10">Fundação de Serralves</option>
                                    <option value="11">Palácio de Cristal</option>
                                </select>
                                <input class="select-selected" name="dist3" id="district-name5" value="Select content:" style="background-color: #ececec;border-radius:10px;">
                                <div class="select-items select-hide" id="teste3">
                                    <div id="f1">Templo Romano</div>
                                    <div id="f2">Santuário de Fátima</div>
                                    <div id="f3">Castelo dos Mouros</div>
                                    <div id="e4">Castelo de São Jorge</div>
                                    <div id="e5">Cristo Rei</div>
                                    <div id="e6">Mosteiro dos Jerónimos</div>
                                    <div id="e7">Palácio Nacional de Mafra</div>
                                    <div id="e8">Palácio Nacional da Pena</div>
                                    <div id="e9">Torre de Belém</div>
                                    <div id="e10">Fundação de Serralves</div>
                                    <div id="e11">Palácio de Cristal</div>
                                </div>
                            </div>*/