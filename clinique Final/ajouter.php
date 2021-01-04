<?php
    include_once('config.php');
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naiss = date('Y-m-d', strtotime($_POST['date_naiss']));
    $adr = $_POST['adr'];
    $type = $_POST['categorie'];
    $arrive = date('Y-m-d', strtotime($_POST['arrive']));
    $depart = date('Y-m-d', strtotime($_POST['depart']));

    $query1 = "INSERT INTO patient(cin, nom, prenom, date_naiss, adresse) VALUES($cin, '$nom', '$prenom', '$date_naiss', '$adr')";
    $query2 = "INSERT INTO reservation(type_chambre, id_patient, arrive, depart) VALUES('$type', $cin, '$arrive', '$depart')";
    $res1 = mysqli_query($conn, $query1);
    $res2 = mysqli_query($conn, $query2);
    if($res2)
            header("Location: success.html");
        else 
            header("Location: failed.html");
?>