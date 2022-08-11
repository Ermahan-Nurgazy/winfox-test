<?php
if (isset($_POST['id']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])) {

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    include '../db/Database.php';

    $model = new Database();

    if ($model->update($id, $firstname, $lastname, $email)) {
        $data = array('res' => 'success');
    }else{
        $data = array('res' => 'error');
    }

    echo json_encode($data);
}
?>