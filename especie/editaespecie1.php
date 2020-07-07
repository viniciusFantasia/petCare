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
            $sql = "select * from especie where idespecie=$id";
            require_once "conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { ?>
                <form name="form1" action="editaespecie2.php" method="POST">
                    ID<br><?php echo $linha['idespecie']; ?><br>
                    <input type="hidden" name="idespecie" value="<?php echo $linha['idespecie']; ?>"><br>
                    Espécie<br><input type="text" name="nomeespecie" value="<?php echo $linha['nomeespecie']; ?>" placeholder="Digite a especie" required><br><br>
                    Descrição<br><input type="text" name="descricao" value="<?php echo $linha['desricao']; ?>" placeholder="Descreva a especie" ><br><br>
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Cancelar">
                </form>
    <?php
            }
        }
    
    ?>
</body>

</html>