<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha biblioteca</title>
    <link rel="stylesheet" href="style.css">
</script>    
</head>
<body>
    <h1 class="textocentralizado">Cadastro de Procedimento</h1>
    <h3>Dados</h3>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_POST['descricao']) && isset($_POST['especie']) 
        && isset($_POST['status'])) {
            $descricao = $_POST['descricao'];
            $especie = $_POST['especie'];
            $status = $_POST['status'];

            //montar a instrução SQL
            $sql="insert into procedimento (descricao,idespecie,idstatus) 
            values('$descricao','$especie','$status')";
            require_once "conexao.php";
            $conn->exec($sql);
            echo "<p>Salvo com sucesso</p>";
            echo "<a href='http://localhost/pet/procedimento/cadproc.php'>Voltar</a>"; 
            echo "<script type='javascript'>alert('Email enviado com Sucesso!')";
            header('Location: http://localhost/pet/procedimento/cadproc.php');
              
        } else {
            echo "<p>Erro ao receber dados</p>";
            echo "<a href='../cadproc.php'>Voltar</a>";
        }
    } else {
        echo "<h3>Cadastre-se para fazer procedimentos no seu pet!</h3>";
        echo "<a href='cadpessoa.php'>Cadastre-se</a>";
        echo "  ou  ";
        echo "<a href='../login.php'>Faça o login</a><br>";
        echo "<a href='../index.php'>Home</a><br>";
    }
?>
</body>

</html>