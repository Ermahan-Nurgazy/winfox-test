<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    include '../db/Database.php';

    $model = new Database();

    if ($row = $model->findOne($id)) {
        $data = array('res' => 'success', 'row' => $row);
    }else{
        $data = array('res' => 'error');
    }

    echo json_encode($data);
}