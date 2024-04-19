<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/boot.css">
    
   
    <title> Entrar no Sistema </title>
</head>
<body>
<header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img src="../img/newslogo.png" width="125px" alt="Bem vindo ao projeto " title="Bem vindo ao projeto"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="../index.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>

<div class="modal">
 <div class="div_login">
    <form name="login" id="login"
    action="../Control/loginController.php" 
    method="POST">

                <h1>Login</h1>
                <br>
                <input type="text" name="emailUsuario" placeholder="Email" class="input">
                <br><br>
                <input type="password" name="senhaUsuario" placeholder="Senha" class="input">
                <br><br>
                <button class="button">Enviar</button>
            </form>
        </div>
    </div> 
    
</body>
</html>

<!-- <div class="overlay"></div>
    <div class="modal">
        <div class="div_login">
            <form action="opcao.html" method="get">
                <h1>Login</h1>
                <br>
                <input type="text" name="emailUsuario" placeholder="Nome" class="input">
                <br><br>
                <input type="password" name="senhaUsuario" placeholder="Senha" class="input">
                <br><br>
                <button class="button">Enviar</button>
            </form>
        </div>
    </div> -->