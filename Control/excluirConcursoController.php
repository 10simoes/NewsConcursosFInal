<?php
  session_start();
  //Testar se tem usuario logado
  if(!isset($_SESSION["idUsuario"])){
    header("location:../index.php?msg=Acesso indevido!");
  }
  if(!isset($_GET["idUsuario"])){
    header("location:../View/PesquisarUsuario.php?msg=Usuário não informado!");
  }
  require_once '../Model/concursoDTO.php';
  require_once '../Model/concursoDAO.php';
  $idConcurso = $_GET["idConcurso"];
  

  $concursoDAO = new ConcursoDAO();
        
  $sucesso = $concursoDAO->excluirConcurso($idConcurso);

  if($sucesso){
    $msg = "Concurso excluído com sucesso!";   
  } else {
    $msg = "Aconteceu um problema na alteração de dados.".$sucesso;
  }
  header("location:../View/pesquisarConcurso.php?msg=$msg");

?>