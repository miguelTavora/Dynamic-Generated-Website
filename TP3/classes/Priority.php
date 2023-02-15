<?php

//retorna o valor da prioridade de um user caso não encontre retorna -1
function getPriority($username) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM prioridade";

    $result = mysqli_query($db, $sql);
    $prioridade = -1;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {// output data of each row
            if ($row["user"] == $username) {
                $prioridade = $row["prioridade"];
            }
        }
    } else {
        echo "0 results";
    }
    mysqli_close($db);
    return $prioridade;
}

//devolve true se conseguir meter na tabela de prioridade o user senão devolve false
function setPriorityBD($username, $priority) {
    $db = mysqli_connect("localhost", "root", "", "base");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $role = array("", "utilizador", "simpatizante", "admin");

    $sql = "INSERT INTO prioridade VALUES ('$username','$role[$priority]',$priority)";
    $result = mysqli_query($db, $sql);
    if ($result) {
        mysqli_close($db);
        return true;
    } else {
        mysqli_close($db);
        return false;
    }
}

function checkLogIn($username){
    if($username == ''){
        return '<li class="log"><a href="logIn.php">Log in</a></li><li class="log"><a href="Register.php">Register</a></li>';
    }
    else{
        return '<li class="log"><a href="index.php?logout=true" name="logout" type="submit">Log out</a></li>';
        
    }
}
//returna a tab do user conforme o tipo de utilizador
function getVisebleContent($username, $priority) {
    switch ($priority) {
        case -1:
            return '';
        case 1:
            return '<li class="drop-down log"><a href="#">'. $username . '</a><ul>
                    <li><a href="userInfo.php">User</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                    </li>';
        case 2:
            return '<li class="drop-down log"><a href="#">'. $username . '</a><ul>
                    <li><a href="userInfo.php">User</a></li>
                    <li><a href="uploadImage.php">Add content</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                    </li>';
        case 3:
            return '<li class="drop-down log"><a href="#">'. $username . '</a><ul>
                    <li><a href="userInfo.php">User</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="uploadImage.php">Add content</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                    </li>';
        default:
            return '';
    }
}

