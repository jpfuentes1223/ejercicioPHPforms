<?php

$mysqli = new mysqli("localhost", "root", "", "ejerciciophp_users");
$id = $_GET['id'];

if ($id == null) {
    echo("Debe de introducir un ID valido <br/>");
    echo '<a href="forms.html"><button type="button">Volver atras</button></a>';
    exit();
}
if ($mysqli -> connect_errno) {
    echo ("Connect failed: ".$mysqli->connect_errno);
    exit();
}

$result = $mysqli->query("SELECT * from quests WHERE ID = ".$id);
if ($result->num_rows <= 0) {
    echo("No existe una quest con ese ID <br/>");
    echo '<a href="forms.html"><button type="button">Volver atras</button></a>';
}
while ($row = $result->fetch_object()){
    echo ("$row->Id ==> $row->Descripcion, Numero de votos: $row->Num_votos, Mediana: $row->Mediana <br/>");
     echo '<a href="forms.html"><button type="button">Volver atras</button></a>';
}

$result->free();
$mysqli->close();
