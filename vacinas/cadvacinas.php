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
    <h3>Cadastro de Vacinas</h3>
    <form name="form1" action="inserirvacinas.php" method="POST">
        <label>Descrição</label><br><input type="text" name="descricao" value="" placeholder="Digite o Nome da Vacina" required><br><br>
        <label>ID da Espécie</label><br><input type="number" name="idespecie" value="" placeholder="Digite o Número da Espécie" required><br><br>
        <label>Vencimento da Vacina</label><br><input type="number" name="tempo" value="" placeholder="Digite o Vencimento em Anos" required><br><br>
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
                    Descrição
                </th>
                <th>
                    ID Espécie
                </th>
                <th>
                    Vencimento
                </th>
                <th>
                    Ações
                </th>
            </tr>
            <?php
            $sql = "Select * from vacinas order by descricao";
            require_once "../conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) {
                echo "<tr><td>" . $linha["idvacina"] . "</td><td>" . $linha["descricao"] . "</td><td> " . $linha["idespecie"] . "</td>
                    <td> " . $linha["tempo"] . "</td>
                    <td><a href='editarvacinas1.php?id=" . $linha["idvacina"] . "'>Editar</a> " .
                    "<a href='excluirvacinas.php?id=" . $linha["idvacina"] . "'>Excluir</a></td>" .
                    "</tr>";
            }
            ?>
        </table>
    <?php
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='../usuarios/cadusuario.php'>Cadastre-se</a>";
        echo "  ou  ";
        echo "<a href='../login.php'>Faça o login</a>";
    }
    ?>
    </br>
    <a href="../index.php">Voltar</a><br>
</body>

</html>