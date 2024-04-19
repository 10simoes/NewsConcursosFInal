
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
    <h1>Formulário Cadastro Concurso</h1>
    <div class="container">
        <form name="cadastrarConcurso" 
    id="cadastrarConcurso"
    action="../control/cadastrarConcursoController.php" 
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