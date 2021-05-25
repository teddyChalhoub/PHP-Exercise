<?php

function palindromeCheck($string)
{

    $stringrev = strrev($string);

    if (strcasecmp($string, $stringrev) == 0) {
        echo "<div class='img' style=' background-color: #C4E7BC;'>";
        echo "<img src='./img/true.png' alt='True' > ";
        echo "</div>";
    } else {
        echo "<div class='img' style=' background-color: #BC5449;'>";
        echo "<img src='./img/false.png' alt='False' > ";
        echo "</div>";
    }
}

function requiredFields()
{
    if ($_POST["string"] != null) {

        return true;
    } else {
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/palindrome.css">
    <title>Palindrome</title>
</head>

<body>

    <div class="wrapper">
        <h3>Palindrom Checking </h3>
        <p>Provide a value to check if the name in reverse stay the same</p>
        <form action="./palindrome.php" method="POST">

            <label for="string">Value</label>
            <input id="string" type="text" name="string" value=<?php echo "$_POST[string]"; ?>><br><br>

            <button type="submit">submit</button>
        </form>


        <?php
        if (requiredFields()) {
            if (isset($_POST["string"])) {
                palindromeCheck($_POST["string"]);
            }
        } else {
            echo "<p class='error'>Provide a string value</p>";
        }
        ?>
    </div>
</body>

</html>