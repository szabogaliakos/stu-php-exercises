<?php

$envVars = fopen("../App.env", "r") or die("Unable to open file!");

while(!feof($envVars)) {
    list($envName, $envValue) = explode("=",trim(fgets($envVars)));
    putenv("$envName=$envValue");
}

fclose($envVars);
