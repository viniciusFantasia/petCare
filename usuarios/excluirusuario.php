<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="textocentralizado">
<div id="fundo-externo">
        <div id="fundo">
            <img src="imagens/usuario.png" alt="" />
        </div>
    </div>
    <div id="site">
    <h1>Pet Care</h1>
    <?php
    if (isset($_GET['idusuario'])) {
        $idusuario = $_GET['idusuario'];

         //montar a instrução SQL
         $sql="delete from usuario where idusuario=$idusuario";
         //echo $sql;
         require_once "../conexao.php";
         $conn->exec($sql);
         echo "<p>Excluido com sucesso</p>";
    } else {
        echo "<p> Erro aos receber os dados!!! <p>";
    }
    ?>
    <br>
    <a href="cadusuario.php">Voltar</a><br>
    <a href="../index.php">Home</a><br>
    </div>
</body>

</html>