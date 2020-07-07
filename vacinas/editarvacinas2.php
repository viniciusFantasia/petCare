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
    <h3>Dados</h3>
    <?php
    if (isset($_POST['descricao']) && isset($_POST['email']) 
     && isset($_POST['senha'])) {
        $descricao = $_POST['descricao'];
        $idespecie = $_POST['idespecie'];
        $tempo = $_POST['tempo'];

        // echo "<p> Descricao: $descricao</p>";
        // echo "<p> idespecie: $idespecie</p>";
        // echo "<p> tempo: $tempo</p>";

         //montar a instrução SQL
         $sql="update vacinas set 
         descricao = '$descricao',
         idespecie = '$idespecie',
         tempo = '$tempo',
         where idvacina='$idvacina'";
         //echo $sql;
         require_once "../conexao.php";
         $conn->exec($sql);
         echo "<p>Salvo com sucesso</p>";
    } else {
        echo "<p> Erro aos receber os dados!!! <p>";
    }
    ?>
    <br>
    <a href="cadvacina.php">Voltar</a><br>
    <a href="../index.php">Home</a><br>
</body>

</html>