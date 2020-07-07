<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="textocentralizado">Biblioteca Pessoal</h1>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_GET['id'])) {
            $idprocedimento = $_GET['id'];
         //montar a instrução SQL
         $sql="delete from procedimento where idprocedimento=$idprocedimento";
         require_once "conexao.php";
         $conn->exec($sql);
         echo "<p>Procedimento excluido com sucesso</p>";
         echo "<a href='cadproc.php'>Voltar</a>";       
        } else {
            echo "<p>Erro ao receber dados</p>";
            echo "<a href='../index.php'>Voltar</a>";
        }
    } else {
        echo "<p>Você precisa estar logado para realizar esta ação!</p>";
        echo "<a href='../cadusuario.php'>Cadastre-se</a>";
        echo "  ou  ";
        echo "<a href='../login.php'>Faça o login</a>";
    }
    ?>

</body>
</html>