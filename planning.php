<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Planning</title>
    </head>

    <body>
        <?php require 'conect_bdd.php' ?>
        <?php include 'header.php' ?>

        <main>

            <table>
                
                <thead>
                    
                    <tr>
                        <th>Heure</th>

                        <?php

                            $monday = strtotime('monday this week');

                            foreach (range(0, 6) as $day) {

                                echo '<th>'. date("l Y-m-d", (($day * 86400) + $monday)) .'</th>';

                            }

                        ?>
                        
                    </tr>

                </thead>
                
                <tbody>

                <?php
                
                    $heure_depart= 8;
                    $heure_fin=18;

                        for ($h=$heure_depart;$h<=$heure_fin;$h++) {

                            echo '<tr>';
                            $hour= $h . ':00';
                            echo '<th>' .$hour.'</th>';
                                
                            if ($h== 8 || $h== 9){

                                $hour = '0'.$hour;

                            }

                            for($a = 0; $a<= 6; $a++){

                                $sql = "SELECT * FROM utilisateurs INNER JOIN reservations WHERE utilisateurs.id = reservations.id_utilisateur ";
                                $rs = mysqli_query($db,$sql);
                                $result = mysqli_fetch_all($rs);

                                $res = date("Y-m-d", (($a * 86400) + $monday)) .' '. $hour.':00';
                                $weekend = date('l', strtotime($res));

                                if($weekend == ('Saturday') || $weekend == ('Sunday')){

                                    echo '<td bgcolor="red"></td>';

                                }else{
                                    echo '<td bgcolor="white">';

                                    foreach($result as $key => $value){
                                        
                                        if ($result[$key][6] == $res){

                                            echo '<div id="green"><a href="reservation.php?id=' . $result[$key][3] . '">' . $result[$key][4] . '</a></div>';
                                        }

                                    }

                                    echo '</td>';
                                }

                            }

                            echo '</tr>';
                        } 
                    ?>

                </tbody>
            </table>
        </main>
    </body>
</html>