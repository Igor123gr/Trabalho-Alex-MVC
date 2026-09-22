<?php

require (__DIR__ . '/../Models/despesaModel.php');


class UsuarioController {

    public function home($pdo, $id = null) {
        $model = new UsuarioModel($pdo);

    $despesa = null;
    if ($id) {
        $despesa = $model->buscarPorId($id);
    }

    return [
        'id'      => $id,
        'nome'    => $despesa['nome']    ?? '',
        'quantia' => $despesa['quantia'] ?? '',
        'prazo'   => $despesa['prazo']   ?? '',
    ];
}

    

public function criar(PDO $pdo) {
     
    $model = new UsuarioModel($pdo);
    $id = $model->criar($_POST);

    header("Location: Telasucesso.php?id=" . $id);
    exit;

        
    }
    public function atualizar($pdo, $id) {
        $model = new UsuarioModel($pdo);
        $model->atualizar($id, $_POST);
        header("Location: Despesastela.php");
        exit;
    }

    public function excluir($pdo, $id) {
        $model = new UsuarioModel($pdo);
        $model->excluir($id);
        header("Location: Despesastela.php");
        exit;
    }
}
?>