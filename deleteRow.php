<?php
include_once 'database.php';

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

$sql = "DELETE FROM kinderGegevens WHERE kinder_id='" . $_GET["kinderid"] . "'";
mysqli_query($db, $sql);

redirect("rooster.php");
?>