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
                <ul>
                    <li><a href="../View/procurarconcurso.php">Procurar Concursos</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--FIM DOBRA CABEÇALHO-->

    <h1>Concursos</h1>
    <section class="main_blog">
        <header class="main_blog_header">
            <h1 class="icon-blog"></h1>

        </header>

        <article>
            <a href="https://cdn.cebraspe.org.br/concursos/pf_21/arquivos/ED_1_DPF_2021_ABT.PDF" target="_blank">
                <img src="../Img/concursopf.jpg" height="200" width="200" alt="Imagem post" title="Imagem Post">

            </a>
            <p><a href="" class="text">Concurso Policia Federal</a></p>
            <h2>Confira o Edital<a href="https://cdn.cebraspe.org.br/concursos/pf_21/arquivos/ED_1_DPF_2021_ABT.PDF" target="_blank" class="title">Aqui</a></h2>
        </article>

        <article>
            <a href="https://www.in.gov.br/en/web/dou/-/edital-n-1-de-18-de-janeiro-de-2021concurso-publico-para-o-provimento-de-vagas-no-cargo-de-policial-rodoviario-federal-299776349" target="_blank">
                <img src="../Img/concursoprf.jpg" height="200" width="200" alt="Imagem post" title="Imagem Post">
            </a>
            <p><a href="" class="text">Concurso PRF</a></p>
            <h2>Confira o Edital<a href="https://www.in.gov.br/en/web/dou/-/edital-n-1-de-18-de-janeiro-de-2021concurso-publico-para-o-provimento-de-vagas-no-cargo-de-policial-rodoviario-federal-299776349" target="_blank" class="title"> aqui</a></h2>
        </article>

        <article>
            <a href="https://pesquisa.in.gov.br/imprensa/jsp/visualiza/index.jsp?data=05/10/2017&jornal=3&pagina=10&totalArquivos=232" target="_blank">
                <img src="../Img/concorreios.jpg"height="200" width="200" alt="Imagem post" title="Imagem Post">
            </a>
            <p>
            <p><a href="" class="text">Concurso Correios</a></p>
            <h2>Confira o Edital<a href="https://pesquisa.in.gov.br/imprensa/jsp/visualiza/index.jsp?data=05/10/2017&jornal=3&pagina=10&totalArquivos=232" target="_blank" class="title">Aqui</a></h2>
        </article>

        <article>
            <a href="#">
                <img src="../Img/conagu.jpg"height="200" width="200" alt="Imagem post" title="Imagem Post">
            </a>
            <p><a href="" class="text">Concurso AGU</a></p>
            <h2><a href="" class="title">Edital Concurso AGU</a></h2>
        </article>

        <article>
            <a href="https://www.cesgranrio.org.br/concursos/evento.aspx?id=bb0121" target="_blank">
                <img src="../Img/conbb.png" height="200" width="200" alt="Imagem post" title="Imagem Post">
            </a>
            <p><a href="" class="text">Concurso Banco do Brasil</a></p>
            <h2>Confira o Edital<a href="https://www.cesgranrio.org.br/concursos/evento.aspx?id=bb0121" target="_blank" class="title">Aqui </a></h2>
        </article>

        <article>
            <a href="https://www.iades.com.br/inscricao/upload/307/2022070893017767.pdf" target="_blank">
                <img src="../Img/brb.PNG" height="200" width="200" alt="Imagem post" title="Imagem Post">
            </a>
            <p><a href="" class="text">Concurso BRB</a></p>
            <h2>Confira o Edital<a href="https://www.iades.com.br/inscricao/upload/307/2022070893017767.pdf"target="_blank" class="title">Aqui

            </a></h2>
        </article>

        <article>
            <a href="https://www.camara.leg.br/midias/file/2023/08/cdep-edital-1.pdf" target="_blank">
                <img src="../Img/camaradeputados.PNG" height="200" width="200" alt="Imagem post" title="Imagem Post">
            </a>
            <p><a href="" class="text">Concurso Camara dos Deputados</a></p>
            <h2>Confira o Edital<a href="https://www.camara.leg.br/midias/file/2023/08/cdep-edital-1.pdf" target="_blank" class="title"></a>Aqui</h2>
        </article>

        <article>
            <a href="https://cdn.cebraspe.org.br/concursos/inss_22/arquivos/ED_1_INSS_22_ABERTURA.PDF" target="_blank">
                <img src="../Img/inss.PNG"height="200" width="200"alt="Imagem post" title="Imagem Post">
            </a>
            <p><a href="" class="text">Concurso do INSS</a></p>
            <h2>Confira o Edital<a href="https://cdn.cebraspe.org.br/concursos/inss_22/arquivos/ED_1_INSS_22_ABERTURA.PDF" target="_blank" class="title">Aqui</a></h2>
        </article>
        <article>
        <?php 
if(!empty($retorno)){  ?>
   <?php 
                  foreach($retorno as $linha){
                    ?>
                    <h2>Concurso</h2>
                        <p><?php 
                            $Arquivo = $linha["dtEncerramento"]; 
                            $ext = strtoupper(pathinfo($Arquivo, PATHINFO_EXTENSION));
                            echo $ext;
                            if(strpos("DOC,DOCX, PDF,XLS,XLSX",$ext)>0 ){
                              echo '<a href="../uploadArq/'.$linha["dtEncerramento"].'"/>Baixar</a>';        
                            } else { 
                        echo '<img src="../uploadArq/'.$linha["dtEncerramento"].'" width="400px"; />';
                            }
                        ?>
                        <?php }  ?>
            <?php }  ?>
                            
            
        </article>
        
        
    
    </section>
    



    

</body>

</html>