<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div id="fundo-externo">
        <div id="fundo">
            <img src="../imagens/cachorros.jpg" alt="" />
        </div>
    </div>
    <div id="site">
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_POST['nomeespecie']) && isset($_POST['descricao'])) {
            $id = $_POST['idespecie'];
            $nomeespecie = $_POST['nomeespecie'];
            $descricao = $_POST['descricao'];
            $sql = "update especie set nomeespecie='$nomeespecie', descricao='$descricao' where idespecie=$id";
            require_once "conexao.php";
            $conn->exec($sql);
            echo "<p>Atualizado com sucesso!</p>";
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
    </div>
</body>

</html>