<?php
    if (isset($_SESSION['login'])) {
        header('Location: '.INCLUDE_PATH.'home');   
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>style.css">
    <title>Logar no sistema</title>
</head>
<body>

<?php
    if (isset($_POST['acao'])) {
        if (Usuarios::verificarLogin($_POST['login'], $_POST['senha'])) {
            $getId = Usuarios::getUserId($_POST['login']);
            Usuarios::startSession($_POST['login'],$getId);
            header('Location: '.INCLUDE_PATH.'home');   
        }else{
            echo "<script>alert('Usuário e/ou l0gin incorretos!')</script>";
        }
    }

?>
    <form action="" method="post">
        <h2>Login:</h2>
        <br>
        <input type="text" name="login" id="">
        <input type="password" name="senha" id="">
        <input type="submit" value="Logar!" name="acao">

    </form>
   
</body>
</html>