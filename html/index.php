<?php
include_once 'src/controllers/PedidoController.php';

$controller = new PedidoController();

if (isset($_GET['deletar'])) {
    $controller->deletarPedido($_GET['deletar']);
} elseif (isset($_GET['editar'])) {
    $controller->editarPedido($_GET['editar']);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['criar'])) {
        $controller->criarPedido($_POST['descricao'], $_POST['quantidade'], $_POST['preco'], $_POST['vendedor']);
    } elseif (isset($_POST['atualizar'])) {
        $controller->atualizarPedido($_POST['atualizar'], $_POST['descricao'], $_POST['quantidade'], $_POST['preco'], $_POST['vendedor']);
    }
} else {
    $controller->listarPedidos();
    // $controller->paginarLista();  
}
?>

