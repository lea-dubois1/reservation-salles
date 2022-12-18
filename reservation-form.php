<?php

require('conect_bdd.php');

$error= "";
$ok = "";


if(isset($_POST['submit'])){

    $titre = htmlspecialchars($_POST['titre'], ENT_QUOTES);
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $date = $_POST['date'];
    $debut = $date . ' ' . $heure_debut . ':00';
    $fin = $date . ' ' . $heure_fin . ':00';
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
    $id_user = $_SESSION['id'];
    $weekday = date('l', strtotime($date));


    if($id_user != null && $titre != null && $heure_debut != null && $heure_fin != null && $date !=null && $description != null){

        if($heure_debut < $heure_fin){

            if ($date >= date('Y-m-d') ){

                if (strtotime($heure_debut) >= strtotime('08:00:00') && strtotime($heure_debut) <= strtotime('18:00:00') && strtotime($heure_fin) >= strtotime('09:00:00') && strtotime($heure_fin) <= strtotime('19:00:00')){

                    if($weekday != ('Saturday') && $weekday != ('Sunday')){

                        //CHECK IF THE DATE IS FREE
                        // Set the request in a variable.
                        $sql = "Select * from reservations where debut='$debut'";
                        
                        // Check if the date is already present or not in our Database.
                        $result = mysqli_query($db, $sql);
                        $num = mysqli_num_rows($result);
                        
                        
                        if($num <= 0) {     // If the date do not exist in the Database, we continue

                            $Hd = "";
                            $Hf = "";

                            for ($a=0; $a < 2 ; $a++) { 
                                
                                $Hd = $Hd . $heure_debut[$a];

                                $Hf = $Hf . $heure_fin[$a];

                            }

                            for($j = $Hd; $j < $Hf; $j++){

                                $debut1 = $date . ' ' . $j . ':00:00';
                                $f = $j+1;
                                $fin1 = $date . ' ' . $f . ':00:00';

                                $sql = "INSERT INTO `reservations`(`titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES ('$titre','$description','$debut1','$fin1','$id_user')";
                                $result = mysqli_query($db, $sql);
								$ok = "You have sucessfully made your reservation";
                            }

                        }else{$error = "The date is already taken. Please choose another one";}

                    }else{$error = "Reservations must be between Monday and Friday";}
                    

                }else{$error = "Reservations must be between 8:00 and 19:00";}

            }else{$error = "You can't choose a date prior today's date";}

        }else{$error = "The beginning's hour must be before the endding's hour";}

    }else{$error = "Please fill all the areas";}

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
        <?php if(!$_SESSION){header('Location: connexion.php');} ?>
        <?php include 'header.php' ?>

        <main>

            <div class="centre">

                <form action="" method="POST" class="formulaire">
                
                    <h2>RESERVATION FORM</h2>

                    <div class="group">
                        <p>Username : <?php echo $_SESSION['login']; ?></p>
                    </div>

                    <div class="group">      
                        <input type="text" name="titre">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Titre</label>
                    </div>
                    
                    <div class="group">      
                        <input type="time" name="heure_debut" step="3600">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Beginning time</label>
                    </div>
                    
                    <div class="group">      
                        <input type="time" name="heure_fin" step="3600">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Ending time</label>
                    </div>
                    
                    <div class="group">      
                        <input type="date" name="date" min="<?php echo date('Y-m-d') ?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Date</label>
                    </div>
                    
                    <textarea name="description" rows="5" cols="40" placeholder="Description"></textarea>

                    <div class="frame">
                        <button class="custom-btn btn-4" name="submit">Submit</button>
                    </div>

                    <?php
                        // Display error messages (cf login.php) //

                        if($error) {echo '<strong>Error!</strong> '. $error;}
						if($ok) {echo '<strong>Sucess!</strong> '. $ok;}

                    ?>

                </form>

            </div>
            
        </main>
    </body>
</html>