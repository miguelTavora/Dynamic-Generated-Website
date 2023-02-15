<?php

function getDistricts() {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM districts";

    $result = mysqli_query($db, $sql);

    $output = '<div class="custom-select"><select id="district-name"><option value="0" selected="selected">Select district:</option>';
    $output2 = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            $output = $output . '<option value="' . $row["id"] . '">' . $row["district"] . '</option>';
            $output2 = $output2 . '<div id="d' . $row["id"] . '">' . $row["district"] . '</div>';
        }
        $output = $output . '</select><input class="select-selected" name="dist" id="district-name2" value="Select district:"/><div class="select-items select-hide" id="teste">';
        $output = $output . $output2 . '</div></div>';
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $output;
}

//retorna todos os distritos
function secetionDistricts() {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM districts";

    $result = mysqli_query($db, $sql);
    $output = '<div class="row"><div class="col-lg-12"><ul id="portfolio-flters"><li data-filter="*" class="filter-active"style="border: 2px solid black;font-size: 13px;">All</li>';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            $output = $output . '<li data-filter=".filter-' . $row["id"] . '"style="border: 2px solid black;font-size: 13px;">' . $row["district"] . '</li>';
        }
        $output = $output . '</ul></div></div>';
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $output;
}
//retorna os distritos utilizados na base dados
function sectionDistrictsUsed() {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM contentfile";


    $valueStored = array();
    $result = mysqli_query($db, $sql);
    $output = '<div class="row"><div class="col-lg-12"><ul id="portfolio-flters"><li data-filter="*" class="filter-active"style="border: 2px solid black;font-size: 13px;">All</li>';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            $indexDis = getDistrictIndex($row["district"]);
            if ($indexDis != -1 && !in_array($row["district"], $valueStored) && $row["file"] == "image") {
                $output = $output . '<li data-filter=".filter-' . $indexDis . '"style="border: 2px solid black;font-size: 13px;">' . $row["district"] . '</li>';
                array_push($valueStored, $row["district"]);
            }
        }
        $output = $output . '</ul></div></div>';
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $output;
}


function showContent($authorization) {//param de se for false não tem autorização
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM contentfile";

    $result = mysqli_query($db, $sql);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            if (($row["public"] == 0 || ($row["public"] == 1 && $authorization)) && $row["file"] == "image") {
                $index = getDistrictIndex($row["district"]);
                $output = $output . '<div class="col-lg-4 col-md-6 portfolio-item filter-';
                $output = $output . $index . ' wow fadeInUp" data-wow-delay="0.1s"><div class="portfolio-wrap" href="details.php?image='.$row["image"].'"><figure><img src="Img/';
                $output = $output . $row["id"] . '/' . $row["image"] . '"class="img-fluid" alt="" width="800" height="600"></figure><div class="portfolio-info"><h4><a href="details.php?image='.$row["image"].'">';
                $output = $output . $row["name"] . '</a></h4><p>' . $row["district"] . '</p></div></div></div>';
            }
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $output;
}

function getDistrictIndex($district) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM districts";

    $result = mysqli_query($db, $sql);
    $index = 0;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["district"] == $district) {
                $index = $row["id"];
                break;
            }
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $index;
}

function checkUserLog($username) {
    if ($username != '') {
        return true;
    }
    return false;
}


function showVideoContent($authorization) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM contentfile";

    $result = mysqli_query($db, $sql);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            if (($row["public"] == 0 || ($row["public"] == 1 && $authorization)) && $row["file"] == "video") {
                $index = getDistrictIndex($row["district"]);
                $output = $output . '<div class="col-lg-4 col-md-6 portfolio-item filter-';
                $output = $output . $index . ' wow fadeInUp" data-wow-delay="0.1s"><div class="portfolio-wrap" href="#"><div class="card"><figure><video class="img-fluid" width="800" height="600" playsinline autoplay muted loop>';
                $output = $output . '<source src="Img/' . $row["id"] . '/' . $row["image"] . '" type="video/mp4"></video></div><div class="portfolio-info"><h4><a href="#">';
                $output = $output . $row["name"] . '</a></h4><p>' . $row["district"] . '</p></div></div></div>';
            }
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $output;
}

//retorna false se já não existe a imagem na base dados e true se sim
function checkExistingImg($img) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM contentfile";

    $result = mysqli_query($db, $sql);
    $exists = false;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            if ($row["image"] == $img) {
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

//retorna false se já não existe o nome da publicação na base dados e true se sim
function checkExistingName($name) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM contentfile";

    $result = mysqli_query($db, $sql);
    $exists = false;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            if ($row["name"] == $name) {
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