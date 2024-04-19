<?php
session_start();
$idUsuario = "";
if (!isset($_SESSION["idUsuario"])) {
    header("location:../index.php?msg=Acesso Indevido!");
}
$idUsuario = $_SESSION["idUsuario"];
$perfil_idPerfil = $_SESSION["perfil_idPerfil"];
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
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="../css/boot.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/opcao.css">
    <link rel="stylesheet" href="../css/list_format.css">
    <link rel="stylesheet" href="../css/formulario.css  ">

    <title> Pesquisar Material </title>
</head>
<body>
<header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img src="../Img/newslogo.png" width="200px" alt="Bem vindo ao News Concursos "
                    title="Bem vindo ao News Concursos"></a>

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
                    
                    <th>Data de Cadastro</th>
                    <th>Nome material</th>
                    <th>titulo</th>
                    <th>Tipo Material</th>
                   
                    
                    
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <?php 
                  foreach($retorno as $linha){
                    ?>
                <tr>
                   

                    <td><?php echo $linha["dtCadastroMaterial"];?> </td>
                    <td><?php echo $linha["nomeMaterial"];?> </td>
                    <td><?php echo $linha["titulo"];?> </td>
                    <td><?php echo $linha["tipoMaterial"];?> </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                <?php echo '<button class="btn">
                <a href="alterarMaterial.php?idMaterial='.
                 $linha["idMaterial"].'">Alterar</a> </button>';?>
                  </td>
                  <td>
                <?php echo ' <button class="btn"> <a href="../Control/excluirMaterialController.php?idMaterial='.
                $linha["idMaterial"].'">Excluir</a> </button> ';?>

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