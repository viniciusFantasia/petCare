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
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_GET['idvacina'])) {
            $idvacina = $_GET['idvacina'];
            $sql = "Select * from vacinas where idvacina=$idvacina";
            require_once "../conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { ?>
                <form name="form1" action="editarvacina2.php" method="POST" class="textocentralizado">
                    <label>Id: </label><?php echo $linha['idvacina']; ?> <br>
                    <input type="hidden" name="idvacina" value="<?php echo $linha['idvacina']; ?>">
                    <label>Descrição</label><br>
                    <input type="text" name="descricao" value="<?php echo $linha['descricao']; ?>" placeholder="Digite o Nome da Vacina" required><br><br>
                    <label>ID da Espécie</label><br>
                    <input type="number" name="idespecie" value="<?php echo $linha['idespecie']; ?>" placeholder="Digite o Número da Espécie" required><br><br>
                    <label>Vencimento da Vacina</label><br>
                    <input type="number" name="tempo" value="<?php echo $linha['tempo']; ?>" placeholder="Digite o Vencimento em Anos" required><br><br>
                    <input type="submit" value="Salvar">
                    <input type="reset" value="Cancelar">
                </form>
    <?php
            }
        }
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='../login.php'>Faça o login</a>";
    }
    ?>
    <a href="../index.php">Voltar</a><br>
</body>

</html>