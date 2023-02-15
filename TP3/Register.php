<!DOCTYPE html>
<?php
require_once('classes/Indice.php');
require_once('classes/Priority.php');
$title = Indice::$title;

$path = 'Location: http://localhost/examples-smi/05-a-WS-SOAP/index.php';

$method = $_SERVER['REQUEST_METHOD'];

$serverName = $_SERVER['SERVER_NAME'];

if ($method == 'POST') {
    $_INPUT_METHOD = INPUT_POST;
} else if ($method == 'GET') {
    $_INPUT_METHOD = INPUT_GET;
} else {
    echo "Invalid HTTP method (" . $method . ")";
    exit();
}

$flags[] = FILTER_NULL_ON_FAILURE;

$username = filter_input($_INPUT_METHOD, 'username', FILTER_SANITIZE_STRING, $flags);
$password = filter_input($_INPUT_METHOD, 'password', FILTER_SANITIZE_STRING, $flags);
$email = filter_input($_INPUT_METHOD, 'email', FILTER_SANITIZE_STRING, $flags);

$incorrect = '';

if (isset($_POST['submit'])) {
    $con = new mysqli('localhost', 'root', '', 'base');//$host, $user, $pass, $db
    
    if (!preg_match('/[^A-Za-z0-9]/', $username)) {// string contains only english letters & digits   
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($username) > 3 && strlen($password) > 5 && strlen($username) < 26 && strlen($password) < 51) {//validação lado servidor
            $sql_check = "SELECT * FROM tab";
            $query_check = mysqli_query($con, $sql_check);
            $check_inform = false;

            //Build Post Request
            $secret = '6LdKRacZAAAAAPqui9Ak22r172KeQatD5ORCXeMk';
            $response = $_POST['g-recaptcha-response'];
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $response;

            //validação do robô
            $verify = file_get_contents($url);
            $verify2 = json_decode($verify);
            $robot_verify = false;
            if ($verify2->success) {
                $robot_verify = true;
            }

            while ($result = mysqli_fetch_assoc($query_check)) {//veificar se já existe o user ou email na base dados
                if (!strcmp($result['user'], $username) || !strcmp($result['email'], $email)) {
                    $check_inform = true;
                    break;
                }
            }
            $priUser =  setPriorityBD($username,1);//devolve true se conseguir meter na tabela prioridade
            
            if (!$check_inform && $robot_verify && $priUser) {
                $query2 = "SELECT * FROM tab";
                $data = mysqli_query($con, $query2);
                $total = mysqli_num_rows($data);

                $sql = "INSERT INTO tab VALUES ('$username','$password','$email')";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    $con->close();
                    header($path);
                }
            } else if ($check_inform) {
                $con->close();
                $incorrect = '<p class="invalid" style="font-size: 20px;color:#790604;">The username or email already exist</p>';
            }else if(!$priUser){
                $con->close();
                $incorrect = '<p class="invalid" style="font-size: 20px;color:#790604;">The priority of your username couldnt be assigned</p>';
            }
            else {
                $con->close();
                $incorrect = '<p class="invalid" style="font-size: 20px;color:#790604;">Verify that you are not a robot</p>';
            }
        } else {
            $con->close();
            $incorrect = '<p class="invalid" style="font-size: 20px;color:#790604;">Submited data is not correct</p>';
        }
    } else {
        $con->close();
        $incorrect = '<p class="invalid" style="font-size: 20px;color:#790604;">The username can only contain numbers and letters</p>';
    }
}

include 'templates/TemplateRegister.php';
?>