<?php

require('conect_bdd.php');

$error= "";


if(isset($_POST['submit'])){

    // Set variables to use in the following request.
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Set the request in a variable.
    $sql = "select * from utilisateurs where login = '$login'";

    // Check if the username is already present or not in our Database.
    $rs = mysqli_query($db,$sql);
    $numRows = mysqli_num_rows($rs);
    
    if($numRows == 1){    // If the login exist in the data base, continue

        $row = mysqli_fetch_assoc($rs);
        $dataPass = $row['password'];
        $id = $row['id'];

        if(password_verify($password,$dataPass)){    // Check if the password existe in the database and decript it

            $_SESSION['id'] = $id;
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $row['password'];

            header('Location: index.php');
        }else{    // If the password do not match, error
            $error= "Wrong password";
        }
    }else{    // If the login do not exist, error
        $error= "The login do not exist. You don't have an account? <a href=\"inscription.php\">Signup</a>";
    }
}

?>











<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Login</title>
    </head>

    <body>
        <?php include 'header.php' ?>

        <main>

            <div class="centre">

                <form action="" method="POST" class="formulaire">
                
                    <h2>LOGIN</h2>

                    <div class="group">      
                        <input type="text" name="login" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Login</label>
                    </div>
                    
                    <div class="group">      
                        <input type="password" name="password" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Password</label>
                    </div>

                    <div class="frame">
                        <button class="custom-btn btn-4" name="submit">Login</button>
                    </div>

                    <?php
                        // Display error messages (cf login.php) //

                        if($error) {echo '<strong>Error!</strong> '. $error;}
                    ?>

                </form>

            </div>
            
        </main>
    </body>
</html>
