<!DOCTYPE html>
<html>
<head>
    <title>Alterando Responsbilidade</title>
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {

            if (isset($_POST['idPet']) && isset($_POST['idResp']) && isset($_POST['idPetAntigo']) && isset($_POST['idRespAntigo'])) {
                require_once "conexao.php";
                
                $idPet = $_POST['idPet'];
                $idResp = $_POST['idResp'];
                $idPetAntigo = $_POST['idPetAntigo'];
                $idRespAntigo = $_POST['idRespAntigo'];

                $sql = "update responsavel set idpet = $idPet, idusuario = $idResp where idpet = $idPetAntigo and idusuario = $idRespAntigo";
                
                $conn->exec($sql);
                ?>
                <p>Alterado com sucesso!</p><br>
                <a href='cadResponsavel.php'>Voltar</a>
                
                <?php
            }
            else{
                ?>
                    <p>Ocorreu um erro ao tentar carregar as informações!<p><br>
                    <a href="cadResponsavel.php">Voltar</a>
                <?php
            }
            ?>    
            <a href='cadResponsavel.php'>Novo Cadastro</a>
        <?php
        }
        else {
          echo "<p>Você não possui acesso.</p>";
          echo "<a href='login.php'>Faça o login</a>";
        }
    ?>  
</body>

</html>


