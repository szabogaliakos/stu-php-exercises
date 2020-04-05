<?php
$variables = [
    'DB_HOST' => 'localhost',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => '',
    'DB_NAME' => 'moon_cake',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}
?>