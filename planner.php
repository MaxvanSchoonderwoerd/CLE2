<?php
require_once 'database.php';

$sec = 1;
$page = "planner.php";

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


if (isset($db)) {

    if (!empty($_POST['name']) && !empty($_POST['date'])) {


        $name = mysqli_escape_string($db, $_POST['name']);


        $date = mysqli_escape_string($db, $_POST['date']);


        if (!isset($_POST['monday'])) {
            $monday = 0;
        } else {
            $monday = 1;
        }


        if (!isset($_POST['tuesday'])) {
            $tuesday = 0;
        } else {
            $tuesday = 1;
        }


        if (!isset($_POST['wednesday'])) {
            $wednesday = 0;
        } else {
            $wednesday = 1;
        }


        if (!isset($_POST['thursday'])) {
            $thursday = 0;
        } else {
            $thursday = 1;
        }


        if (!isset($_POST['friday'])) {
            $friday = 0;
        } else {
            $friday = 1;
        }


        if (!isset($_POST['saturday'])) {
            $saturday = 0;
        } else {
            $saturday = 1;
        }


        if (!isset($_POST['sunday'])) {
            $sunday = 0;
        } else {
            $sunday = 1;
        }


        //create a variable with the myqli code to put the name and password in the database
        $sql = "INSERT INTO kinderGegevens (kinder_name, kinder_birth_date, kinder_days_monday, kinder_days_tuesday, kinder_days_wednesday, kinder_days_thursday, kinder_days_friday, kinder_days_saturday, kinder_days_sunday) VALUES ('$name', '$date', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday')";


        if (mysqli_query($db, $sql) == false) {
            throw new \Exception();
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
            <form method="" action="home.php">
                <button class="navButton" type="submit">Home</button>
            </form>
        </div>
        <div>
            <form method="" action="rooster.php">
                <button class="navButton" type="submit">Rooster</button>
            </form>
        </div>
        <div>
            <form method="" action="planner.php">
                <button class="navButton" type="submit">Planner</button>
            </form>
        </div>
    </nav>
</header>
<body>
<main>
    <section>
        <div>
            <div>
                <h1>Vul hier de gegevens in</h1>
            </div>
            <div>
                <form method="post">
                    <div class="planner">
                        <label for="name">Naam:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="planner">
                        <label for="date">Geboorte datum:</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="planner">
                        <label for="monday">Maandag: </label>
                        <input type="checkbox" id="monday" name="monday">
                    </div>
                    <div class="planner">
                        <label for="tuesday">Dinsdag: </label>
                        <input type="checkbox" id="tuesday" name="tuesday">
                    </div>
                    <div class="planner">
                        <label for="wednesday">Woensdag: </label>
                        <input type="checkbox" id="wednesday" name="wednesday">
                    </div>
                    <div class="planner">
                        <label for="thursday">Donderdag: </label>
                        <input type="checkbox" id="thursday" name="thursday">
                    </div>
                    <div class="planner">
                        <label for="friday">Vrijdag: </label>
                        <input type="checkbox" id="friday" name="friday">
                    </div>
                    <div class="planner">
                        <label for="saturday">Zaterdag: </label>
                        <input type="checkbox" id="saturday" name="saturday">
                    </div>
                    <div class="planner">
                        <label for="sunday">Zondag: </label>
                        <input type="checkbox" id="sunday" name="sunday">
                    </div>
                    <div class="planner">
                        <button type="submit">Plannen</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
</main>
<right>
    <img src="source/CLE2_Logo.png">
</right>
</body>
<footer>
    <div>
        <h1> In development, gebruik geen echte gegevens.</h1>
    </div>
</footer>
</html>