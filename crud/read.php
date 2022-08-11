<?php
include '../db/Database.php';

$model = new Database();

$rows = $model->findAll();

$data = array('rows' => $rows);

echo json_encode($data);