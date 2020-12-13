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
    <nav>
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
<main>
    <section>
        <div>
            <div>
                <h1>Vul hier de gegevens in</h1>
            </div>
            <div>
                <div>
                    <label for="name">Naam:</label>
                    <input type="text" id="name" name="name" required>
                    </form>
                </div>
                <div>
                    <label for="date">Geboorte datum:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div>
                    <label for="monday">Maandag: </label>
                    <input type="checkbox" id="monday" name="monday">
                </div>
                <div>
                    <label for="tuesday">Dinsdag: </label>
                    <input type="checkbox" id="tuesday" name="tuesday">
                </div>
                <div>
                    <label for="wednesday">Woensdag: </label>
                    <input type="checkbox" id="wednesday" name="wednesday">
                </div>
                <div>
                    <label for="thursday">Donderdag: </label>
                    <input type="checkbox" id="thursday" name="thursday">
                </div>
                <div>
                    <label for="friday">Vrijdag: </label>
                    <input type="checkbox" id="friday" name="friday">
                </div>
                <div>
                    <label for="saturday">Zaterdag: </label>
                    <input type="checkbox" id="saturday" name="saturday">
                </div>
                <div>
                    <label for="sunday">Zondag: </label>
                    <input type="checkbox" id="sunday" name="sunday">
                </div>
                <div>
                    <button type="submit">Plannen</button>
                </div>
            </div>
        </div>

    </section>
</main>
<right>
    <img src="source/CLE2_Logo.png">
</right>
</body>
</html>