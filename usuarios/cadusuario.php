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
    <h3>Cadastro de Usuário</h3>
    <form name="form1" action="inserirusuario.php" method="POST">
        <label>Nome</label><br><input type="text" name="nome" value="" placeholder="Digite o nome" required><br><br>
        <label>E-mail</label><br><input type="email" name="email" value="" placeholder="Digite o e-mail" required><br><br>
        <label>Senha</label><br><input type="password" name="senha" value="" placeholder="Digite a senha" required><br><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Cancelar">
    </form><br>
    <a href="../index.php">Voltar</a><br>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
    ?>
        <h2>Pessoas Cadastradas</h2>
        <table>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Nome
                </th>
                <th>
                    Email
                </th>
                <th>
                    Ações
                </th>
            </tr>
            <?php
            $sql = "Select * from usuario order by nome";
            require_once "../conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) {
                echo "<tr><td>" . $linha["idusuario"] . "</td><td>" . $linha["nome"] . "</td><td> " . $linha["email"] . "</td>
                    <td><a href='editarusuario1.php?id=" . $linha["idusuario"] . "'>Editar</a> " .
                    "<a href='excluirusuario.php?id=" . $linha["idusuario"] . "'>Excluir</a></td>" .
                    "</tr>";
            }
            ?>
        </table>
    <?php
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='cadusuario.php'>Cadastre-se</a>";
        echo "  ou  ";
        echo "<a href='../login.php'>Faça o login</a>";
    }
    ?>
    </br>
    <a href="../index.php">Voltar</a><br>
</body>

</html>