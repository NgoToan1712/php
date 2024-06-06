<?php
require_once 'connect.php';

$query = "SELECT * FROM $table WHERE id = ?";
$result = $conn->prepare($query);
$result->bind_param('i', $_GET['id']);
$result->execute();
// var_dump($result->get_result());
$result = $result->get_result()->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Name and Phone Number</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="tel"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Edit Name and Phone Number</h1>
    <form action="../update.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <?php
        if (isset($result['name'])) {
            echo '<input type="text" id="name" name="name" placeholder="Enter your name" value="' . $result['name'] . '"><br><br>';
        } else {
            echo '<input type="text" id="name" name="name" placeholder="Enter your name"><br><br>';
        }
        ?>
        <!-- <input type="text" id="name" name="name" placeholder="Enter your name"><br><br> -->

        <label for="phone">Phone Number:</label>
        <?php
        if (isset($result['name'])) {
            echo '<input type="tel" id="phone" name="phone" placeholder="Enter your phone number" value="' . $result['phonenumber'] . '"><br><br>';
        } else {
            echo '<input type="tel" id="phone" name="phone" placeholder="Enter your phone number"><br><br>';
        }
        ?>
        <!-- <input type="tel" id="phone" name="phone" placeholder="Enter your phone number"><br><br> -->

        <input type="submit" name="updateIn4" value="Save">
    </form>
</body>

</html>