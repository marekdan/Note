<?php

/*
CREATE TABLE Note(
    id int AUTO_INCREMENT,$
    title varchar(50) NOT NULL,
    description varchar(100),
    user_id int NOT NULL,
    note_date date,
    note_color varchar(100),
    PRIMARY KEY (id),
    FOREIGN KEY(user_id) REFERENCES Users(id)
    ON DELETE CASCADE
    );
 */

class Note {

    private $id;
    private $title;
    private $description;
    private $color;
    private $date;
    private $userId;

    static private $connection;


    static public function SetConnection(mysqli $newConnection) {
        Note::$connection = $newConnection;
    }

    static public function CreateNote($newTitle, $newDescription, $newColor, $newDate, $newUserId) {

        $sql = "INSERT INTO Note(title, description, user_id, note_date, note_color) VALUES ('$newTitle', '$newDescription', '$newUserId', '$newDate', '$newColor')";
        $result = self::$connection->query($sql);
        if ($result === true) {
            $newNote = new Note(self::$connection->insert_id, $newTitle, $newDescription, $newColor, $newDate, $newUserId);

            return $newNote;
        }

        return false;
    }

    static public function LoadNotesByDate($userId, $date) {
        $notes = [];
        $sql = "SELECT * FROM Note WHERE user_id = '$userId' AND note_date = '$date'";
        $result = self::$connection->query($sql);
        if ($result !== false) {
            while ($row = $result->fetch_assoc()) {
                $note = new Note($row['id'], $row['title'], $row['description'], $row['note_color'], $row['note_date'], $userId);
                $notes[] = $note;
            }

            return $notes;
        }

        return false;
    }

    public function __construct($newId, $newTitle, $newDescription, $newColor, $newDate, $newUserId) {
        $this->id = intval($newId);
        $this->setTitle($newTitle);
        $this->setDescription($newDescription);
        $this->setColor($newColor);
        $this->setDate($newDate);
        $this->setUserId($newUserId);
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getColor() {
        return $this->color;
    }

    public function getDate() {
        return $this->date;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setTitle($newTitle) {
        return $this->title = $newTitle;
    }

    public function setDescription($newDescription) {
        return $this->description = $newDescription;
    }

    public function setColor($newColor) {
        return $this->color = $newColor;
    }

    public function setDate($newDate) {
        return $this->date = $newDate;
    }

    public function setUserId($newUserId) {
        return $this->userId = $newUserId;
    }
}