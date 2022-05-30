<?php 
//incluindo conexão com o banco
include "conexao.php";
//verificando se existem as variaveis necessarias
if(isset($_POST['Email']) || isset($_POST['Senha'])){
    //função apra verificar se o usuario digitou os campos necessarios 
    if(strlen($_POST['Email']) == 0){
		echo "Preencha seu Email";
	} else if(strlen($_POST['Senha']) == 0){
		echo "Preencha sua Senha";
	} else {
	//tratamento de segurança para evitar SQL injection	
	 $Email = $_POST["Email"];
	 $Senha = $_POST["Senha"];
  //validação de dados
	 $sql_code ="SELECT * FROM usuarios WHERE Email = '$Email' AND senha = '$Senha'";
  //tratamento de erro para a validação
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução". $mysqli->error); 
  //variavel para retornar a quantidade de campos afetados no banco
    $quantidade = $sql_query->num_rows;
	if($quantidade == 1){
        
		$usuario = $sql_query->fetch_assoc();
        if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['Email'] = $usuario['Email'];
		header("Location: validacao.php");
	}else {

		echo "falha ao logar! Email ou senha incorreta";
	}
	}

} 
 



?>