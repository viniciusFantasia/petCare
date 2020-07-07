<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Espécies</title>
</head>

<body>
    <h1>PET CARE</h1>
    <h3>Cadastro de Espécies</h3>
        <form name="form1" action="insereespecie.php" method="POST">
            <label>Espécie</label><br><input type="text" name="nomeespecie" value="" placeholder="Digite a especie" required><br><br>
            <label>Descrição</label><br><input type="text" name="descricao" value="" placeholder="Descreva a especie"><br><br>
            <input type="submit" value="Enviar">
            <input type="reset" value="Cancelar">
        </form>
    
    <br><a href='petCare/vacinas/index.php'>Voltar</a>
    <h3>-----------------------------------------------------------------------------------------------------------------------------<br><br>Pessoas Cadastradas</h3>

    <table>
        <tr>
            <th>id</th>
            <th>Espécie</th>
            <th>Descrição</th>
            <th colspan="2">Ações</th>
        </tr>
        <?php
        $sql = "Select * from especie order by nomeespecie";
        require_once "conexao.php";
        $result = $conn->query($sql);
        $dados = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {
            echo "<tr><td>" . $linha["idespecie"] . "</td><td>" . $linha["nomeespecie"] . "</td><td> " . $linha["descricao"] . "</td>" .
            "<td><a href='editaespecie1.php?id=" . $linha["idespecie"] . "'>Editar</a></td>" .
            "<td><a href='excluiespecie.php?id=" . $linha["idespecie"] . "'>Excluir</a></td>" .
                "</tr>";
        }
        ?>

    </table>
</body>

</html>