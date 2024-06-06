<?php
require_once 'connect.php';

if (isset($_POST['addUser'])) {
    if ($_POST['name'] === '' || $_POST['phone'] === '') {
        echo 'rong';
        die();
    } else {
        $query = "INSERT INTO $table VALUES (NULL, ?, ?)";
        $result = $conn->prepare($query);
        $result->bind_param('ss', $_POST['name'], $_POST['phone']);
        $result->execute();
        if ($result) {
            echo 'Thêm người dùng thành công';
            header("Refresh: 2; url=./index.php");
        }
    }
};
