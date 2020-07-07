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
    if (isset($_POST['descricao']) && isset($_POST['idespecie']) 
     && isset($_POST['tempo'])) {
        $descricao = $_POST['descricao'];
        $idespecie = $_POST['idespecie'];
        $tempo = $_POST['tempo'];

        // echo "<p> Descricao: $descricao</p>";
        // echo "<p> idespecie: $idespecie</p>";
        // echo "<p> tempo: $tempo</p>";

         //montar a instrução SQL
         $sql="insert into vacinas (descricao,idespecie,tempo) 
         values('$descricao','$idespecie','$tempo')";
         //echo $sql;
         require_once "../conexao.php";
         $conn->exec($sql);
         echo "<p>Salvo com sucesso</p>";
         echo "<a href='../login.php'>Voltar</a><br>";
    } else {
        echo "<p> Erro aos receber os dados!!! <p>";
    }
    ?>
    <br>
    <a href="cadvacinas.php">Voltar</a><br>
</body>

</html>