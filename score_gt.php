<?php

$mysqli = new mysqli("localhost", "root", "", "ejerciciophp_users");

if ($mysqli -> connect_errno) {
    echo ("Connect failed: ".$mysqli->connect_errno);
    exit();
}

$result = $mysqli->query("SELECT * FROM users WHERE users.Score > 0");
while ($row = $result->fetch_object()){
    echo ($row->Id.". ".$row->Name." ".$row->Surname."<br/>"." Score: ".$row->Score."<br />");
}

$result->free();
$mysqli->close();
