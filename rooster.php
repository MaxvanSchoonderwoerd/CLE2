<?php
require_once 'database.php';

//function redirect($url, $statusCode = 303)
//{
//    header('Location: ' . $url, true, $statusCode);
//    die();
//}

$mondayicon = "icon_checkmark.png";
$tuesdayicon = "icon_checkmark.png";
$wednesdayicon = "icon_checkmark.png";
$thursdayicon = "icon_checkmark.png";
$fridayicon = "icon_checkmark.png";
$saturdayicon = "icon_checkmark.png";
$sundayicon = "icon_checkmark.png";

session_start();
if ($_SESSION['loggedIn'] == false) {
    echo "Please log in first to see this page.";
    redirect("index.php");
}


$result = mysqli_query($db, "SELECT * FROM kinderGegevens");

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
<body>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Naam</th>
        <th>Geboortedatum</th>
        <th>Maandag</th>
        <th>Dinsdag</th>
        <th>Woensdag</th>
        <th>Donderdag</th>
        <th>Vrijdag</th>
        <th>Zaterdag</th>
        <th>Zondag</th>
    </tr>
    </thead>
    <tbody>
    <tb>
        <?php while ($row = mysqli_fetch_array($result)) {
            if ($row['kinder_days_monday'] == 1) {
                $mondayicon = "icon_checkmark.png";
            } else {
                $mondayicon = "icon_cross.png";
            }

            if ($row['kinder_days_tuesday'] == 1) {
                $tuesdayicon = "icon_checkmark.png";
            } else {
                $tuesdayicon = "icon_cross.png";
            }

            if ($row['kinder_days_wednesday'] == 1) {
                $wednesdayicon = "icon_checkmark.png";
            } else {
                $wednesdayicon = "icon_cross.png";
            }
            if ($row['kinder_days_thursday'] == 1) {
                $thursdayicon = "icon_checkmark.png";
            } else {
                $thursdayicon = "icon_cross.png";
            }
            if ($row['kinder_days_friday'] == 1) {
                $fridayicon = "icon_checkmark.png";
            } else {
                $fridayicon = "icon_cross.png";
            }
            if ($row['kinder_days_saturday'] == 1) {
                $saturdayicon = "icon_checkmark.png";
            } else {
                $saturdayicon = "icon_cross.png";
            }
            if ($row['kinder_days_sunday'] == 1) {
                $sundayicon = "icon_checkmark.png";
            } else {
                $sundayicon = "icon_cross.png";
            }
            ?>
            <tr>
                <td><?= htmlentities($row['kinder_id']) ?></td>
                <td><?= htmlentities($row['kinder_name']) ?></td>
                <td><?= htmlentities($row['kinder_birth_date']) ?></td>
                <td class="icon"><img src="source/<?= $mondayicon ?>" width="50" height="50"
                    <<?= $row['kinder_days_monday'] ?></td>
                <td class="icon"><img src="source/<?= $tuesdayicon ?>" width="50" height="50"
                    <<?= $row['kinder_days_tuesday'] ?></td>
                <td class="icon"><img src="source/<?= $wednesdayicon ?>" width="50" height="50"
                    <<?= $row['kinder_days_wednesday'] ?></td>
                <td class="icon"><img src="source/<?= $thursdayicon ?>" width="50" height="50"
                    <<?= $row['kinder_days_thursday'] ?></td>
                <td class="icon"><img src="source/<?= $fridayicon ?>" width="50" height="50"
                    <<?= $row['kinder_days_friday'] ?></td>
                <td class="icon"><img src="source/<?= $saturdayicon ?>" width="50" height="50"
                    <<?= $row['kinder_days_saturday'] ?></td>
                <td class="icon"><img src="source/<?= $sundayicon ?>" width="50" height="50"
                    <<?= $row['kinder_days_sunday'] ?></td>
                <td><a href="deleteRow.php?kinderid=<?= $row["kinder_id"] ?>">Delete</a></td>
            </tr>
            <?php ;
        } ?>
    </tb>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="10"></td>
    </tr>
    </tfoot>
</table>
</body>
<footer>
    <div>
        <h1>Hier komt nog een rooster</h1>
    </div>
</footer>
