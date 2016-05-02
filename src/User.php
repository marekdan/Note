<?php
/*
CREATE TABLE Users(
    id int AUTO_INCREMENT,
    name varchar(50),
    email varchar(60) UNIQUE,
    password char(60),
    PRIMARY KEY (id)
    );
 */
class User {

    private $id;
    private $name;
    private $email;

    static private $connection;

    //setting connection with db for each user
    static public function SetConnection(mysqli $newConnection) {
        User::$connection = $newConnection;
    }

    //user registration
    static public function RegisterUser($newName, $newEmail1, $newEmail2, $password1, $password2) {

        //password check
        if ($password1 !== $password2) {
            return false;
        }

        //email check
        if ($newEmail1 !== $newEmail2) {
            return false;
        }

        //generating salt for password
        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
        ];

        //password encryption
        $hashedPassword = password_hash($password1, PASSWORD_BCRYPT, $options);

        //input user data to db if everything is ok
        $sql = "INSERT INTO Users(name, email, password)
                VALUES('$newName','$newEmail1', '$hashedPassword')";
        $result = self::$connection->query($sql);
        if ($result === true) {
            $newUser = new User(self::$connection->insert_id, $newName, $newEmail1);

            return $newUser;
        }

        return false;
    }

    public function __construct($newId, $newName, $newEmail) {
        $this->id = intval($newId);
        $this->setName($newName);
        $this->setEmail($newEmail);
    }

    public function setName($newName) {
        $this->name = $newName;
    }

    public function setEmail($email) {
        $this->email = $email;
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