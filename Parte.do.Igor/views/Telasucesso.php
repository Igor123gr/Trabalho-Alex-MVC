<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Bruno-e-Igor/Pierre-CRUD/Parte.do.Igor/config/conexao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Bruno-e-Igor/Pierre-CRUD/Parte.do.Igor/app/Models/despesaModel.php';

$id = $_GET['id'] ?? null;

$model = new UsuarioModel($pdo);
$despesa = $id ? $model->buscarPorId($id) : null;

$nome    = $despesa['nome']    ?? '';
$quantia = $despesa['quantia'] ?? '';
$prazo   = $despesa['prazo']   ?? '';



?>
<!doctype html>
<html lang="pt-br" data-bs-theme="light">
    <head>
        <title>Contas a pagar</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous" />
    </head>
    <body>  

    <div class="container">
        <h1 style="text-align: center;"> Divida Lançada com Sucesso </h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope='row'><?= htmlspecialchars($id ?? '') ?></th>
                    <td><?= htmlspecialchars($nome) ?></td>
                    <td><?= htmlspecialchars($quantia) ?></td>
                    <td><?= htmlspecialchars($prazo) ?></td>
                    </tr> 
                </tbody>
            </table>
    </div>

        <div class="container">
            <a href="Despesastela.php" class="btn btn-success mt-4"> Cadastrar Novo Financeiro</a>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>