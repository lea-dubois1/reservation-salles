<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>Planning</title>
    </head>

    <body>
        <?php include 'header.php' ?>

        <main>

            <h2 class="planning">PLANNING</h2>

            <table>

                <thead>
                    <tr>

                        <?php 
                            require 'conect_bdd.php';
                                                    
                            $sql = "SELECT * FROM utilisateurs";
                            $rs = mysqli_query($db,$sql);
                            $result = mysqli_fetch_assoc($rs);

                            foreach ($result as $key => $value){
                                echo '<th>' . strtoupper($key) . '</th>';
                            }
                        ?>

                    </tr>
                </thead>

                <tbody>

                    <?php
                        while ($result !=NULL){

                            echo '<tr>';

                            foreach ($result as $key =>$value){
                                echo '<td>'. $value .'</td>';
                            }

                            $result = mysqli_fetch_assoc($rs);
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </main>

        <?php include 'footer.php' ?>
    </body>
</html>
