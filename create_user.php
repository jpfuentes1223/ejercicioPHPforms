<?php

$mysqli = new mysqli("localhost", "root", "", "ejerciciophp_users");
$username = $_POST['user_name'];
$surname = $_POST['sur_name'];
$nickname = $_POST['nick_name'];
$password = $_POST['password'];
$score = 0;
$user_exists = false;

if ($mysqli->connect_errno) {
    echo ("Connect failed: " . $mysqli->connect_errno);
    exit();
}
$result_check = $mysqli->query("SELECT * from users");
while ($row = $result_check->fetch_object()) {
    if ($row->Nick == $nickname) {
        $user_exists = true;
        break;
    }
}

if (!$user_exists) {
    $result = $mysqli->query("INSERT INTO users(Id, Name, Surname, Nick, Passwd, Score) VALUES(null, '$username', '$surname', '$nickname', '$password',0)");
    echo 'Usuario creado satisfactoriamente!<br/> <a href="forms.html"><button type ="button">Volver atras</button></a>';
} else {
    echo 'El nombre de usuario '.$nickname.' ya existe<br/> <a href="forms.html"><button type ="button">Volver atras</button></a>';
    
}


$mysqli->close();
