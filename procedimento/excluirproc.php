<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha biblioteca</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1 class="textocentralizado">Biblioteca Pessoal</h1>
    <?php
         //montar a instrução SQL
         $sql="delete from procedimento where idprocedimento=$idprocedimento";
         //echo $sql;
         require_once "conexao.php";
         $conn->exec($sql);
         echo "<p>Procedimento excluido com sucesso</p>";
         echo "<a href='cadproc.php'>Voltar</a>";       
        } else {
            echo "<p>Erro ao receber dados</p>";
            echo "<a href='index.php'>Voltar</a>";
            }
            ?>
</body>
</html>