<?php

/*
CREATE TABLE Users(
    id int AUTO_INCREMENT,
    name varchar(50),
    email varchar(60) UNIQUE,
    password char(70),
    PRIMARY KEY (id)
    );
 */

class User {

    private $id;
    private $name;
    private $email;

    static private $connection;

    static public function SetConnection(mysqli $newConnection) {
        User::$connection = $newConnection;
    }

    static public function RegisterUser($newName, $newEmail, $newEmail2, $password1, $password2) {
        if ($password1 !== $password2) {
            return false;
        }

        if ($newEmail !== $newEmail2) {
            return false;
        }

        $password1 = trim($password1);
        $newEmail = trim($newEmail);

        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];
        $hassedPassword = password_hash($password1, PASSWORD_BCRYPT, $options);
        $sql = "INSERT INTO Users(name, email, password)
                VALUES ('$newName', '$newEmail', '$hassedPassword')";

        $result = self::$connection->query($sql);
        if ($result === true) {
            $newUser = new User(self::$connection->insert_id, $newName, $newEmail);

            return $newUser;
        }

        return false;
    }

    static public function LogInUser($email, $password) {
        $sql = "SELECT * FROM Users WHERE email like '$email'";
        $result = self::$connection->query($sql);
        if ($result !== false) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $isPasswordOk = password_verify($password, $row["password"]);
                if ($isPasswordOk === true) {
                    $user = new User($row['id'], $row['name'], $row['email']);

                    return $user;
                }
            }
        }

        return false;
    }

    static public function getUserById($byId) {
        $sql = "SELECT * FROM Users WHERE id='$byId'";
        $result = self::$connection->query($sql);
        if ($result !== false) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $user = new User($row['id'], $row['name'], $row['email'], $row['description']);

                return $user;
            }
        }

        return false;
    }

    public function __construct($newId, $newName, $newEmail) {
        $this->id = intval($newId);
        $this->name = $newName;
        $this->email = $newEmail;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

}