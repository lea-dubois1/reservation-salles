<?php
      
// Include file which makes the Database Connection.
include 'conect_bdd.php';   

// Set variables to false so we start whith no errors.
$created = false;
$error = "";

// Check if the form is submited
if(isset($_POST['submit'])) {
    
    // Set variables to use in the following request.
    $login = $_POST["login"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];

    // Set the request in a variable.
    $sql = "Select * from utilisateurs where login='$login'";
    
    // Check if the username is already present or not in our Database.
    $result = mysqli_query($db, $sql);
    $num = mysqli_num_rows($result);
    
    
    if($num <= 0) {     // If the login do not exist in the Database, we check for errors

        // LIST OF ERRORS
        if(($password != $passwordConfirm)) {    // If the password is different than the password's confirmation

            $error = "Passwords do not match";
        }else{      // If everithing is fine and there is no error
            
            // Cripting the password
            $hash = password_hash($password, PASSWORD_DEFAULT);
                
            // Cripted password is used here. 
            $sql = "INSERT INTO `utilisateurs` ( `login`, `password`) VALUES ('$login', '$hash')";
    
            $result = mysqli_query($db, $sql);
    
            if ($result) {      // If the user is created
                $created = true;
                header('Location: connexion.php');
                session_destroy();
            }
        }
           
    }else{      // If login already exist
        $error = "Le login existe déjà"; 
    }
}  
    
?>








<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Signup</title>
    </head>

    <body>

        <?php include 'header.php' ?>

        <main>

            <div class="centre">

                <form action="" method="POST" class="formulaire">

                    <h2>SIGNUP</h2>

                    <div class="group">      
                        <input type="text" name="login" value="<?php if($error){ echo $_POST['login'];} ?>" required>
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

                    <div class="group">      
                        <input type="password" name="passwordConfirm" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Confirm password</label>
                    </div>

                    <div class="frame">
                        <button class="custom-btn btn-4" name="submit">Singup</button>
                    </div>

                    <?php

                        // Display error messages (cf signup.php) //
        
                        if($created) {echo '<strong>Success!</strong> Your account is now created and you can login.';}

                        if($error) {echo '<strong>Error!</strong> '. $error;}
                    ?>

                </form>

            </div>

        </main>
    </body>
</html>