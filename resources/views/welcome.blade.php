<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Bibliioteca da Escola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="menu">
        <div class="offcanvas-header">
            <h5>Cadastros</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas">

            </button>
        </div>
        <div class=" d-grid gap-2 ">
            <a role="button" class="btn btn-outline-warning" style="margin: 1em" href="{{ url('/livros') }}">Cadastro de Livros</a>
        </div>
    </div>

    <div class="text-center">
        <h3>Bem vindo ao Sistema Biblioteca Digital</h3>
        <a role="button" data-bs-toggle="offcanvas" class="btn btn-primary" href="#menu">
            Começar
        </a>
        <a class="btn btn-secondary" href="{{ url('/logout') }}">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
