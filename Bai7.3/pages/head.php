<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/head.css">



</head>

<body>
    <div class="header-container">
        <img class="img-header" src="./images/header.png" alt="">
        <nav class="pages">
            <form method="POST" action="./index.php">
                <input type="submit" value="Home" name="page">
            </form>
            <form method="POST" action="./index.php?page=contact">
                <input type="submit" value="Contact" name="page">
            </form>
            <form method="POST" action="./index.php?page=drawTable">
                <input type="submit" value="DrawTable" name="page">
            </form>
            <form method="POST" action="./index.php?page=loop">
                <input type="submit" value="Loop" name="page">
            </form>

        </nav>
    </div>
</body>

</html>