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

            <h2 class="planning">RESERVATION INFOS</h2>

            <?php  
                $_GET['id'] = 93;                                                   
                $sql = "SELECT * FROM utilisateurs INNER JOIN reservations WHERE utilisateurs.id = reservations.id_utilisateur";
                $rs = mysqli_query($db,$sql);
                $result = mysqli_fetch_assoc($rs);
                while(isset($result)){
                    if($result['id'] == $_GET['id']){
                        echo $result;
                    }
                }
            ?>

        </main>

        <?php include 'footer.php' ?>
    </body>
</html>
