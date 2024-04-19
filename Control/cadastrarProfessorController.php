<?php
  session_start();
  require_once '../Model/usuarioDTO.php';
  require_once '../Model/usuarioDAO.php';
  
  //Testa se o Administrador está logado e fazendo cadastro de usuário
  $perfil_idPerfilLogin = "";
  if(isset($_POST["idUsuario"])){
    //header("location:../index.php?msg=Acesso indevido!");
    $idUsuarioLogin = $_POST["idUsuario"];
    $perfil_idPerfilLogin = $_POST["perfil_idPerfil"];
  }

  $Arquivo = "";
  if(isset($_FILES["fotoUsuario"])){
    $Arquivo = $_FILES["fotoUsuario"]["name"];
    $pastaDestino = "../uploadArq";
    $Arquivo = uniqid()."_".$Arquivo;
    $arqDestino = $pastaDestino.'/'.$Arquivo;
    //Funcção que faz o upload
    move_uploaded_file($_FILES["fotoUsuario"]["tmp_name"],$arqDestino);

  }

  $nomeUsuario = strip_tags($_POST["nomeUsuario"]);
  // $fotoUsuario = "";  //$_POST["fotoUsuario"];
  $dtNascimento = $_POST["dtNascimento"];
  $cpf = $_POST["cpf"];
  $logradouro = $_POST["logradouro"];
  $numero = $_POST["numero"];
  $complemento = $_POST["complemento"];
  $bairro = $_POST["bairro"];
  $cidade = $_POST["cidade"];
  $uf = $_POST["uf"];
  $cep = $_POST["cep"];
  $emailUsuario = $_POST["emailUsuario"];
  $senhaUsuario = MD5($_POST["senhaUsuario"]);
  $situacaoUsuario = $_POST["situacaoUsuario"];
  $perfil_idPerfil = $_POST["perfil_idPerfil"];
  
  $usuarioDTO = new UsuarioDTO;
  $usuarioDTO->setNomeUsuario($nomeUsuario);
  $usuarioDTO->setFotoUsuario($fotoUsuario);
  $usuarioDTO->setDtNascimento($dtNascimento);
  $usuarioDTO -> setCpf($cpf);
  $usuarioDTO -> setLogradouro($logradouro);
  $usuarioDTO -> setNumero($numero);
  $usuarioDTO -> setComplemento($complemento);
  $usuarioDTO -> setBairro($bairro);
  $usuarioDTO -> setCidade($cidade);
  $usuarioDTO -> setUf($uf);
  $usuarioDTO -> setCep($cep);
  $usuarioDTO -> setEmailUsuario($emailUsuario);
  $usuarioDTO -> setSenhaUsuario($senhaUsuario);
  $usuarioDTO -> setSituacaoUsuario($situacaoUsuario);
  $usuarioDTO -> setPerfil_idPerfil($perfil_idPerfil);

  $usuarioDAO = new UsuarioDAO();
        
  $sucesso = $usuarioDAO->salvarUsuario($usuarioDTO);

  if($sucesso){
    $msg = "Usuário cadastrado com sucesso!";   
  } else {
    $msg = "Aconteceu um problema no cadastramento<br>".$sucesso;
  }
  if($perfil_idPerfilLogin == 2){
    header("location:../View/login.php?msg=$msg");
  } else {
    header("location:../View/PesquisarUsuario.php?msg=$msg");
  }  
?>