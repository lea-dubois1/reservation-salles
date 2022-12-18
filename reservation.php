<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Reservation infos</title>
    </head>

    <body>
        <?php require 'conect_bdd.php' ?>
        <?php include 'header.php' ?>

        <main>

            <div class="centre">

                <h2>RESERVATION INFOS</h2>

                <?php  

                    $sql = "SELECT * FROM utilisateurs INNER JOIN reservations WHERE utilisateurs.id = reservations.id_utilisateur";
                    $rs = mysqli_query($db,$sql);
                    $result = mysqli_fetch_all($rs);

                    foreach($result as $key => $value){
                                            
                        if ($result[$key][3] == $_GET['id']){

                            echo '<div class="reservation"';
                            echo 'Creator : ' . $result[$key][1] . '<br>';
                            echo 'Title : ' . $result[$key][4] . '<br>';
                            echo 'Description : ' . $result[$key][5] . '<br>';
                            echo 'Beginning hour : ' . $result[$key][6] . '<br>';
                            echo 'Ending hour : ' . $result[$key][7] . '<br>';
                            echo '</div>';

                        }

                    }
                    
                ?>

            </div>

        </main>

        <?php include 'footer.php' ?>
    </body>
</html>
