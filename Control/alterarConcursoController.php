<?php
  session_start();
  //Testar se tem usuario logado
  $perfil_idPerfilLogin = "";
  if(!isset($_SESSION["nomeUsuario"])){
    header("location:../index.php?msg=Acesso indevido!");
  } else {
    $perfil_idPerfilLogin = $_SESSION["idUsuario"];
  }

  //Testa se os dados vieram do Formulário
  if(!isset($_POST["nomeUsuario"])){
    header("location:../index.php?msg=Acesso indevido!");
  }

  require_once '../Model/concursoDTO.php';
  require_once '../Model/concursoDAO.php';
  $idConcurso = $_POST["idConcurso"];
  $tituloConcurso = strip_tags($_POST["tituloConcurso"]);
  $dtAbertura = $_POST["dtAbertura"];
  $dtEncerramento = $_POST["dtEncerramento"];
  $nivel = $_POST["nivel"];
  $areaConcurso = $_POST["areaConcurso"];
  
  
  
  
  $concursoDTO = new ConcursoDTO;
  $concursoDTO->setIdConcurso($idConcurso);
  $concursoDTO->setTituloConcurso($tituloConcurso);
  $concursoDTO->setDtAbertura($dtAbertura);
  $concursoDTO->setDtEncerramento($dtEncerramento);
  $concursoDTO -> setNivel($nivel);
  $concursoDTO -> setAreaConcurso($areaConcurso);
  

  $concursoDAO = new ConcursoDAO();
        
  $sucesso = $concursoDAO->alterarConcurso($concursoDTO);

  if($sucesso){
    $msg = "Concurso alterado com sucesso!";   
  } else {
    $msg = "Aconteceu um problema na alteração de dados.".$sucesso;
  }
  //Testa se o Administrador está Logado e vai para a listagem
  //PesquisarUsuario
  if($perfil_idPerfilLogin==1){
    header("location:../View/pesquisarConcurso.php?msg=$msg");
  } else {
    header("location:../index.php?msg=$msg");
  }
 
?>