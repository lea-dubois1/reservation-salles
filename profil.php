<?php

require('conect_bdd.php');

$error = "";
$ok = 0;

if(isset($_POST['submit'])) {

    // Set variables to use in the following request.
    $login = $_SESSION['login'];
    $loginNew = $_POST['login'];

    $passwordTrue = $_SESSION['password'];
    $password = $_POST['old-password'];
    $passwordNew = $_POST['new-password'];
    $passwordNewConfirm = $_POST['confirm-password'];

    // Colect all datas from the user
    $sql = "select * from utilisateurs where login = '$login'";
    $rs = mysqli_query($db,$sql);
    $numRows = mysqli_num_rows($rs);


    if(password_verify($password,$passwordTrue)){
        
        if (!empty($passwordNew)){

            if (empty($passwordNewConfirm)){

                $error = "Please confirm password";

            }elseif(($passwordNew != $passwordNewConfirm)) {    // If the password is different than the password's confirmation

                $error = "The passwords are differents";

            }else{

                // Cripting the new password
                $hash = password_hash($passwordNew, PASSWORD_DEFAULT);

                $sqlPass = "update utilisateurs set password = '$hash' where login = '$login'";
                $rs = mysqli_query($db,$sqlPass);
                $_SESSION['password'] = $hash;
                $ok = "Your password was been edited";

            }

        }
        
        if ($login != $loginNew){
            if($numRows!=1){

                $error = "The login already exist";

            }else{

                $sqlLog = "update utilisateurs set login = '$loginNew' where login = '$login'";
                $rs = mysqli_query($db,$sqlLog);
                $_SESSION['login'] = $loginNew;
                $ok = "Your login was been edited";

            }

        }
        
    }else{

        $error = "Wrong password";

    }
}

?>



<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Change profile</title>
    </head>

    <body>
        <?php include 'header.php' ?>

        <main>

            <div class="centre changeProfil">

                <h2 class="title_change">CHANGE PROFILE</h2>

                <form action="" method="POST" class="formulaire">

                    <div class="group">      
                        <input type="text" name="login" value="<?php {echo $_SESSION['login'];} ?>" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Login</label>
                    </div>
                    
                    <div class="group">      
                        <input type="password" name="old-password" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Password</label>
                    </div>
                    
                    <div class="group">      
                        <input type="password" name="new-password" placeholder="New password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>
                    
                    <div class="group">      
                        <input type="password" name="confirm-password" placeholder="Confirm new password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>

                    <div class="frame">
                        <button class="custom-btn btn-4" name="submit">Edit</button>
                    </div>

                    <p>
                        <?php if($error) {echo '<strong>Error!</strong> '. $error;} ?>
                    </p>
                    
                    <p>
                        <?php if($ok >= 1) {echo "<strong>Success!</strong>" . $ok;} ?>
                    </p>

                </form>

            </div>

        </main>
    </body>
</html>










