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

  require_once '../Model/materialDTO.php';
  require_once '../Model/materialDAO.php';
  $idMaterial = $_POST["idMaterial"];
  $dtCadastroMaterial = $_POST["dtCadastroMaterial"];
  $nomeMaterial = $_POST["nomeMaterial"];
  $titulo = $_POST["titulo"];
  $tipoMaterial = $_POST["tipoMaterial"];
  $concurso_idConcurso = $_POST["concurso_idConcurso"];
 
  
  $materialDTO = new MaterialDTO;
  $materialDTO->setIdMaterial($idMaterial);
  $materialDTO->setDtCadastroMaterial($dtCadastroMaterial);
  $materialDTO->setNomeMaterial($nomeMaterial);
  $materialDTO->setTitulo($titulo);
  $materialDTO -> setConcurso_idConcurso($concurso_idConcurso);
 

  $materialDAO = new MaterialDAO();
        
  $sucesso = $materialDAO->alterarMaterial($materialDTO);

  if($sucesso){
    $msg = "Material alterado com sucesso!";   
  } else {
    $msg = "Aconteceu um problema na alteração de dados.".$sucesso;
  }
  //Testa se o Administrador está Logado e vai para a listagem
  //PesquisarUsuario
  if($perfil_idPerfilLogin==1){
    header("location:../View/pesquisarMaterial.php?msg=$msg");
  } else {
    header("location:../index.php?msg=$msg");
  }
 
?>