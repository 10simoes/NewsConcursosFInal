<?php
  session_start();
  $idUsuarioLogin = "";
  $perfil_idPerfilLogin = "";

  //Valida se houve login no sistema
  if(isset($_SESSION["idUsuario"])){
    //Passa o perfil de login para uma variável
    //O perfil de Administrador permite mudar o Perfil do Usuário
    //e a Situação 
    $perfil_idPerfilLogin = $_SESSION["perfil_idPerfil"];
  }
  //Testa de o Cadastro foi acionado pelo menu com o tipo: PF ou PJ
  if(isset($_GET["perfil"])){
    $perfil_idPerfil = $_GET["perfil"];
  } else {
    //Define o perfil como PF, se não for passado via GET
    $perfil_idPerfil = "3";
  }
  //incorpora a Função que monta o SELECT da UF
  require_once "../Control/montarUF.php";  

  //incorpora o usuario DTO e DAO para poder carregar a lista de Pefis 
  require_once "../Model/usuarioDTO.php";
  require_once "../Model/usuarioDAO.php";
  $usuarioDAO = new UsuarioDAO();
  $perfis = $usuarioDAO->listarPerfil();

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
    
    <title> Cadastro de Usuário </title>
</head>
<body>
  
<header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img src="../img/newslogo.png" width="125px" alt="Bem vindo ao projeto "
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
        <form name="cadastrarUsuario" 
    id="cadastrarUsuario"
    action="../Control/cadastrarUsuarioController.php" 
    method="POST" 
    enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nomeUsuario" placeholder="Informe nome" required>
            </div>
            <div class="form-group">
                <label for="arquivo">Foto usuário:</label>
                <input type="file" name="fotoUsuario" placeholder="Selecione foto" >
            </div>
            <div class="form-group">
                <label for="dtNascimento">Data Nascimento:</label>
                <input type="date" name="dtNascimento" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" required placeholder="Informe CPF">
            </div>
           

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="emailUsuario" required placeholder="Informe Email">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senhaUsuario" required placeholder="Informe Senha">
            </div>
            <div class="form-group">
                <label for="situacao usuario">Situação:</label>
                <select name="situacaoUsuario" id="">
                    <option value="">Ativo</option>
                    <option value="">Inativo</option>
                    <option value="">Bloqueado</option>
                </select>
            </div>

            <div class="form-group">
            <input type="hidden" name="perfil_idPerfil" value="<?php echo $perfil_idPerfil;?>">
            </div>
            
            <div class="form-grou_btn">
                <p>
                    <br><br><br>
                    <button type="submit">Cadastrar</button>
                </p>
            </div>
        </form>

    </div>


</body>


</html>
 

