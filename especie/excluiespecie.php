<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>

</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "delete from especie where idespecie=$id";
            require_once "conexao.php";
            $conn->exec($sql);
            echo "<p>Excluído com sucesso!</p>";
            echo "<a href='cadespecie.php'>Voltar</a><br>";
            echo "<a href='index.php'>Home</a><br>";
        } else {
            echo "<p>Erro ao receber os dados.</p>";
        }
    
    ?>
    <?php
            }
      else {
        echo "<p>Você não possui acesso.</p>";
        echo "<a href='login.php'>Faça o login</a>";
    }
    ?>
</body>

</html>