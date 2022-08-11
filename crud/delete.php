<?php

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    include '../db/Database.php';

    $model = new Database();

    if ($model->delete($id)) {
        $data = array('res' => 'success');
    }else{
        $data = array('res' => 'error');
    }

    echo json_encode($data);
}