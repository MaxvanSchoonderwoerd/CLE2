<?php
require_once 'database.php';

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

session_start();
if ($_SESSION['loggedIn'] == false) {
    echo "Please log in first to see this page.";
    redirect("index.php");
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
    <title>Rooster Langetermijnplanning</title>
</head>
<link rel="stylesheet" href="css/style.css">
<header>
    <nav>
        <div>
            <form method="" action="logout.php">
                <button class="navButton" type="submit" id="logOut">Logout</button>
            </form>
        </div>
        <div>
            <form method="post" action="home.php">
                <button class="navButton" type="submit">Home</button>
            </form>
        </div>
        <div>
            <form method="post" action="rooster.php">
                <button class="navButton" type="submit">Rooster</button>
            </form>
        </div>
        <div>
            <form method="post" action="planner.php">
                <button class="navButton" type="submit">Planner</button>
            </form>
        </div>
    </nav>
</header>
<footer>
    <div>
        <h1>Hier komt nog een rooster</h1>
    </div>
</footer>
<body>
