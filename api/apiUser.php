<?php

require_once("../src/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $userId = $_SESSION['userId'];
    $currentUser = User::getUserById($userId);

    parse_str(file_get_contents("php://input"), $updateData);
    $currentUser->setName($updateData['newName']);

    if (true === false) {
        $update = array(
            'result'  => 'success',
            'message' => 'Item changed'
        );
    }
    else {
        $update = array(
            'result'  => 'success',
            'message' => 'Error occured'
        );
    }

    echo parse_json($update);
}



