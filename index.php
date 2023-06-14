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
$horario_saida = $_POST['horario_saida'];
$quadra = $_POST['quadra'];
$horario_entrada = mysqli_real_escape_string($conexao,$horario_entrada);
$sql = "SELECT horario_inicio FROM teste.dados  WHERE horario_inicio = '$horario_entrada'";
$sql1 = "SELECT horario_fim FROM teste.dados  WHERE horario_fim = '$horario_saida'";
$pesquisa ="SELECT quadra FROM teste.dados WHERE quadra = '$quadra' and  horario_inicio = '$horario_entrada' and horario_fim = '$horario_saida'";
echo "$pesquisa<br>";
$retorno = mysqli_query($conexao,$sql);
$retorno1 = mysqli_query($conexao,$sql1);
$consulta = mysqli_query($conexao,$pesquisa);

if(mysqli_num_rows($retorno)>0 || mysqli_num_rows($retorno1)>0){
echo"Horário já escolhido<br>";
header("location: arquivo.html");
}else if(mysqli_num_rows($consulta)>0){

    echo"Quadra já reservada no horário<br>";

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
$quadra = $_POST['quadra'];
$sql = "INSERT INTO teste.dados(dias,horario_inicio,horario_fim,esporte,material_apoio,quadra) values ('$dia','$horario_entrada','$horario_saida','$esporte','$material','$quadra')";
echo $sql;

$resultado = mysqli_query($conexao, $sql);
echo">>Horário reservado com sucesso!<br>";

}

    
?>




</body>
</html>