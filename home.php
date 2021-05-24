<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-home.css">
    <script src="./js/home.js"></script>
    <title>Home Page</title>
</head>

<body>
    <div class="wrapper">
        <h3>Registration</h3>

        <form action="home.php" method="POST">

            <div class="description">
                <ul>
                    <li>All fields are Required</li>
                </ul>

                <?php

                if (isset($_POST["register_btn"])) {
                    if ($_POST["password"] == $_POST["confirmPassword"]) {


                        $validation = array("name" => $_POST["name"], "username" => $_POST["username"], "password" => $_POST["password"], "email" => $_POST["email"], "phone" => $_POST["phone"], "dateOfBirth" => $_POST["dateOfBirth"], "socialSecurityNumber" => $_POST["socialSecurityNumber"]);

                        $_SESSION["values"] = $validation;
                    } else {
                        echo "<div class='error-pass'>";
                        echo "<p>Password doesn't match</p>";
                        echo "</div>";
                        session_destroy();
                    }
                }

                ?>

            </div>

            <div id="register" class="form-1">
                <div class="name box">
                    <label for="name">Full name</label><br>
                    <input id="name" type="text" name="name" required>
                </div>

                <div class="box username">
                    <label for="username">Username</label><br>
                    <input id="username" type="text" name="username" required>
                </div>

                <div class="box password">
                    <label for="password">Password</label><br>
                    <input id="password" type="password" name="password" required>
                </div>

                <div class="box conf-pass">
                    <label for="confirmPassword">Confirm Password</label><br>
                    <input id="confirmPassword" type="password" name="confirmPassword" required>
                </div>

                <div class="box email">
                    <label for="email">Email</label><br>
                    <input id="email" type="email" name="email" required>
                </div>

                <div class="box phone">
                    <label for="phone">Phone</label><br>
                    <input id="phone" type="number" name="phone" required>
                </div>

                <div class="box date-of-birth">
                    <label for="dateOfBirth">Date of Birth</label><br>
                    <input id="dateOfBirth" type="datetime" name="dateOfBirth" required>
                </div>

                <div class="box social-security-nb">
                    <label for="socialSecurityNumber">Social Security Number</label><br>
                    <input id="socialSecurityNumber" type="text" name="socialSecurityNumber" required>
                </div>

                <button class="box form-1-btn" type="submit" name="register_btn" value="register">Register</button>

                <p class="box toggle-to-signIn-page">Have an account? <a href="home.php">Sign in</a></p>
            </div>

        </form>

        <h3 id="login">Login</h3>

        <form action="home.php" method="POST">

            <?php
            if (isset($_POST["login_btn"])) {
                if ($_POST["usernameLogin"] == $_SESSION["values"]["username"] && $_POST["passwordLogin"] == $_SESSION["values"]["password"]) {

                    header("Location:safe.php?message=Login Successful");
                } else {

                    echo "<div class='error-pass'>";
                    echo "<p>Credentials doesn't match</p>";
                    echo "</div>";
                }
            }
            ?>

            <div id="login" class="box form-2">
                <div class="log-username">
                    <label for="username">Username</label><br>
                    <input id="username" type="text" name="usernameLogin">
                </div>

                <div class="box log-pass">
                    <label for="password">Password</label><br>
                    <input id="password" type="password" name="passwordLogin">
                </div>

                <button class="box form-2-btn" type="submit" name="login_btn" value="login">Login</button>
            </div>
        </form>
        <div class="value-display">

            <?php if (isset($_POST["username"])) : ?>
                <?php foreach ($_SESSION["values"] as $key => $value) : ?>

                    <p><?php echo "$key => $value" ?></p></br>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>
</body>

</html>