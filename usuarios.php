<?php

$mysqli = new mysqli("localhost", "root", "", "ejerciciophp_users");

if ($mysqli -> connect_errno) {
    echo ("Connect failed: ".$mysqli->connect_errno);
    exit();
}

$result = $mysqli->query("SELECT * from users");
echo 'Total resultados = '.$result->num_rows."<br/>";
while ($row = $result->fetch_object()){
    echo ($row->Id.". ".$row->Name." ".$row->Surname."<br />");
}

$result->free();
$mysqli->close();
