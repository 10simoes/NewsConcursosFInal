
<!-- //   session_start();
//   $idMaterial = "";
//   if(!isset($_SESSION["idUsuario"])){
//     header("location:../index.php?msg=Acesso Indevido!");
//   }
//   $idUsuario = $_SESSION["idUsuario"] ;
//   $perfil_idPerfil = $_SESSION["perfil_idPerfil"] ;
//   require_once '../Model/materialDTO.php';
//   require_once '../Model/materialDAO.php';
//   $materialDAO = new MaterialDAO(); 
//   $retorno = $materialDAO->PesquisarMaterial(); -->


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/assinatura.css">
    <link href="../css/boot.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Assinatura</title>
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
    <div class="container_dois">
<h1>ASSINATURAS</h1>
    </div>
<div class="container">
    <div class="card">
        <div class="card-title">
            <h2>Mensal</h2>
            <p><i class="fa fa-rupee"></i><span>99</span>/mês</p>
        </div>
        <div class="card-content">
        <ul>
                <li><i class="fa fa-check-circle"></i>Acesso a todos os materiais</li>
                <li><i class="fa fa-check-circle"></i>Plataforma online 24hrs</li>
                <li><i class="fa fa-check-circle"></i>Funcionamento 24hrs</li>
                <li><i class="fa fa-check-circle"></i>Free Domain</li>
                <li><i class="fa fa-check-circle"></i>Email de ajuda</li>
                <li><i class="fa fa-check-circle"></i>24/7 Support</li>
            </ul>
            <button><a href="../View/opcao.html">Assinar</a></button>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
            <h2>Semestral</h2>
            <p><i class="fa fa-rupee"></i><span>500</span>/Semestral</p>
        </div>
        <div class="card-content">
        <ul>
                <li><i class="fa fa-check-circle"></i>Acesso a todos os materiais</li>
                <li><i class="fa fa-check-circle"></i>Plataforma online 24hrs</li>
                <li><i class="fa fa-check-circle"></i>Funcionamento 24hrs</li>
                <li><i class="fa fa-check-circle"></i>Free Domain</li>
                <li><i class="fa fa-check-circle"></i>Email de ajuda</li>
                <li><i class="fa fa-check-circle"></i>24/7 Support</li>
            </ul>
            <button><a href="../View/opcao.html">Assinar</a></button>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
            <h2>Anual</h2>
            <p><i class="fa fa-rupee"></i><span>899</span>/Anual</p>
        </div>
        <div class="card-content">
            <ul>
                <li><i class="fa fa-check-circle"></i>Acesso a todos os materiais</li>
                <li><i class="fa fa-check-circle"></i>Plataforma online 24hrs</li>
                <li><i class="fa fa-check-circle"></i>Funcionamento 24hrs</li>
                <li><i class="fa fa-check-circle"></i>Free Domain</li>
                <li><i class="fa fa-check-circle"></i>Email de ajuda</li>
                <li><i class="fa fa-check-circle"></i>24/7 Support</li>
            </ul>
            <button><a href="../View/opcao.html">Assinar</a></button>
        </div>
    </div>
</div>
    
</body>
</html>