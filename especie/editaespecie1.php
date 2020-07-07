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
    <h1>Pet Care</h1>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "Select * from especie where idespecie=$id";
            require_once "conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { ?>
                <form name="form1" action="editaespecie2.php" method="POST">
                    <label>Id: </label><?php echo $linha['idespecie']; ?> <br>
                    <input type="hidden" name="idespecie" value="<?php echo $linha['idespecie']; ?>">
                    <label>Nome</label>
                    <input type="text" name="nomeespecie" value="<?php echo $linha['nomeespecie']; ?>" placeholder="Digite o nome da especie" required><br><br>
                    <label>Descrição</label>
                    <input type="text" name="descricao" value="<?php echo $linha['descricao']; ?>" placeholder="Descreva a especie" required><br><br>
                    <input type="submit" value="Salvar">
                    <input type="reset" value="Cancelar">
                </form>
    <?php
            }
        }
     else {
        echo "<p>Erro ao receber dados</p>";
    }
    ?>
    <a href="cadespecie.php">Voltar</a><br>
    <a href="index.php">Home</a><br>
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