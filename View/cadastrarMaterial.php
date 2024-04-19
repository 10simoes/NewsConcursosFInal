
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
        <form name="cadastrarMaterial" 
    id="cadastrarMaterial"
    action="../control/cadastrarMaterialController.php" 
    method="POST" 
    enctype="multipart/form-data">
    


            <div class="form-group">
                <label for="concurso_idConcurso">ID do Concurso:</label>
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