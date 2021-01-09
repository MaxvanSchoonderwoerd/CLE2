<?php
require_once 'database.php';

$sec = 5;
$page = "index.php";
$formDisplay = "inline";
$succesTextDisplay = "none";

if (!empty($_POST)) {
    $username = mysqli_escape_string($db, $_POST['name']);
    $password = mysqli_escape_string($db, $_POST['password']);
    $hash = password_hash( $password , PASSWORD_DEFAULT );

    $sql = "INSERT INTO inlogGegevens (user_name, user_password) VALUES ('$username', '$hash')";

    if (isset($db)) {
        mysqli_query($db, $sql);
        $formDisplay = "none";
        $succesTextDisplay = "inline";
        header("Refresh: $sec; url=$page");
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
</header>
<body>
<main>
    <section>
        <div>
            <div>
                <h1 style="display: <?php echo $formDisplay ?>">
                    Account aanmaken
                </h1>
                <h1 style="display: <?php echo $succesTextDisplay ?>">
                    Bedankt! over <?php echo $sec ?> seconden word u terug gestuurd
                </h1>
            </div>
            <div>
                <form method="post" style="display: <?php echo $formDisplay ?>">
                    <div>
                        <label for="name">Naam:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div>
                        <label for="password">Wachtwoord:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div>
                        <button type="submit">Versturen</button>
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
        <h1> In development, gebruik geen echte wachtwoorden.</h1>
    </div>
</footer>
</html>