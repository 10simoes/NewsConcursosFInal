<?php
  session_start();
  require_once '../Model/usuarioDTO.php';
  require_once '../Model/usuarioDAO.php';
  
  //Valida se o usuário passou pela tela de login
  if(!isset($_POST["cpf"])){
    header("location:../View/login.php?msg=Acesso indevido!");
  }
  $cpf = strip_tags($_POST["cpf"]);
  $senhaUsuario = MD5($_POST["senhaUsuario"]);
  $usuarioDAO = new UsuarioDAO();     
  $sucesso = $usuarioDAO->validarLogin($cpf, $senhaUsuario);
  if($sucesso){
    $msg = "Sucesso"; 
	//Grava os principais dados de login do usuário
    $_SESSION["idUsuario"] = $sucesso["idUsuario"];
    $_SESSION["nomeUsuario"] = $sucesso["nomeUsuario"];
    $_SESSION["fotoUsuario"] = $sucesso["fotoUsuario"];
    $_SESSION["cpf"] = $sucesso["cpf"];
    $_SESSION["situacaoUsuario"] = $sucesso["situacaoUsuario"];
    $_SESSION["perfil_idPerfil"] = $sucesso["perfil_idPerfil"];
    
  } else {
    $msg = "Usuário ou senha inválido!";
  }
  header("location:../index.php?msg=$msg");

?>  