<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Espécie</title>

</head>

<body>
    <?php
        if (isset($_GET['idespecie'])) {
            $id = $_GET['idespecie'];
            $sql = "delete from especie where idespecie=$id";
            require_once "conexao.php";
            $conn->exec($sql);
            echo "<p>Excluído com sucesso!</p>";
            echo "<a href='cadespecie.php'>Voltar</a>";
        } else {
            echo "<p>Erro ao receber os dados.</p>";
        }
    
    ?>
</body>

</html>