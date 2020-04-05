<?php

require_once '../autoload.php';
require_once "MooncakeRepository.php";

$config = [
    "servername" => getenv("DB_HOST"),
    "dbname" => getenv("DB_NAME"),
    "username" => getenv("DB_USERNAME"),
    "password" => getenv("DB_PASSWORD")
];

try {
    $repo = new MooncakeRepository($config);
    $cake = $repo->getMooncake($_GET["flavor"]);
    echo $cake;
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
