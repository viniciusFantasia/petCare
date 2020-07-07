<!DOCTYPE html>
<html>
<head>
    <title>Exclusão de Responsáveis</title>
</head>
<body>
    <?php

    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        require 'conexao.php';
        
        if(isset($_GET['idResp']) && isset($_GET['idPet'])){
            $idResp = $_GET['idResp'];
            $idPet = $_GET['idPet'];

            $sql= "delete from responsavel where idpet = $idPet and idusuario = $idResp";
            $conn->exec($sql)
            ?>
            <p>Excluído com sucesso!</p><br>
            <a href='cadResponsavel.php'>Voltar</a>
            
            <?php
        }
        else{
            ?>
                <p>Ocorreu um erro ao tentar carregar as informações!<p><br>
                <a href="cadResponsavel.php">Voltar</a>
            <?php
        }
    }
    else {
        echo "<p>Você não possui acesso.</p>";
        echo "<a href='login.php'>Faça o login</a>";
    }
    ?>
</body>
</html>