<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="textocentralizado">
<div id="fundo-externo">
        <div id="fundo">
            <img src="../imagens/usuario.jpg" alt="" />
        </div>
    </div>
    <div id="site">
    <h1>Pet Care</h1>
    <?php
    if (isset($_GET['idvacina'])) {
        $idusuario = $_GET['idvacina'];

         //montar a instrução SQL
         $sql="delete from vacinas where idvacina=$idvacina";
         //echo $sql;
         require_once "../conexao.php";
         $conn->exec($sql);
         echo "<p>Excluido com sucesso</p>";
    } else {
        echo "<p> Erro aos receber os dados!!! <p>";
    }
    ?>
    <br>
    <a href="cadvacina.php">Voltar</a><br>
    <a href="../index.php">Home</a><br>
    </div>
</body>

</html>