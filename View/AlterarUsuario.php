<?php
  session_start();
  $idUsuario = "";
  //Valida se houve login no sistema
  if(!isset($_SESSION["idUsuario"])){
    header("location:../index.php?msg=Acesso Indevido!");
  }

  //Testa se foi enviado um GET com idUsuario a ser alterado
  if(isset($_GET["idUsuario"])){
    $idUsuario = $_GET["idUsuario"];
  } else {
    //Se um GET não foi passado, significa que a 
    //ALTERACAO é do próprio usuário logado. Usa o da SESSION
    $idUsuario = $_SESSION["idUsuario"];
  }

  $idUsuarioLogin = $_SESSION["idUsuario"] ;
  $perfil_idPerfilLogin = $_SESSION["perfil_idPerfil"];

  require_once '../Model/usuarioDTO.php';
  require_once '../Model/usuarioDAO.php';
  //traz a função que monta o SELECT da UF
  require_once '../Control/montarUF.php';

  $usuarioDAO = new UsuarioDAO();
  $perfis = $usuarioDAO->listarPerfil(); 
  $retorno = $usuarioDAO->PesquisarUsuarioPorId($idUsuario);
  if(!$retorno){
    if($perfil_idPerfilLogin==1){
      header("location:PesquisarUsuario.php?msg=Usuário não localizado!");
    } else {
      header("location:index.php?msg=Usuário não localizado!");
    }  
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/boot.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/formulario.css">
    <title> Alterar Cadastro de Usuário </title>
</head>
<body>

<header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img src="../Img/newslogo.png" alt="Bem vindo ao site News Concursos"
                    title="Bem vindo ao site News Concursos" height="200px" width="200px"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="../index.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
<h1>Alteração de Cadastro de Usuário</h1>
    <div class="container">
    <form name="alterarUsuario" 
      id="alterarUsuario"
      action="../control/alterarUsuarioController.php" 
      method="POST" 
      enctype="multipart/form-data">
        <input type="hidden" name="idUsuario" 
        value="<?php echo $retorno["idUsuario"]; ?>" >
        <div class="form-group">
        Nome: <input type="text" name="nomeUsuario" 
            value="<?php echo $retorno["nomeUsuario"]; ?>" required><br>
</div>
<div class="form-group">
        Foto do usuário: <input type="file" name="fotoUsuario"><br>
        </div>
        <?php
          //testa se é o cadastro de PF 
          if($retorno["perfil_idPerfil"]=="3"){

            echo '<div class="form-group">
            Data de Nascimento: <input type="date" name="dtNascimento"
               value="'.$retorno["dtNascimento"].'"><br>
               </div>';
            echo '<div class="form-group">
            CPF: <input type="text" name="cpf" 
               value="'.$retorno["cpf"].'">
               </div>';
            //esconde o CNPJ
            // echo '<input type="hidden" name="cnpj" value="">';
 
          } else {
            // echo 'CNPJ: <input type="text" name="cnpj" 
            // value="'.$retorno["cnpj"].'"><br>';
            //esconde o CPF, RG, DTNASCIMENTO
            echo '<div class="form-group">
            <input type="hidden" name="dtNascimento" value="">
            </div>';
            echo '<div class="form-group">
            <input type="hidden" name="cpf" value="">
            </div>';
          }  
        ?>

       
       
        
        <div class="form-group">
        E-mail: <input type="email" name="emailUsuario" 
          value="<?php echo $retorno["emailUsuario"]; ?>" required>
          <br></div>
          <div class="form-group">
        Senha:<input type="password" name="senhaUsuario" ><br>
        Obs: Deixe a SENHA em branco caso não deseje alterá-la.<br></div>
        <!-- foi criado um campo escondido, para armazenar a senha da base   
           caso o usuário não modifique a senha, será gravado o campo 
           com a senha original, sem criptografia MD5 -->
        <input type="hidden" name="senhaUsuarioOriginal" 
           value="<?php echo $retorno['senhaUsuario']?>">
<?php
  echo '<div class="form-group">';
  // echo '<hr>';
  if($perfil_idPerfilLogin!=1){
    echo '<input type="hidden" name="perfil_idPerfil" 
          value="'.$retorno["perfil_idPerfil"].'">';
    echo '<input type="hidden" name="situacaoUsuario" 
          value="'.$retorno["situacaoUsuario"].'">';      
  } else {   
    echo 'Situação: 
    
    <select name="situacaoUsuario">';
    if($retorno["situacaoUsuario"]=="Ativo"){
        echo '<option value="Ativo" selected=selected>Ativo</option>';
    } else {
      echo '<option value="Ativo">Ativo</option>';
    }
    if($retorno["situacaoUsuario"]=="Inativo"){
      echo '<option value="Inativo" selected=selected>Inativo</option>';
    } else {
      echo '<option value="Inativo">Inativo</option>';
    }
    if($retorno["situacaoUsuario"]=="Bloqueado"){
      echo '<option value="Bloqueado" selected=selected>Bloqueado</option>';
    } else {
      echo '<option value="Bloqueado">Bloqueado</option>';
    }
    echo '</select><br>';
    echo '</div>';
    //montar um select dos perfis da base
    
    //
    echo '<div class="form-group">';
    echo 'Perfil do Usuário: <select name="perfil_idPerfil">';
    print_r($perfis);
    foreach($perfis as $perfil){
      if ($perfil["idPerfil"]==$retorno["perfil_idPerfil"]){
         echo '<option value="'.$perfil['idPerfil'].'" selected=selected>'.$perfil['nomePerfil'].'</option>';         
      } else {
        echo '<option value="'.$perfil['idPerfil'].'">'.$perfil['nomePerfil'].'</option>';
      }
    }
    echo '</select>';
  }
  echo '</div>';  
?>        
        <br>
        <div class="form-grou_btn">
        <button type="submit" value="Salvar Alteração"> Salvar alteração</button>
        </div>
    </form>
    </div>
</body>
</html>
