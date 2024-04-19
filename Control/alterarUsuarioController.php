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

  require_once '../Model/usuarioDTO.php';
  require_once '../Model/usuarioDAO.php';
  $idUsuario = $_POST["idUsuario"];
  $nomeUsuario = strip_tags($_POST["nomeUsuario"]);
  $fotoUsuario = "";  //$_POST["fotoUsuario"];
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
  $senhaUsuarioOriginal = $_POST["senhaUsuarioOriginal"];
  $senhaUsuario = $_POST["senhaUsuario"];
  if(!empty($senhaUsuario)){
    $senhaUsuario = MD5($senhaUsuario);
  } else {
    $senhaUsuario = $senhaUsuarioOriginal;
  }
  
  $situacaoUsuario = $_POST["situacaoUsuario"];
  $perfil_idPerfil = $_POST["perfil_idPerfil"];
  
  $usuarioDTO = new UsuarioDTO;
  $usuarioDTO->setIdUsuario($idUsuario);
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
        
  $sucesso = $usuarioDAO->alterarUsuario($usuarioDTO);

  if($sucesso){
    $msg = "Usuário alterado com sucesso!";   
  } else {
    $msg = "Aconteceu um problema na alteração de dados.".$sucesso;
  }
  //Testa se o Administrador está Logado e vai para a listagem
  //PesquisarUsuario
  if($perfil_idPerfilLogin==1){
    header("location:../View/PesquisarUsuario.php?msg=$msg");
  } else {
    header("location:../index.php?msg=$msg");
  }
 
?>