<?php
  session_start();
  require_once '../Model/concursoDTO.php';
  require_once '../Model/concursoDAO.php';
  
  //Testa se o Administrador está logado e fazendo cadastro de usuário
  $perfil_idPerfilLogin = "";
  if(isset($_POST["idUsuario"])){
    //header("location:../index.php?msg=Acesso indevido!");
    $idUsuarioLogin = $_POST["idUsuario"];
    $perfil_idPerfilLogin = $_POST["perfil_idPerfil"];
  }
  

  $tituloConcurso = strip_tags($_POST["tituloConcurso"]);
  $dtAbertura = $_POST["dtAbertura"];
  $dtEncerramento = $_POST["dtEncerramento"];
  $nivel = $_POST["nivel"];
  $areaConcurso = $_POST["areaConcurso"];
  
  
  $concursoDTO = new ConcursoDTO;
  $concursoDTO->settituloConcurso($tituloConcurso);
  $concursoDTO->setdtAbertura($dtAbertura);
  $concursoDTO->setdtEncerramento($dtEncerramento);
  $concursoDTO->setnivel($nivel);
  $concursoDTO->setareaConcurso($areaConcurso);
  

  $concursoDAO = new ConcursoDAO();
        
  $sucesso = $concursoDAO->salvarConcurso($concursoDTO);

  if($sucesso){
    $msg = "Concurso cadastrado com sucesso!";   
  } else {
    $msg = "Aconteceu um problema no cadastramento<br>".$sucesso;
  }
  if($perfil_idPerfilLogin != 1){
    header("location:../View/concursos.php?msg=$msg");
  } else {
    header("location:../View/PesquisarUsuario.php?msg=$msg");
  }  
?>