<?php 
require_once __DIR__ . "/database.php";

// query per database
$sql = "SELECT `id`, `name` FROM `departments`;";
$results = $conn->query($sql);

var_dump($results);
?>