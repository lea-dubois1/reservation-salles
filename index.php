<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Home</title>
    </head>

    <body>
        <?php include 'header.php' ?>
        <?php if (session_status() == PHP_SESSION_NONE){ session_start();} ?>

        <main>

            <div>

                <h1 class="welcome">HELLO AND WELCOME</h1>
                <p>WE RENT MEETING ROOMS ALL OVER THE WORLD</p>
                <p>RESERVE A GREAT MEETING ROOM WHENEVER AND HOW MUCH TIME YOU WANT</p>

            </div>

        </main>
    </body>
</html>
