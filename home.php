<?php

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
    <title>Home Langetermijnplanning</title>
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
        <div>
            <form method="post" action="user.php">
                <button class="navButton"> <?= htmlentities($_SESSION['userName'] )?> </button>
            </form>
        </div>
    </nav>
</header>
<body>
<main>
    <section>
        <div>
            <div>
                <h1>Waar wil je naartoe, <?= htmlentities($_SESSION['userName'] )?></h1>
            </div>
            <div>
                <div>
                    <p> Welkom <?= htmlentities($_SESSION['userName'] )?>! <br>
                        Hier komt tekst te staan over info over de website, hoe je het gebruikt, waarom, voor wie en nog
                        meer. Hier komt tekst te staan over info over de website, hoe je het gebruikt, waarom, voor wie
                        en nog meer. Hier komt tekst te staan over info over de website, hoe je het gebruikt, waarom,
                        voor wie en nog meer. Hier komt tekst te staan over info over de website, hoe je het gebruikt,
                        waarom, voor wie en nog meer. Hier komt tekst te staan over info over de website, hoe je het
                        gebruikt, waarom, voor wie en nog meer. Hier komt tekst te staan over info over de website, hoe
                        je het gebruikt, waarom, voor wie en nog meer. </p>
                </div>
            </div>
        </div>

    </section>
</main>
<right>
    <img src="source/CLE2_Logo.png" alt="logo" class="logo">
</right>
</body>
<script src="loginScript.js"></script>
<footer>
    <div>
        <h1>In development.</h1>
    </div>
</footer>
</html>