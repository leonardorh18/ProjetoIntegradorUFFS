<?php

require_once 'classes/Professor.php';

session_start();

if (!isset($_SESSION['user'])){

	header('Location: login.php');
}

$user = unserialize($_SESSION['user']);

?>


<!DOCTYPE html>
<html lang="pt-br">
	
<head>
	<title>Sistema de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	
	<meta name="author" content="Leonardo H. Rocha">

</head> 

<header id="cabecalho">


    <h1> Seja bem vindo(a)<span > <?= $user->getNome_completo()?></span></h1>
   
    
</header>




    
    