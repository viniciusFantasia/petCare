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
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_GET['idusuario'])) {
            $id = $_GET['idusuario'];
            $sql = "Select * from usuario where idusuario=$idusuario";
            require_once "../conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { ?>
                <form name="form1" action="editarusuario2.php" method="POST" class="textocentralizado">
                    <label>Id: </label><?php echo $linha['id']; ?> <br>
                    <input type="hidden" name="idusuario" value="<?php echo $linha['idusuario']; ?>">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?php echo $linha['nome']; ?>" placeholder="Digite o nome" required><br><br>
                    <label>E-mail</label>
                    <input type="email" name="email" value="<?php echo $linha['email']; ?>" placeholder="Digite o e-mail" required><br><br>
                    <label>Senha</label>
                    <input type="password" name="senha" value="<?php echo $linha['senha']; ?>" placeholder="Digite a senha" required><br><br>
                    <input type="submit" value="Salvar">
                    <input type="reset" value="Cancelar">
                </form>
    <?php
            }
        }
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='login.php'>Faça o login</a>";
    }
    ?>
    <a href="../index.php">Voltar</a><br>
    <a href="../index.php">Home</a><br>
</body>

</html>