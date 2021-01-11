<?php
require_once 'database.php';

$adminLoggedIn = false;
$sec = 5;
$page = "index.php";
$formDisplay = "inline";
$adminDisplay = "inline";
$userDisplay = "none";
$succesTextDisplay = "none";

//the user can only add accounts if the user is an admin
//this is the admin login

//if the admin hasn't logged in and the post is not empty
if (!$adminLoggedIn && !empty($_GET['adminName']) && !empty($_GET['adminPassword'])) {

    if (isset($db)) {

        //get the admin name from the input of the user
        $adminName = mysqli_escape_string($db, $_GET['adminName']);

        //get the admin password from the input of the user
        $adminPassword = mysqli_escape_string($db, $_GET['adminPassword']);

        //look through the database for the user's inputted "admin name" and get its corresponding password
        $sql = "SELECT admin_password FROM adminGegevens WHERE admin_name = '$adminName'";

        $result = $db->query($sql);
        $hash = $result->fetch_assoc();

        //if the name doesnt match a name in the database it will result in a $hash array set to null, this will give an error
        //so if its null the inputted name cant be found in the database and thus the password or name was incorrect

        //if the queried password is not empty and it matches the inputted password
        if ($hash != null && $adminPassword == $hash['admin_password']) {

            //the password was correct
            echo 'password correct';

            //hide the admin login form
            $adminDisplay = "none";

            //show the create account form
            $userDisplay = "inline";

            //set the adminloggedin bool to true
            $adminLoggedIn = true;

        } else {

            //the password was incorrect
            echo 'password incorrect';

            //set the post to empty
            unset($_GET['adminName']);
            unset($_GET['adminPassword']);
        }
    }
}

//here u can add accounts

//if the admin has logged in and the post is not empty
if ($adminLoggedIn && !empty($_POST['name']) && !empty($_POST['password'])) {

    //set a variable to the inputted name
    $username = mysqli_escape_string($db, $_POST['name']);

    //set a variable to the inputted password
    $password = mysqli_escape_string($db, $_POST['password']);
    //hash that password variable
    $hash = password_hash($password, PASSWORD_DEFAULT);

    //create a variable with the myqli code to put the name and password in the database
    $sql = "INSERT INTO inlogGegevens (user_name, user_password) VALUES ('$username', '$hash')";

    //name and password are put in the database
    mysqli_query($db, $sql);

    //the account creation form gets hidden
    $formDisplay = "none";
    $adminDisplay = "none";
    $succesTextDisplay = "inline";
    header("Refresh: $sec; url=$page");

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
        <div style="display: <?php echo $adminDisplay ?>">
            <div>
                <h1>
                    Admin login
                </h1>
                <h1>
                    Alleen als u admin bent kunt u een account aanmaken.
                </h1>
            </div>
            <div>
                <form method="get">
                    <div>
                        <label for="adminName">Admin Naam:</label>
                        <input type="text" id="adminName" name="adminName" required>
                    </div>
                    <div>
                        <label for="adminPassword">Admin Wachtwoord:</label>
                        <input type="Password" id="adminPassword" name="adminPassword" required>
                    </div>
                    <div>
                        <button type="submit">Inloggen</button>
                    </div>
                </form>
            </div>
        </div>
        <div style="display: <?php echo $userDisplay ?>">
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
                        <button type="submit">Account aanmaken</button>
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