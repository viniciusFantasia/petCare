
<!DOCTYPE html>
<html>
<head>
    <title>Alterando Responsbilidade</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
    
    if(isset($_GET['idResp']) && isset($_GET['idPet'])){
        $idResp = $_GET['idResp'];
        $idPet = $_GET['idPet'];

        require 'conexao.php';
        ?>
            <form action="alteraResponsavel2.php" method="post">
                Responsável:
                <input type="hidden" name="idRespAntigo" value="<?=$idResp?>">
                <select name="idResp" id="idResp">
                <?php
                    $stmt = $conn->prepare("select idusuario, nome from usuario");

                    if ($stmt->execute()) {
                        while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
                            if($linha->idusuario == $idResp){
                                ?>
                                    <option selected value="<?=$linha->idusuario?>"><?=$linha->nome?></option>
                                <?php
                            }
                            else{
                                ?>
                                    <option value="<?=$linha->idusuario?>"><?=$linha->nome?></option>
                                <?php
                            }
                        }
                    } else {
                        ?>
                            <option value="0">Nenhum Pet Encontrado</option>
                        <?php
                    }
                ?>
                </select><br>
                Pet:
                <input type="hidden" name="idPetAntigo" value="<?=$idPet?>">
                <select name="idPet" id="idPet">
                <?php
                    $stmt = $conn->prepare("select idpet, nome from meupet");

                    if ($stmt->execute()) {
                        while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
                            if($linha->idpet == $idPet){
                                ?>
                                    <option selected value="<?=$linha->idpet?>"><?=$linha->nome?></option>
                                <?php
                            }
                            else{
                                ?>
                                    <option value="<?=$linha->idpet?>"><?=$linha->nome?></option>
                                <?php
                            }
                        }
                    } else {
                        ?>
                            <option value="0">Nenhum Pet Encontrado</option>
                        <?php
                    }
                ?>
                </select><br><br>
                <input type="submit" value="Enviar">
                <a href="cadResponsavel.php">Cancelar</a>
            </form>
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