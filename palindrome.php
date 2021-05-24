<?php

function palindromeCheck($string)
{

    $stringrev = strrev($string);

    if (strcasecmp($string, $stringrev) == 0) {
        echo "True";
    } else {
        echo "false";
    }
}

if (isset($_POST["string"])) {
    palindromeCheck($_POST["string"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./palindrome.php" method="POST">

        <label for="string">String:</label>
        <input id="string" type="text" name="string"><br><br>

        <button type="submit">submit</button>

</body>

</html>