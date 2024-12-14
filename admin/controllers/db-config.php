<?php
    $serverName = "0.0.0.0";
    $databaseName = "miss_ghana"; #"";
    $databaseUser = "xxx";
    $databasePassword = 'xxx'; #"";

    $database = mysqli_connect($serverName, $databaseUser, $databasePassword, $databaseName);

    if (!$database) {
        die("unable to connect to database");
    }