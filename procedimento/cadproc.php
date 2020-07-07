<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha biblioteca</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h1 class="textocentralizado">Cadastro de Procedimento</h1>
<!-- Colocar validação -->
<?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
?>
    <h3>Cadastre seu procedimento</h3>
    <form name="form1" action="inserirproc.php" method="POST">
    <label>Descrição</label><input type="text" name="descricao" value="" placeholder="Digite a descrição" required><br><br>
    <label>Espécie</label>
    <select name="especie">
    <?php
    $sql="Select * from especie order by idespecie";
    require_once "conexao.php";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
        echo "<option value='".$linha["idespecie"]."'>"
                .$linha["descricao"]."</option>";               
    }
    ?>
    </select><br><br>  
      
    <label>Status</label>
    <select name="status">
    <?php
    $sql="Select * from status order by idstatus";
    require_once "conexao.php";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
        echo "<option value='".$linha["idstatus"]."'>"
                .$linha["descricao"]."</option>";               
    }
    ?>
    </select><br><br> 

    <br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Cancelar">
</form>

    <h2>Procedimentos Cadastrados</h2>
    <table>
    <tr>
        <th>Código</th>
        <th>Descrição</th>
        <th>Espécie</th>
        <th>Status</th>
    </tr>
    <?php
        $sql="Select distinct p.*,
                    e.descricao as especie,
                    s.descricao as status
              From procedimento p 
              join especie e 
              on e.idespecie = p.idespecie 
              join status s 
              on s.idstatus = p.idstatus 
              Order by p.idprocedimento";
        require_once "conexao.php";
        $result = $conn->query($sql);
        $dados = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {
            echo "<tr>
            <td>".$linha["idprocedimento"]."</td>
            <td>".$linha["descricao"]."</td>
            <td> ".$linha["especie"]."</td>".
            "<td>".$linha["status"]."</td>".
            "<td><a href='editarproc1.php?id=".$linha["idprocedimento"]."'><i class='fa fa-pencil'></i></a> ".
            "&nbsp;<a href='excluirproc.php?id=".$linha["idprocedimento"]."'><i class='fa fa-trash'></i></a></td>".
            "</tr>"; 
        }
?>
    <?php
    } else {
        echo "<p>Você precisa estar logado para realizar esta ação!</p>";
        echo "<a href='../cadusuario.php'>Cadastre-se</a>";
        echo "  ou  ";
        echo "<a href='../login.php'>Faça o login</a>";
    }
    ?>
    </br>
    <a href="../index.php">Voltar</a><br>
</body>
</body>
</html>