<?php
    include_once("config.php");    
    if(isset($_POST['update'])) {	
        $id = $_POST['id'];
        $type = $_POST['categorie'];
        $arrive = date('Y-m-d', strtotime($_POST['arrive']));
        $depart = date('Y-m-d', strtotime($_POST['depart']));
        $res = mysqli_query($conn, "UPDATE reservation SET type_chambre = '$type', arrive = '$arrive', depart = '$depart' WHERE id_reservation = $id");
        if($res)
            header("Location: success.html");
        else 
            header("Location: failed.html");
    }
?>



<?php
    include_once("config.php");
    $id = $_REQUEST['id'];
    $query = "SELECT * FROM reservation WHERE id_reservation = $id";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($res);
    $arrive = date('Y-m-d', strtotime($row[2]));
    $depart = date('Y-m-d', strtotime($row[3]));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Modifier une réservation</title>
</head>
<body>
    <div class="container">
    <br>
    <a class="btn btn-secondary" href='index.html'>Page d'acceuil</a><br><br>
    <h3>Modifier une réservation</h3><br>
    <form action="modifier.php" method="post" name="f" onsubmit="return modifier();">
		<table width="35%" border="0">
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $row[0];?>"></td>
            </tr>
			<tr>
				<td>Type de Chambre</td>
				<td>
                    <select name="categorie">
                        <option value="Simple" <?php if($row[1] == 'Simple') echo 'selected';?>>Simple</option>
                        <option value="Sweet" <?php if($row[1] == 'Sweet') echo 'selected';?>>Sweet</option>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>Date d'arrivée</td>
                <td><input type="date" name="arrive" value=<?php echo "$arrive"?>></td>
            </tr>
            <tr> 
                <td>Date de départ</td>
                <td><input type="date" name="depart" value=<?php echo "$depart"?>></td>
            </tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Modifier"></td>
			</tr>
		</table>
	</form>
    </div>
    <script src="script.js"></script>
</body>
</html>