<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="textocentralizado">
    <h1>Pet Care</h1>
    <h3 >Login</h3>
    <?php
        session_start();
        session_destroy();
    ?>
    <form name="form1" action="validarlogin.php" method="POST">
        <label>Email</label><br><input type="text" name="email" value="" placeholder="Digite seu e-mail" required><br><br>
        <label>Senha</label><br><input type="password" name="senha" value="" placeholder="Digite sua senha" required><br><br>
        <br><br>
        <input type="submit" value="Entrar">
    </form>
    <a href='usuarios/cadusuario.php'>Cadastre-se</a></br>
    <a href="index.php">Voltar</a><br>
</body>

</html>