<?php
require_once 'connect.php';

if (isset($_GET['id'])) {
    $query = "DELETE FROM $table WHERE id=?";
    $result = $conn->prepare($query);
    $result->bind_param('i', $_GET['id']);
    $result->execute();
    if ($result) {
        echo 'cap nhat thanh cong';
        header("Refresh: 2; url=../index.php");
    }
};
