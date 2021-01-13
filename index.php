<?php
require_once 'database.php';

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

if (!empty($_POST)) {

    if ($_POST['name'] == !null && $_POST['password'] == !null) {

        if (isset($db)) {

            //get the name from the input of the user
            $name = mysqli_escape_string($db, $_POST['name']);

            //get the password from the input of the user
            $password = mysqli_escape_string($db, $_POST['password']);

            //look through the database for the user's inputted "name" and get its corresponding hashed password
            $sql = "SELECT user_password FROM inlogGegevens WHERE user_name = '$name'";

            $result = $db->query($sql);
            $hash = $result->fetch_assoc();

            //check if the user's inputted password matches the hashed password from the database
            $valid = password_verify($password, $hash['user_password']);

            //if it matches
            if ($valid == true) {

                echo 'password correct';

                //start the session
                session_start();
                $_SESSION["loggedIn"] = true;
                $_SESSION["userName"] = $_POST['name'];

                //clear the post
                $_POST = null;

                //send to home.php
                redirect("home.php");

            } else {

                //show password is incorrect
                echo 'password incorrect';
            }
        } else {
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="favicon.ico"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Langetermijnplanning</title>
</head>
<link rel="stylesheet" href="css/style.css">
<header>
    <h1 class="title">Langetermijnplanning</h1>
</header>
<body>
<main>
    <section>
        <div>
            <h1>Hallo, wil je inloggen?</h1>
        </div>
        <div>
            <form method="post">
                <div>
                    <label for="name">Naam:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="password">Wachtwoord:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <button type="submit" id="logIn">Inloggen</button>
                </div>
            </form>
        </div>
        <div>
            <a href="createaccount.php">Nog geen account?</a>
        </div>
    </section>
</main>

<right>
    <img src="source/CLE2_Logo.png" alt="logo">
</right>
</body>
<script src="loginScript.js"></script>
<footer>
    <div>
        <h1>In development</h1>
    </div>
</footer>
</html>