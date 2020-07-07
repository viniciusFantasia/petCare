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
    <p>O melhor cuidado para o seu pet!</p>
    <br>
    <br>
    <?php
     session_start();
    if(isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim'){
    ?>
    <?php 
    } else {
        echo "<a href='cadusuario.php'>Cadastre-se</a><br>";
    }
    ?>
    <a href="login.php">Acesse o sistema</a><br>
    <br>
    <br>
    <p class="textocentralizado">Projeto desenvolvido pelos alunos da FATEC - 4º Semestre Linguagem de Programação II - <strong>Fatec Rio Preto, Prof Luciene Cacalcanti</strong></p>
</body>

</html>