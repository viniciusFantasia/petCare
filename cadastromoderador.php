
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Lançamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="
    sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type ="text/css">
    #tamanhoContainer {
            Width: 500px;
    }
    #botao{

      background-color: #FF1168;
      color: #ffffff; 
      font-weight: bold;

    }
   </style>

</head>
<body>
<fom>
<div class="container" id="tamanhoContainer" style="margin-top:40px">
    <div style="text-align:right;">
<a href="index.php" role="button" id="botao"class="btn btn-sm-primary" >Voltar</a>
</div>
    <h4> Moderador</h4>

    <form action="inserirmovimento.php" method="post" style="margin-top: 20px">
    <div class="form-group">
    <label >idusuario</label>
    <input type="number" class="form-control" name="idusuario" placeholder="Insira o codigo do usuario"autocomplete= "off" required>
    </div>
    <div class="form-group">
    <label >idapp</label>
    <input type="text" class="form-control" name="idprofissional"placeholder="Insira o codigo do app"autocomplete= "off" required>
    </div>
    <label >idstatus</label>
    <input type="number" class="form-control" name="datavalidade"placeholder="Qual é o status do procedimento"autocomplete= "off" required>
    </div>      
  
  
   
  <button type= "submit" id="botao"class="btn btn-sm" >Cadastrar</button>
  </div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
</body>
</html>
