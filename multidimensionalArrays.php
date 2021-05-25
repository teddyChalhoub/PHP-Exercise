<?php

function printArray($arrays)
{
    foreach ($arrays as $key => $array) {
        echo "<p>" . strtoupper($key) . "</p>";
     
        foreach ($array as $key2 => $value) {
            echo "<p>----> $key2 = $value</p>";
          
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/multidimensionalArrays.css">
    <title>Multidimensional Arrays</title>
</head>

<body>
    <div class="wrapper">
        <h3>Multidimensional Arrays</h3>
        <div class="array">
            <h3>Array</h3>

            <?php


            $arrays = array("musicals" => array(0 => "Oklahoma", 1 => "The Music Man", 2 => "South Pacific"), "dramas" => array(0 => "Lawrence of Arabia", 1 => "To Kill a Mockingbird", 2 => "Casablanca"), "mysteries" => array(0 => "The Maltese Falcon", 1 => "Rear Window", 2 => "North by Northwest"));

            printArray($arrays);

            ?>
        </div>

        <div class="sorted-array">

            <h3>Sorted Array</h3>

            <?php
            krsort($arrays);

            printArray($arrays);
            ?>
        </div>
    </div>
</body>

</html>