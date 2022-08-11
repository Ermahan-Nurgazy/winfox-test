<?php

class Database
{
    private $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=localhost;dbname=winfox_test", "root", "");
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function findAll()
    {
        $data = [];

        $query = $this->connect->prepare("SELECT * FROM `user` ORDER BY `id` ASC");
        if ($query->execute()) {
            $data = $query->fetchAll();
        }

        return $data;
    }

    public function findOne($id)
    {
        $data = [];

        $query = $this->connect->prepare("SELECT * FROM `user` WHERE `id` = '$id'");
        if ($query->execute()) {
            $data = $query->fetch();
        }

        return $data;
    }

    public function create($firstname, $lastname, $email)
    {
        $query = $this->connect->prepare("INSERT INTO `user` (`firstname`, `lastname`, `email`) VALUES ('$firstname', '$lastname', '$email')");
        if ($query->execute()) {
            return true;
        } else {
            return;
        }
    }

    public function update($id, $firstname, $lastname, $email)
    {
        $query = $this->connect->prepare("UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email' WHERE `id` = '$id'");
        if ($query->execute()) {
            return true;
        } else {
            return;
        }
    }

    public function delete($id)
    {
        $query = $this->connect->prepare("DELETE FROM `user` WHERE `id` = '$id'");
        if ($query->execute()) {
            return true;
        } else {
            return;
        }
    }
}