<?php
// LOCAL: index.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Bruno-e-Igor/Pierre-CRUD/Parte.do.Igor/config/conexao.php';   
require_once $_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Bruno-e-Igor/Pierre-CRUD/Parte.do.Igor/app/Controllers/despesacontrol.php';

$controller = new UsuarioController();
$acao = $_GET['acao'] ?? 'home';
$id = $_GET['id'] ?? null;

switch ($acao) {
    case 'cadastrar': $controller->criar($pdo); break;
    case 'atualizar': $controller->atualizar($pdo, $id); break;
    case 'excluir':   $controller->excluir($pdo, $id); break;
    default:  
        $dados = $controller->home($pdo, $id);
        extract($dados);
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contas a pagar</title>
</head>
<body>

<div class="container">
    <h1>Contas a pagar</h1>

  <form method="POST" action="Despesastela.php?acao=<?= $id ? 'atualizar' : 'cadastrar' ?><?= $id ? '&id=' . $id : '' ?>">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome ?? '') ?>" required>

    <label for="quantia">Quantia:</label>
    <input type="number" id="quantia" name="quantia" value="<?= htmlspecialchars($quantia ?? '') ?>" required>

    <label for="prazo">Prazo:</label>
    <input type="date" id="prazo" name="prazo" value="<?= htmlspecialchars($prazo ?? '') ?>" required>

    <button type="submit">Salvar</button>
</form>
    

 <div class="container">
            <a href="Tabelainteira.php" class="btn btn-success mt-4"> Ver todas as dividas</a>
        </div>
</body>
</html>
