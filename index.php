<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recebedados</title>
</head>
<body>
<?php

$conexao = mysqli_connect("localhost","root","","teste");
//CHECK CONEX
if(!$conexao){
echo "Error";
}
echo"Connection";
//recuperar e verificar se existe
$horario_entrada = $_POST['horario_entrada'];
$horario_entrada = mysqli_real_escape_string($conexao,$horario_entrada);
$sql = "SELECT horario_inicio FROM teste.dados  WHERE horario_inicio = '$horario_entrada'";
$retorno = mysqli_query($conexao,$sql);

if(mysqli_num_rows($retorno)>0){
echo"Horário já escolhido<br>";
header("location: arquivo.html");
}else{
$dia = $_POST['dia'];
echo $dia;
$horario_entrada = $_POST['horario_entrada'];
echo $horario_entrada;
$horario_saida = $_POST['horario_saida'];
echo $horario_saida;
$esporte = $_POST['esporte'];
echo $esporte;
$material = $_POST['material'];
echo $material;
$sql = "INSERT INTO teste.dados(dias,horario_inicio,horario_fim,esporte,material_apoio) values ('$dia','$horario_entrada','$horario_saida','$esporte','$material')";
echo $sql;

$resultado = mysqli_query($conexao, $sql);
echo">>Horário reservado com sucesso!<br>";

}

    
?>




</body>
</html>