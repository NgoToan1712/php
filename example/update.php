<?php
require_once 'connect.php';

if (isset($_POST['updateIn4'])) {
    if ($_POST['name'] === '' || $_POST['phone']==='') {
        echo 'rong';
        die();
    } else {
        $query = "Update $table set name=?, phonenumber=? where id=?";
        $result = $conn->prepare($query);
        $result->bind_param('ssi', $_POST['name'], $_POST['phone'], $_GET['id']);
        $result->execute();
        // var_dump($result->get_result());
        // $result = $result->fetch();
        if ($result) {
            echo 'cap nhat thanh cong';
            header("Refresh: 2; url=../index.php");
        }
    }
};
