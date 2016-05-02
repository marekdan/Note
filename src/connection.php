<?php

/*
 * this file contain required files with: db configuration, classes, and other needed
 * and can be added with whole stuff
*/
session_start();

require_once(dirname(__FILE__) . '/config.php');
require_once(dirname(__FILE__) . '/header.php');
require_once(dirname(__FILE__) . '/User.php');
require_once(dirname(__FILE__) . '/Note.php');

//setting connection to db
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbBaseName);
$conn->set_charset('utf8');

//checking if connection to db is ok
if ($conn->connect_errno) {
    die('Database connection not initialized properly' . $conn->connect_errno);
}

User::SetConnection($conn);