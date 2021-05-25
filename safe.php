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
        session_start();
        ?>

        <table>
            <thead>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>
            </thead>

            <tbody>
                <?php
                echo "<div class='value-display'>";
                foreach ($_SESSION["values"] as $key => $value) {
                    echo "<tr>";
                    echo "<td>$key</td>";
                    echo "<td>$value</td>";
                    echo "</tr>";
                }
                echo "</div>";
                session_destroy();
                ?>
            </tbody>
        </table>



    </div>


</body>

</html>