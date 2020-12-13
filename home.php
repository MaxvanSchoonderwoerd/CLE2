<?php


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
    <h1 class="title">Home</h1>
</header>
<body>
<main>
    <section>
        <div>
            <div>
                <h1>Waar wil je naartoe?</h1>
            </div>
            <div>
                <div>
<!--                    <button type="button">Rooster</button>-->
                    <form method="get" action="CLE2/rooster.php">
                        <button type="submit">Rooster</button>
                    </form>
                </div>
                <div>
<!--                    <button type="button">Planner</button>-->
                    <form method="post" action="planner.php">
                        <button type="submit">Planner</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <right>
        <img src="source/CLE2_Logo.png">
    </right>
</main>

</body>
</html>