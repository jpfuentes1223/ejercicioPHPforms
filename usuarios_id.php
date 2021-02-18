<?php

$mysqli = new mysqli("localhost", "root", "", "ejerciciophp_users");
$id = $_GET['id'];

if ($id == null) {
    echo("Debe de introducir un ID valido <br/>");
    echo '<a href="index.html"><button type="button">Volver atras</button></a>';
    exit();
}
if ($mysqli -> connect_errno) {
    echo ("Connect failed: ".$mysqli->connect_errno);
    exit();
}

$result = $mysqli->query("SELECT * from users WHERE ID = ".$id);
if ($result->num_rows <= 0) {
    echo("No existe un usuario con ese ID <br/>");
    echo '<a href="index.html"><button type="button">Volver atras</button></a>';
}
while ($row = $result->fetch_object()){
    echo ($row->Id.". ".$row->Name." ".$row->Surname."<br />");
}

$result->free();
$mysqli->close();
