<?php
  session_start();
  //Testar se tem usuario logado
  if(!isset($_SESSION["idUsuario"])){
    header("location:../index.php?msg=Acesso indevido!");
  }
  if(!isset($_GET["idUsuario"])){
    header("location:../View/PesquisarUsuario.php?msg=Usuário não informado!");
  }
  require_once '../Model/usuarioDTO.php';
  require_once '../Model/usuarioDAO.php';
  $idUsuario = $_GET["idUsuario"];
  

  $usuarioDAO = new UsuarioDAO();
        
  $sucesso = $usuarioDAO->excluirMaterial($idPacote);

  if($sucesso){
    $msg = "Usuário alterado com sucesso!";   
  } else {
    $msg = "Aconteceu um problema na alteração de dados.".$sucesso;
  }
  header("location:../View/PesquisarUsuario.php?msg=$msg");

?>