<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-safe.css">
    <title>Safe Page</title>
</head>

<body>

    <div class="wrapper">
        <?php

        session_destroy();
        if ($_GET["message"] == "Login Successful") {

            echo "<img src='./img/loginSuccess.png' alt='Login Successful'>";
        }

        ?>

    </div>


</body>

</html>