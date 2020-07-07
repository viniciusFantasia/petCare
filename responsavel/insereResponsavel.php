<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Responsáveis</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_POST['idResp']) && isset($_POST['idPet']) && $_POST['idResp'] != "0" && $_POST['idPet'] != "0") {
            $resp = $_POST['idResp'];
            $pet = $_POST['idPet'];
            require_once "conexao.php";
            
            $sql = "insert into responsavel (idpet,idusuario) values ($pet,$resp)";
            
            $conn->exec($sql);
            echo "<p>Responsável incluído com sucesso!</p>";
        } else {
            echo "<p>Ocorreu um erro ao receber os dados!<br> Certifique-se de escolher as duas opções</p>";
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