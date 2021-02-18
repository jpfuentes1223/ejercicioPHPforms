<?php

$mysqli = new mysqli("localhost", "root", "", "ejerciciophp_users");

if ($mysqli -> connect_errno) {
    echo ("Connect failed: ".$mysqli->connect_errno);
    exit();
}

$result = $mysqli->query("SELECT * from quests");
echo 'Total resultados = '.$result->num_rows."<br/>";
while ($row = $result->fetch_object()){
    echo ($row->Id.". ".$row->Descripcion."<br />");
}

$result->free();
$mysqli->close();
