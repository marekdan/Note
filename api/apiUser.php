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

    if (isset($updateData['newName'])) {
        $currentUser->setName($updateData['newName']);
        $currentUser->updateName();

        if ($currentUser->updateName() !== false) {
            $update = array(
                'result'  => 'success',
                'message' => 'Name changed'
            );
        }
        else {
            $update = array(
                'result'  => 'success',
                'message' => 'Error occurred'
            );
        }
        echo parse_json($update);
    }
    elseif (isset($updateData['newEmail'])) {
        $currentUser->setEmail($updateData['newEmail']);
        $currentUser->updateEmail();

        if ($currentUser->updateEmail() !== false) {
            $update = array(
                'result'  => 'success',
                'message' => 'Email changed'
            );
        }
        else {
            $update = array(
                'result'  => 'success',
                'message' => 'Error occurred'
            );
        }

        echo parse_json($update);
    }
}