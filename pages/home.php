<?php
    if (isset($_GET['deslogar'])) {
        Usuarios::deslogar();
        header('Location: '.INCLUDE_PATH);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>style.css">
    
    <title>Bem-vindo(a) <?= $_SESSION['nome'] ?></title>
</head>
<body>
    
    <div class="sidebar">
        <div class="topo">
            <h3>Bem-vindo, <?= $_SESSION['nome'] ?> | <a href="<?= INCLUDE_PATH ?>?deslogar">Sair!</a></h3>
        </div>
        <div class="btn-coord">
            <button onClick="getLocation()" >Atualizar Coordenadas!</button>
        </div> 
        <div id="localizacao" class="info-localizacao">
            <p class="lat-text">Latitude: <?= $_SESSION['latitude'] ?></p>
            <p class="long-text">Longitude: <?= $_SESSION['longitude'] ?></p>
            <p>Localização: <?= $_SESSION['localizacao'] ?></p>
        </div>   
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>

</body>

</html>