<?php
  session_start();
  $idUsuario = "";
  if(!isset($_SESSION["idUsuario"])){
    header("location:../index.php?msg=Acesso Indevido!");
  }
  $idUsuario = $_SESSION["idUsuario"] ;
  $perfil_idPerfil = $_SESSION["perfil_idPerfil"] ;
  require_once '../Model/materialDTO.php';
  require_once '../Model/materialDAO.php';
  $materialDAO = new MaterialDAO(); 
  $retorno = $materialDAO->PesquisarMaterial();
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
                <img src="../Img/newslogo.png" alt="Bem vindo ao site News Concursos"
                    title="Bem vindo ao site News Concursos" height="200px" width="200px"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="../index.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1>Materiais</h1>
    <section class="main_blog">
        <header class="main_blog_header">
            <h1 class="icon-blog"></h1>

        </header>
<article>
    <?php 
if(!empty($retorno)){  ?>
   <?php 
   
                  foreach($retorno as $linha){
                    ?>
                    <h2>Material</h2>
                    <img src="../Img/material.jpeg">
                        <p><?php
                         
                            $Arquivo = $linha["tipoMaterial"]; 
                            
                            $ext = strtoupper(pathinfo($Arquivo, PATHINFO_EXTENSION));
                            
                            
                            echo $ext;
                            echo "<br>";echo" <br>"; echo '<li style="color: #231a6f" > '.$linha["titulo"]."</li>";
                            if(strpos("DOC,DOCX, PDF,XLS,XLSX,doc,docx,pdf,xls,xlsx",$ext)>0 ){
                              
                                echo "<br>"; echo '<a href="../uploadArq/'.$linha["tipoMaterial"].'"/>Baixar</a>'; 
                                 
                            } else { 
                                
                                echo "<br>"; echo '<img src="../uploadArq/'.$linha["tipoMaterial"].'" width="400px"; />';
                                
                            }  echo "<br>";
                            echo "<br>";
                        ?>
                        
                        <?php }  ?>
                        
            <?php }  ?>
      
                        </article>

      
            </section>
    
    
</body>
</html>
