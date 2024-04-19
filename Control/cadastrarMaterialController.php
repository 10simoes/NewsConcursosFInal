<?php
  session_start();
  require_once '../Model/materialDTO.php';
  require_once '../Model/materialDAO.php';
  
  
  $perfil_idPerfilLogin = "";
  if(isset($_POST["idMaterial"])){
    
    $idMaterialLogin = $_POST["idMaterial"];
    $perfil_idPerfilLogin = $_POST["perfil_idPerfil"];
  }

  $Arquivo = "";
  if(isset($_FILES["tipoMaterial"])){
    $Arquivo = $_FILES["tipoMaterial"]["name"];
    $pastaDestino = "../uploadArq";
    $Arquivo = uniqid()."_".$Arquivo;
    $arqDestino = $pastaDestino.'/'.$Arquivo; 
    //Funcção que faz o upload
    move_uploaded_file($_FILES["tipoMaterial"]["tmp_name"],$arqDestino);

  }

  $tipoMaterial = $Arquivo;

  $dtCadastroMaterial = $_POST["dtCadastroMaterial"];
  $nomeMaterial = $_POST["nomeMaterial"];
  $titulo = $_POST["titulo"];
  
  $concurso_idConcurso = $_POST["concurso_idConcurso"];
 
  
  $materialDTO = new materialDTO;
  $materialDTO->setdtCadastroMaterial($dtCadastroMaterial);
  $materialDTO->setnomeMaterial($nomeMaterial);
  $materialDTO->settitulo($titulo);
  $materialDTO ->settipoMaterial($tipoMaterial);
  $materialDTO ->setconcurso_idConcurso($concurso_idConcurso);
  
  
  

  $materialDAO = new MaterialDAO();
        
  $sucesso = $materialDAO->salvarMaterial($materialDTO);

  if($sucesso){
    $msg = "material cadastrado com sucesso!";   
  } else {
    $msg = "Aconteceu um problema no cadastramento<br>".$sucesso;
  }
  if($perfil_idPerfilLogin != 1){
    header("location:../index.php?msg=$msg");
  } else {
    header("location:../View/PesquisarMaterial.php?msg=$msg");
  }  
?>