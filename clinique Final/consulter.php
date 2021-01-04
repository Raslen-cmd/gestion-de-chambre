<?php
    include_once('config.php');
    $cin = $_POST['cin'];
    $query1 = "SELECT * FROM reservation WHERE id_patient = $cin";
    $query2 = "SELECT * FROM patient WHERE cin = $cin";
    $res1 = mysqli_query($conn, $query1);
    $res2 = mysqli_query($conn, $query2);
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
            <th scope="col">Nom Patient</th>
            <th scope="col">Prénom Patient</th>
            </tr>
        </thead>
        <tbody>
        <tr><?php
            while($res = mysqli_fetch_array($res2)) {
                echo '<td>'.$res[0].'</td>';
                echo '<td>'.$res[1].'</td>';
                echo '<td>'.$res[2].'</td>';
            }
        ?></tr>
        </tbody>
    </table><br>
    <h3>Liste des réservations</h3><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Type de chambre</th>
            <th scope="col">Date d'arrivée</th>
            <th scope="col">Date de départ</th>
            <th scope="col">Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
            while($res = mysqli_fetch_array($res1)) {
                echo '<tr>';
                echo '<td>'.$res[1].'</td>';
                echo '<td>'.$res[2].'</td>';
                echo '<td>'.$res[3].'</td>';
                if($res[5] == true)
                    echo '<td class="text-success">Confirmé</td>';
                else 
                    echo '<td class="text-danger">Non Confirmé</td>';
                echo '<td> <a class="btn btn-success" href="modifier.php?id='.$res[0].'">Modifier</a>
                <a class="btn btn-danger" href="supprimer.php?id='.$res[0].'">Supprimer</a></td>';
                echo '</tr>';
            }
        ?>
        </tbody>
    </table>
    </div>
    <script src="script.js"></script>
</body>
</html>