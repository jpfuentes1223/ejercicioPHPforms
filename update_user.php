<?php

$mysqli = new mysqli("localhost", "root", "", "ejerciciophp_users");
$id = $_GET['id'];
$score = $_GET['score'];

if ($id == null) {
    echo("Debe de introducir un ID valido <br/>");
    echo '<a href="forms.html"><button type="button">Volver atras</button></a>';
    exit();
}
if ($score == null) {
    echo("Debe de introducir un score valido <br/>");
    echo '<a href="forms.html"><button type="button">Volver atras</button></a>';
    exit();
}
if ($mysqli->connect_errno) {
    echo ("Connect failed: " . $mysqli->connect_errno);
    exit();
}

$result_check = $mysqli->query("SELECT * from users WHERE ID = " . $id);
if ($result_check->num_rows <= 0) {
    echo("No existe un usuario con ese ID <br/>");
    echo '<a href="forms.html"><button type="button">Volver atras</button></a>';
    exit();
}

$result = $mysqli->query("UPDATE users SET Score=$score WHERE Id=$id ");
echo("Usuario de Id $id actualizado correctamente con una puntuacion de $score");
echo '<a href="forms.html"><button type="button">Volver atras</button></a>';

$mysqli->close();
