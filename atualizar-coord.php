<?php
    session_start();
    include('MySql.php');
    if (!isset($_SESSION['id'])) {
        die();
    }
    $idUsuario = $_SESSION['id'];
    $lat = $_POST['latitude'];
    $long = $_POST['longitude'];

    $atualizar = MySql::conectar()->prepare("UPDATE usuarios SET lat_cord = ?, long_cord = ? WHERE id = ?");
    $atualizar->execute(array($lat,$long,$idUsuario));
?>