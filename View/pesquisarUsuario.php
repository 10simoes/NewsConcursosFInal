<?php
session_start();
$idUsuario = "";
if (!isset($_SESSION["idUsuario"])) {
    header("location:../index.php?msg=Acesso Indevido!");
}
$idUsuario = $_SESSION["idUsuario"];
$perfil_idPerfil = $_SESSION["perfil_idPerfil"];
require_once '../Model/usuarioDTO.php';
require_once '../Model/usuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$retorno = $usuarioDAO->PesquisarUsuario();
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

    <title> Pesquisar Usuário </title>
</head>

<body>
    <header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img src="../img/newslogo.png" width="200px" alt="Bem vindo ao projeto " title="Bem vindo ao projeto"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="../index.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
    if (!empty($retorno)) {  ?>
        <div class="list_container">
            <h1>Listagem de dados</h1>
            <form action="">
                <table width="1150px">
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>

                        <th>Email</th>
                        <th></th>
                        <th></th>
                        

                        <th>Ação</th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
                    foreach ($retorno as $linha) {
                    ?>

                        <tr>
                            <td>
                                
                                <img src='../uploadArq/' .<?php echo $linha['fotoUsuario']; ?> width='5%'>
                            </td>


                            <td><?php echo $linha["nomeUsuario"]; ?> </td>
                            <td><?php echo $linha["emailUsuario"]; ?> </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <?php echo '<button class="btn">
                <a href="AlterarUsuario.php?idUsuario=' .
                                    $linha["idUsuario"] . '">Alterar</a> </button>'; ?>
                            </td>
                            <td>
                          <?php echo ' <button class="btn"> <a href="../Control/excluirUsuarioController.php?idUsuario=' .
                                    $linha["idUsuario"] . '">Excluir</a> </button> '; ?> 


                            </td>
                        </tr>
                    <?php } ?>

                </table>
            </form>
        </div>
    <?php } ?>
    <?php


    // if(!empty($retorno)){
    //   echo "<hr>";
    //   foreach($retorno as $linha){
    //     //foto
    //     echo '<div class="fotoUsuario">';
    //     echo '<img src="../foto/'.$linha["fotoUsuario"].
    //           '" width="5%">';
    //     echo '</div>'; //fim foto
    //     //nome
    //     echo '<div class="nomeUsuario">';
    //     echo $linha["nomeUsuario"];
    //     echo '</div>'; //fim nome
    //     //email
    //     echo '<div class="emailUsuario">';
    //     echo $linha["emailUsuario"];
    //     echo '</div>'; //fim email
    //     //situação
    //     echo '<div class="situacaoUsuario">';
    //     echo '<a href="AlterarUsuario.php?idUsuario='.
    //           $linha["idUsuario"].'">Alterar</a>';
    //     echo ' <a href="../Control/excluirUsuarioController.php?idUsuario='.
    //           $linha["idUsuario"].'">Excluir</a>';
    //     //Situação : Ativo, Inativo e Bloqueado
    //     echo ' <select name="situacaoUsuario"> ';
    //     if($linha["situacaoUsuario"]=="Ativo"){
    //       echo ' <option value="Ativo" selected="selected">Ativo</option>';
    //     } else {
    //       echo ' <option value="Ativo">Ativo</option>';
    //     }
    //     if($linha["situacaoUsuario"]=="Inativo"){
    //       echo ' <option value="Inativo" selected="selected">Inativo</option>';
    //     } else {
    //       echo ' <option value="Inativo">Inativo</option>';
    //     }
    //     if($linha["situacaoUsuario"]=="Bloqueado"){
    //       echo ' <option value="Bloqueado" selected="selected">Bloqueado</option>';
    //     } else {
    //       echo ' <option value="Bloqueado">Bloqueado</option>';
    //     }      
    //     echo '</select>';

    //     echo '</div>'; //fim situação  
    //     echo "<hr>";
    //   }
    // } else {
    //   echo "<hr>*** NENHUM USUÁRIO LOCALIZADO ***<hr>";
    // }




    ?>

</body>

</html>