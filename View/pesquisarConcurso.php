<?php
  session_start();
  $idUsuario = "";
  if(!isset($_SESSION["idUsuario"])){
    header("location:../index.php?msg=Acesso Indevido!");
  }
  $idUsuario = $_SESSION["idUsuario"] ;
  $perfil_idPerfil = $_SESSION["perfil_idPerfil"] ;
  require_once '../Model/concursoDTO.php';
  require_once '../Model/concursoDAO.php';
  $concursoDAO = new ConcursoDAO(); 
  $retorno = $concursoDAO->PesquisarConcurso();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../css/boot.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/opcao.css">
    <link rel="stylesheet" href="../css/list_format.css">

    <title> Pesquisar Concurso </title>
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
    <?php 
   if(!empty($retorno)){  ?>
    <div class="list_container">
        <h1>Listagem de dados</h1>
          <form action="">
              <table width="1150px">
                <tr>
                    
                    <th>Título Concurso </th>
                    <th>Data Abertura</th>
                    <th>Data Encerramento</th>
                    <th>Nível</th>
                    <th>Área Concurso</th> 
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <?php 
                  foreach($retorno as $linha){
                    ?>
                <tr>
                   

                    <td><?php echo $linha["tituloConcurso"];?> </td>
                    <td><?php echo $linha["dtAbertura"];?> </td>
                    <td><?php echo $linha["dtEncerramento"];?> </td>
                    <td><?php echo $linha["nivel"];?> </td>
                    <td><?php echo $linha["areaConcurso"];?> </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                <?php echo '<button class="btn">
                <a href="alterarConcurso.php?idConcurso='.
                 $linha["idConcurso"].'">Alterar</a> </button>';?>
                  </td>
                  <td>
                <?php echo ' <button class="btn"> <a href="../Control/excluirConcursoController.php?idConcurso='.
                $linha["idConcurso"].'">Excluir</a> </button> ';?>

                    </td>
                </tr>  
                <?php } ?>
              
              </table>
           </form>
    </div>
<?php } ?>
    <?php 
     

     
      


      
    ?>
    
</body>
</html>