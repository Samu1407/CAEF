<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos/login.css" />
    <title>Login</title>
</head>
<body>
<?php

$usuario = 'root';
$senha = '';
$database = 'teste';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli-> error){
    die("Falha ao conectar ao bando de dados: ".$mysqli->error);
}


if (isset($_POST['email'])|| $_POST['senha']) {

	if(strlen($_POST['email']) == 0){
		echo "Preencha o email";
	}else if(strlen($_POST['senha']) == 0){
		echo "preencha a senha";
	}else{
		
		$email = $mysqli ->real_escape_string($_POST['email']);
		$senha = $mysqli ->real_escape_string($_POST['senha']);

		$sql_code = "SELECT * FROM teste.login WHERE email = '$email' and senha = '$senha'";
		$sql_query = $mysqli->query($sql_code) or die("ERROU". $mysqli->error);

        if($_POST['email'] == "ADMCEAF" && $_POST['senha'] == "CEAF"){
            header("Location: administrador.php");
        }else{
		$quantidade = $sql_query->num_rows;

		if($quantidade == 1){

			$usuario = $sql_query->fetch_assoc();

			if(!isset($_SESSION)){
				session_start();
			}
			$_SESSION['usuario'] = $usuario['id'];
			$_SESSION['email'] = $usuario['email'];

			header("Location: arquivo.html");
		}else{
			echo "<script> alert('Usuario ou senha incorreto');<script>";
            header("Location: telalogin.html");
		}
    }
	}
}
?> 

</body>
</html>