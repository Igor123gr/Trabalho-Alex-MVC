<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Bruno-e-Igor/Pierre-CRUD/Parte.do.Igor/config/conexao.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Bruno-e-Igor/Pierre-CRUD/Parte.do.Igor/app/Models/despesaModel.php';

$model = new UsuarioModel($pdo);
$rowTablea = $model->buscarTodos();
$numLinhas = count($rowTablea);
?>

<!doctype html>
<html lang="pt-br" data-bs-theme="light">
    <head>
        <title>Contas a Receber</title>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous" />
    </head>
    <body>  

    <div class="container">
        <h1 style="text-align: center;"> Contas a pagar </h1>
    </div>

    <?php if ($numLinhas > 0) { ?>
        <div class='container'>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Nome</th>
                        <th scope='col'>Valor</th>
                        <th scope='col'>Data</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rowTablea as $row) { ?>
                        <tr>
                            <th scope="row"><?= $row['id'] ?></th>
                            <td><?= htmlspecialchars($row['nome']) ?></td>
                            <td><?= htmlspecialchars($row['quantia']) ?></td>
                            <td><?= htmlspecialchars($row['prazo']) ?></td>
                            <td>
                                <a href="Despesastela.php?id=<?= $row['id'] ?>" class="material-symbols-outlined" style="color:black">edit</a>
                                <a href="Despesastela.php?acao=excluir&id=<?= $row['id'] ?>" class="material-symbols-outlined" style="color: black;"
                                   onclick="return confirm('Tem certeza que deseja excluir?')">delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
    <?php } else { ?>
        <div class='container'>
            <div class='alert alert-danger mt-4' role='alert'>Nada foi Cadastrado!</div>      
            <a href='Despesastela.php' class='btn btn-success mt-4'> Voltar para o Inicio</a>
        </div>
    <?php } ?>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>