<?php
    include_once('config.php');
    $query = "SELECT * FROM reservation WHERE confirm = 0";
    $res = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Consulter une réservation</title>
</head>
<body>
    <div class="container">
    <br>
    <a class="btn btn-secondary" href='index.html'>Page d'acceuil</a><br><br>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">CIN</th>
            <th scope="col">Type de chambre</th>
            <th scope="col">Date d'arrivée</th>
            <th scope="col">Date de départ</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
            while($row = mysqli_fetch_array($res)) {
                echo '<tr>';
                echo '<td>'.$row[4].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[2].'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td><a class="btn btn-primary" href="confirmer.php?id='.$row[0].'">Confirmer</a>';
                echo '</tr>'; 
            }
        ?>
        </tbody>
    </table>
    </body>