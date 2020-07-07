
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Responsáveis</title>
</head>
<body>
    <?php
     session_start();
     if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
    ?>
    <form action="insereResponsavel.php" method="post">
        Responsável:
        <select name="idResp" id="idResp">
        <option value="0">Selecione uma opção</option>
        <?php
            require 'conexao.php';
            $stmt = $conn->prepare("select idusuario, nome from usuario");

            if ($stmt->execute()) {
                while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
                    ?>
                        <option value="<?=$linha->idusuario?>"><?=$linha->nome?></option>
                    <?php
                }
            } else {
                ?>
                    <option value="0">Nenhum Pet Encontrado</option>
                <?php
            }
        ?>
        </select><br>
        Pet:
        <select name="idPet" id="idPet">
            <option value="0">Selecione uma opção</option>
        <?php
            $stmt = $conn->prepare("select idpet, nome from meupet");

            if ($stmt->execute()) {
                while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
                    ?>
                        <option value="<?=$linha->idpet?>"><?=$linha->nome?></option>
                    <?php
                }
            } else {
                ?>
                    <option value="0">Nenhum Pet Encontrado</option>
                <?php
            }
        ?>
        </select><br><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Cancelar">
    </form>
    <br>
    <hr>
    <br>
    <table border="1" width="100%">
        <tr>
            <th>Nome do Responsável</th>
            <th>Nome do Pet</th>
            <th>Ações</th>
        </tr>
        <?php
            $stmt = $conn->prepare("select r.idusuario, r.idpet, u.nome as responsavel, m.nome as pet from responsavel as r
            inner join usuario as u on u.idusuario = r.idusuario
            inner join meupet as m on m.idpet = r.idpet");

            if ($stmt->execute()) {
                while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                        <td><center><?=$linha->responsavel?></center></td>
                        <td><center><?=$linha->pet?></center></td>
                        <td><center>
                            <a href="alteraResponsavel.php?idResp=<?=$linha->idusuario?>&idPet=<?=$linha->idpet?>">[Alterar]</a> 
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="excluirResponsavel.php?idResp=<?=$linha->idusuario?>&idPet=<?=$linha->idpet?>">[Excluir]</a>
                    </center></td>
                    </tr>

                    <?php
                }
            } else {
                echo "Erro: Não foi possível recuperar os dados do banco de dados";
            }
        ?>
    </table>
    <?php
        }
        else {
            echo "<p>Você não possui acesso.</p>";
            echo "<a href='login.php'>Faça o login</a>";
        }
    ?>
</body>
</html>