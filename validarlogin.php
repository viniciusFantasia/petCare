<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="textocentralizado">
    <h1>Pet Care</h1>
    <?php
    session_start();
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = "Select * from usuario where email='$email' and senha='$senha'";
        require_once "conexao.php";
        $result = $conn->query($sql);
        $dados = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result->rowCount() == 1) {
            foreach ($dados as $linha) {
                $_SESSION["logado"] = 'sim';
                $_SESSION["idusuario"] = $linha['idusuario'];
                $_SESSION["nomeusuario"] = $linha['nome'];
                echo "<p>Seja vem vindo(a) " . $_SESSION["nomeusuario"] . " !</p><br>";
                echo "<a href='cadusuario.php'>Lista de Usuários</a><br>";
                echo "<a href='http://localhost/pet/procedimento/cadproc.php'>Procedimentos</a><br>";
            }
        } else {
            $_SESSION["logado"] = 'não';
            $_SESSION["idusuario"] = 0;
            echo "<p>Usuário ou senha inválidos.</p>";
        }
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='usuarios/cadusuario.php'>Cadastre-se</a>";
        echo "  ou  ";
        echo "<a href='login.php'>Faça o login</a>";
    }
    ?>
    </table>
    <a href="index.php">Voltar</a><br>
</body>

</html>