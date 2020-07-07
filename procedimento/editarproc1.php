<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha biblioteca</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<h1 class="textocentralizado">Edição de Procedimento</h1>
<?php
if (isset($_GET['id'])) {
    $idprocedimento = $_GET['id'];
        $sql = "Select * 
                from procedimento 
                where idprocedimento=$idprocedimento";
        require_once "conexao.php";
        $result = $conn->query($sql);
        $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { ?>
                <form name="form1" action="editarproc2.php" method="POST" class="textocentralizado">
                <label>Id: </label><?php echo $linha['idprocedimento']; ?> <br>
                <input type="hidden" name="id" value="<?php echo $linha['idprocedimento']; ?>">
                    
                <label>Descrição</label><input type="text" name="descricao" value="<?php echo $linha['descricao']; ?>" placeholder="Digite a descrição" required><br><br>
                
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
            <input type="submit" value="Salvar">
            <input type="reset" value="Cancelar">
        </form>
<?php
    }
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='cadproc.php'>Voltar</a>";
    }
?>
    <a href="pet/index.html">Voltar</a><br>
</body>
</html>