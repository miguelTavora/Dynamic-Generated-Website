<?php

$user;
$email_user;
$pass;

session_start();

if (!isset($_SESSION['user'])) {
    $user = '';
} else {
    $user = $_SESSION['user'];
}

if (!isset($_SESSION['email'])) {
    $email_user = '';
} else {
    $email_user = $_SESSION['email'];
}

if (!isset($_SESSION['pass'])) {
    $pass = '';
} else {
    $pass = $_SESSION['pass'];
}

function logoutBtn() {
    global $user,$email_user,$pass;
    session_destroy();
    $user = '';
    $email_user = '';
    $pass = '';
    session_start();
}

function findEmailByName($username){
    $db = mysqli_connect("localhost", "root", "", "base");
   
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM tab";

    $result = mysqli_query($db, $sql);

    $email = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            if($username == $row["user"]){
                $email = $row["email"];
                break;
            }
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $email;
}

class Indice {
    public static $title = "Portugal Monuments";
}
