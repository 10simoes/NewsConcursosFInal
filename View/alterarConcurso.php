<?php
  session_start();
  $idUsuario = "";
  //Valida se houve login no sistema
  if(!isset($_SESSION["idUsuario"])){
    header("location:../index.php?msg=Acesso Indevido!");
  }

  //Testa se foi enviado um GET com idUsuario a ser alterado
  if(isset($_GET["idConcurso"])){
    $idConcurso = $_GET["idConcurso"];
  } else {
    //Se um GET não foi passado, significa que a 
    //ALTERACAO é do próprio usuário logado. Usa o da SESSION
    $idConcurso = $_SESSION["idConcurso"];
  }

  $idUsuarioLogin = $_SESSION["idUsuario"] ;
  $perfil_idPerfilLogin = $_SESSION["perfil_idPerfil"];

  require_once '../Model/concursoDTO.php';
  require_once '../Model/concursoDAO.php';
  //traz a função que monta o SELECT da UF
  
  $concursoDAO = new ConcursoDAO();
  
  $retorno = $concursoDAO->PesquisarConcurso($idConcurso);
  if(!$retorno){
    if($perfil_idPerfilLogin==1){
      header("location:PesquisarConcurso.php?msg=Usuário não localizado!");
    } else {
      header("location:index.php?msg=Concurso não localizado!");
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
    <h1>Formulário Cadastro Concurso</h1>
    <div class="container">
        <form name="alterarConcurso" 
    id="alterarConcurso"
    action="../control/alterarConcursoController.php" 
    method="POST" 
    enctype="multipart/form-data">
            <div class="form-group">
                <label for="tituloConcurso">Titulo do Concurso</label>
                <input type="text" name="tituloConcurso" placeholder="Informe o concurso" required>
            </div>

            <div class="form-group">
                <label for="dtAbertura">Data Abertura:</label>
                <input type="date" name="dtAbertura" placeholder="Informe o tipo de material" required>
            </div>

            <div class="form-group">
                <label for="dtEncerramento">Data Encerramento:</label>
                <input type="date" name="dtEncerramento" placeholder="Informe o dtEncerramento" required>
            </div>
           
           <div class="form-group">
                <label for="nivel">Nível do Concurso:</label>
                <input type="text" name="nivel" required placeholder="Informe os conteudos">
            </div>

            <div class="form-group">
                <label for="areaConcurso">Área do Concurso:</label>
                <input type="text" name="areaConcurso" placeholder="Data de Cadastro" required>
            </div>

        <br>
        <div class="form-grou_btn">
        <button type="submit" value="Salvar Alteração"> Salvar alteração</button>
        </div>
    </form>
    </div>
</body>
</html>
