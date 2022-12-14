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
                <tr><th><?php echo date('08:00:00'). '-'. date('09:00:00'); ?></th>
                        <td><?php 
                            require 'config.php';
                            $sql = "SELECT * FROM utilisateurs  INNER JOIN reservations WHERE utilisateurs.id = reservations.id_utilisateur ";
                            $rs = mysqli_query($db,$sql);
                            $result = mysqli_fetch_assoc($rs);
                            if ($result['debut']= '2022-12-12 08:00:00'){
                                echo $result['id'];
                            }else{
                                null;
                            }
                            ?></td>
                    </tr>
                    <tr><th><?php echo date('09:00:00'). '-'. date('10:00:00'); ?></th></tr>
                    <tr><th><?php echo date('10:00:00'). '-'. date('11:00:00'); ?></th></tr>
                    <tr><th><?php echo date('11:00:00'). '-'. date('12:00:00'); ?></th></tr>
                    <tr><th><?php echo date('12:00:00'). '-'. date('13:00:00'); ?></th>
                        <td><?php ?></td>
                    </tr>
                    <tr><th><?php echo date('13:00:00'). '-'. date('14:00:00'); ?></th></tr>
                    <tr><th><?php echo date('14:00:00'). '-'. date('15:00:00'); ?></th></tr>
                    <tr><th><?php echo date('15:00:00'). '-'. date('16:00:00'); ?></th></tr>
                    <tr><th><?php echo date('16:00:00'). '-'. date('17:00:00'); ?></th></tr>
                    <tr><th><?php echo date('17:00:00'). '-'. date('18:00:00'); ?></th></tr>
                    <tr><th><?php echo date('18:00:00'). '-'. date('19:00:00'); ?></th></tr>
                    
                </tbody>
            </table>
        </main>

        <?php include 'footer.php' ?>
    </body>
</html>
