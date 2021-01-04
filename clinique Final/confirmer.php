<?php
    include_once('config.php');
    $id = $_REQUEST['id'];
    $res = mysqli_query($conn, "UPDATE reservation SET confirm = 1 WHERE id_reservation = $id");
    if($res)
            header("Location: success.html");
        else 
            header("Location: failed.html");
?>