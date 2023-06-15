<?php

$usuario = 'root';
$senha = '';
$database = 'teste';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli-> error){
    die("Falha ao conectar ao bando de dados: ".$mysqli->error);
}

$query = "SELECT * FROM teste.dados";
$colunas = $mysqli->query($query);

$data = mysqli_fetch_all($colunas, MYSQLI_ASSOC);
echo json_encode($data);

if ($colunas) {
  // Iterar sobre os resultados
  while ($row = $colunas->fetch_assoc()) {
      $coluna1 = $row['dias'];
      $coluna2 = $row['horario_inicio'];
      $coluna3 = $row['horario_fim'];
      $coluna4 = $row['esporte'];
      $coluna5 = $row['material_apoio'];
      $coluna6 = $row['quadra'];}
$colunas->free();


  }

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Horários Reservados</title>
  <Script>src="https://code.jquery.com/jquery-3.6.0.min.js%22%3E"</Script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='estilos/adm.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0"></script>
</head>

<body>
  <div class="container">
    <h1>Horários Reservados</h1>
    <div class="row">
      <div class="col-md-6">
        <form class="pesquisa-form">
          <div class="form-group">
            <label for="ra">Horário entrada:(Em backlog)</label>
            <input type="text" id="ra" name="ra" class="form-control">
          </div>

          <div class="form-group">
            <label for="codigo">Quadra:  (Em backlog)</label>
            <input type="text" id="codigo" name="codigo" class="form-control">
          </div>
        </form>
      </div>
    </div>

    <h4>Dados:</h4>
    <script>

function updateTable() {
  
  $.ajax({
    url: 'administrador.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) { 
      var table = $('#Tabela');
      table.empty();
      for (var i = 0; i < data.length; i++) {
        var row = '<tr>' +
          '<td>' + data[i]['dias'] + '</td>' +
          '<td>' + data[i]['horario_inicio'] + '</td>' +
          '<td>' + data[i]['horario_fim'] + '</td>' +
          '<td>' + data[i]['esporte'] + '</td>' +
          '<td>' + data[i]['material_apoio'] + '</td>' +
          '<td>' + data[i]['quadra'] + '</td>' +
          '</tr>';
        table.append(row);
      }
    }
  });
}
$(document).ready(function() {
      updateTable();});

        </script>
'</body>
</html>