<?php
  session_start();
  $idMaterial = "";
  //Valida se houve login no sistema
  if(!isset($_SESSION["idUsuario"])){
    header("location:../index.php?msg=Acesso Indevido!");
  }

  //Testa se foi enviado um GET com idMaterial a ser alterado
  if(isset($_GET["idUsuario"])){
    $idUsuario = $_GET["idUsuario"];
  } else {
    //Se um GET não foi passado, significa que a 
    //ALTERACAO é do próprio usuário logado. Usa o da SESSION
    $idUsuario = $_SESSION["idUsuario"];
  }

  $idUsuarioLogin = $_SESSION["idUsuario"] ;
  $perfil_idPerfilLogin = $_SESSION["perfil_idPerfil"];

  require_once '../Model/materialDTO.php';
  require_once '../Model/materialDAO.php';
  //traz a função que monta o SELECT da UF
//   require_once '../Control/montarUF.php';

  $materialDAO = new MaterialDAO();
//   $perfis = $usuarioDAO->listarPerfil(); 
  $retorno = $materialDAO->PesquisarMaterial($idMaterial);
  if(!$retorno){
    if($idMaterial){
      header("location:PesquisarMaterial.php?msg=Material não localizado!");
    } else {
      header("location:index.php?msg=Material não localizado!");
    }  
  }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../css/boot.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/formulario.css">
    <title>News Concursos</title>
</head>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img src="../img/newslogo.png" width="200px" alt="Bem vindo ao projeto "
                    title="Bem vindo ao projeto"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="../index.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--FIM DOBRA CABEÇALHO-->
    <h1>Formulário Cadastro</h1>
    <div class="container">
        <form name="alterarMaterial" 
    id="alterarMaterial"
    action="../control/alterarMaterialController.php" 
    method="POST" 
    enctype="multipart/form-data">
    <div class="form-group">
                <label for="concurso_idConcurso">Concurso:</label>
                <input type="text" name="concurso_idConcurso" placeholder="Informe o concurso" required>
            </div>

            <div class="form-group">
                <label for="nomeMaterial">Tipo Material:</label>
                <input type="text" name="nomeMaterial" placeholder="Informe o tipo de material" required>
            </div>

            <div class="form-group">
                <label for="titulo">Titulo Material:</label>
                <input type="text" name="titulo" placeholder="Informe o titulo" required>
            </div>
           
           <div class="form-group">
                <label for="tipoMaterial">conteudo:</label>
                <input type="file" name="tipoMaterial" required placeholder="Informe os conteudos">
            </div>

            <div class="form-group">
                <label for="dtCadastroMaterial">Data de Cadastro:</label>
                <input type="date" name="dtCadastroMaterial" placeholder="Data de Cadastro" required>
            </div>

               
               

            <!-- <div class="form-group">
            <input type="hidden" name="chat_idchat" value="">
            </div> -->
            
            <div class="form-grou_btn">
                <p>
                    <br><br><br>
                    <button type="submit">Alterar</button>
                </p>
            </div>
        </form>

    </div>



       
</body>
</html>
