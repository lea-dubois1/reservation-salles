<?php

require('conect_bdd.php');

$error= "";


if(isset($_POST['submit'])){

    $titre = $_POST['titre'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $date = $_POST['date'];
    $debut = $date . ' ' . $heure_debut . ':00';
    $fin = $date . ' ' . $heure_fin . ':00';
    $description = $_POST['description'];
    $id_user = $_SESSION['id'];

    var_dump($debut);
    var_dump($fin);

    //CHECK IF THE DATE IS FREE
    // Set the request in a variable.
    $sql = "Select * from reservations where debut='$debut'";
    
    // Check if the date is already present or not in our Database.
    $result = mysqli_query($db, $sql);
    var_dump($result);
    $num = mysqli_num_rows($result);
    
    
    if($num <= 0) {     // If the date do not exist in the Database, we continue

        $sql = "INSERT INTO `reservations`(`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre','$description','$debut','$fin','$id_user')";
        $result = mysqli_query($db, $sql);

    }else{$error = "The date is already taken. Please choose another one.";}


}
?>











<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Reservation form</title>
    </head>

    <body>
        <?php include 'header.php' ?>

        <main>

            <div class="centre">

                <form action="" method="POST" class="formulaire">
                
                    <h2>RESERVATION FORM</h2>

                    <p>Username : <?php echo $_SESSION['login']; ?></p>

                    <div class="group">      
                        <input type="text" name="titre" required minlength="4" maxlength="40" size="40">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Titre</label>
                    </div>
                    
                    <div class="group">      
                        <input type="time" name="heure_debut" min="08:00" max="18:00" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Beginning time</label>
                    </div>
                    
                    <div class="group">      
                        <input type="time" name="heure_fin" min="09:00" max="19:00" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Ending time</label>
                    </div>
                    
                    <div class="group">      
                        <input type="date" name="date" min="(code php pour dire aujourd'hui)" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Date</label>
                    </div>
                    
                    <textarea name="description" rows="5" cols="40">Description</textarea>

                    <div class="frame">
                        <button class="custom-btn btn-4" name="submit">Submit</button>
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
