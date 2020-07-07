<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="textocentralizado">
<div id="fundo-externo">
        <div id="fundo">
            <img src="imagens/usuario.png" alt="" />
        </div>
    </div>
    <div id="site">
    <h1>Pet Care</h1>
    <h3>Dados</h3>
    <?php
    if (isset($_POST['nome']) && isset($_POST['email']) 
     && isset($_POST['senha'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // echo "<p> Nome: $nome</p>";
        // echo "<p> E-mail: $email</p>";
        // echo "<p> Senha: $senha</p>";

         //montar a instrução SQL
         $sql="insert into usuario (nome,email,senha) 
         values('$nome','$email','$senha')";
         //echo $sql;
         require_once "../conexao.php";
         $conn->exec($sql);
         echo "<p>Salvo com sucesso</p>";
         echo "<a href='../login.php'>Voltar</a><br>";
    } else {
        echo "<p> Erro aos receber os dados!!! <p>";
    }
    ?>
    <br>
    <a href="cadusuario.php">Voltar</a><br>
    </div>
</body>

</html>