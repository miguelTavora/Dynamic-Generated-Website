<!DOCTYPE html>
<?php
require_once('classes/Indice.php');

$title = Indice::$title;

// PATH
$path = 'Location: http://localhost/examples-smi/05-a-WS-SOAP/index.php';

$sql = "SELECT * FROM tab";

$serverName = $_SERVER['SERVER_NAME'];

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $_INPUT_METHOD = INPUT_POST;
} elseif ($method == 'GET') {
    $_INPUT_METHOD = INPUT_GET;
} else {
    echo "Invalid HTTP method (" . $method . ")";
    exit();
}
$flags[] = FILTER_NULL_ON_FAILURE;

$username = filter_input($_INPUT_METHOD, 'username', FILTER_SANITIZE_STRING, $flags);
$password = filter_input($_INPUT_METHOD, 'password', FILTER_SANITIZE_STRING, $flags);

$counter_session = 0;
$incorrect = '';

if (isset($_POST['submit'])) {
    $con = new mysqli('localhost', 'root', '', 'base');//$host, $user, $pass, $db
    
    $query = mysqli_query($con, $sql);
    $total = mysqli_num_rows($query);
  
    //Build Post Request
    $secret = '6LdKRacZAAAAAPqui9Ak22r172KeQatD5ORCXeMk';
    $response = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $response;

    //validação do robô
    $verify = file_get_contents($url);
    $verify2 = json_decode($verify);
    $robot_verify = false;
    if($verify2->success){
        $robot_verify = true;
    }

    if ($total != 0) {
        while ($result = mysqli_fetch_assoc($query)) {
            if (!strcmp($result['user'], $username) && !strcmp($result['pass'], $password) && $robot_verify) {
                $_SESSION['user'] = $username;
                $_SESSION['email'] = findEmailByName($username);
                $_SESSION['pass'] = $password;
                $con->close();
                header($path);
            } else if(strcmp($result['user'], $username) || strcmp($result['pass'], $password)){
                if ($counter_session == 0) {
                    $incorrect = '<p class="invalid" style="font-size: 20px;color:#790604;">Username ou Palavra Passe incorreto</p>';
                    $counter_session++;
                }
                
            }
            else{
                $incorrect = '<p class="invalid" style="font-size: 20px;color:#790604;">Verifique que não é um robô</p>';
            }
        }
        $con->close();
    }
}

include 'templates/TemplateLogIn.php';
?>