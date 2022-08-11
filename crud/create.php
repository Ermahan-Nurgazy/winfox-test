<?php
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    include '../db/Database.php';

    $model = new Database();

    if ($model->create($firstname, $lastname, $email)) {
        $data = array('res' => 'success');
    }else{
        $data = array('res' => 'error');
    }

    echo json_encode($data);
}