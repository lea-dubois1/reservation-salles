<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
    </head>

    <header>

        <nav>

            <?php if (session_status() == PHP_SESSION_NONE){ session_start();} ?>

            <nav role="navigation">
            <div id="menuToggle">
                
                <input type="checkbox" />
                
                <span></span>
                <span></span>
                <span></span>
                
                <ul id="menu">
                    <a href="index.php"><li>Home</li></a>
                    <?php if(!$_SESSION){echo '<a href="inscription.php"><li>Signup</li></a>';} ?>
                    <?php if(!$_SESSION){echo '<a href="connexion.php"><li>Login</li></a>';} ?>
                    <?php if($_SESSION){echo '<a href="profil.php"><li>Profile</li></a>';} ?>
                    <a href="planning.php"><li>Planning</li></a>
                    <?php if($_SESSION){echo '<a href="reservation-form.php"><li>Reserve</li></a>';} ?>
                    <a href="https://github.com/lea-dubois1" target="_blank"><li>My GitHub</li></a>
                    <?php if($_SESSION){echo '<a value="deconnexion" name="deconnexion" href="logout.php"><li>Logout</li></a>';} ?>
                </ul>
            </div>
        </nav>
    </header>
</html>