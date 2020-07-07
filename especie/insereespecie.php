<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
</head>

<body>
    <h1>PET CARE</h1>
    <h3>Cadastro de Espécies</h3>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_POST['nomeespecie']) && isset($_POST['descricao'])) {
            $nomeespecie = $_POST['nomeespecie'];
            $descricao = $_POST['descricao'];
            echo "<p> Espécie: $nomeespecie</p>";
            echo "<p>Descrição: $descricao</p>";

            // montar instrução SQL
            $sql = "insert into especie (nomeespecie, descricao) values('$nomeespecie', '$descricao')";
            //echo $sql;
            require_once "conexao.php";
            $conn->exec($sql);
            echo "<p>Salvo com sucesso!</p>";
        } else {
            echo "<p>Erro ao receber os dados.</p>";
        }
        echo "<a href='cadespecie.php?'>Novo Cadastro</a><br>";
        echo " <a href='index.php'>Home</a><br>";
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