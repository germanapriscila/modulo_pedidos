<?php
include_once 'src/models/Pedido.php';
include_once 'src/models/PedidoDAO.php';

class PedidoController {
    private $pedidoDAO;

    public function __construct() {
        $this->pedidoDAO = new PedidoDAO();
    }

    // Listar pedidos
    public function listarPedidos() {
        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] - 1 : 0;

        $pedidos = $this->pedidoDAO->listar($paginaAtual);
        $totalRegistros = count($pedidos);

        $totalPaginas = $this->pedidoDAO->total();

        include 'src/views/index.php';
    }

    // Criar pedido
    public function criarPedido($descricao, $quantidade, $preco, $vendedor) {
        $pedido = new Pedido($descricao, $quantidade, $preco, $vendedor);
        try {
            $this->pedidoDAO->criar($pedido);
            // Redireciona com status de sucesso
            header("Location: /index.php?pedido=create&status=success");
        } catch (Exception $e) {
            header("Location: /index.php?pedido=create&status=error&message=" . urlencode($e->getMessage()));
        }
        exit();
    }

    // Exibir pedido para edição
    public function editarPedido($id) {
        $pedido = $this->pedidoDAO->buscarPorId($id);
        include 'src/views/update.php';
    }

    // Atualizar pedido
    public function atualizarPedido($id, $descricao, $quantidade, $preco, $vendedor) {        
        $pedido = new Pedido($descricao, $quantidade, $preco, $vendedor, $id);        
        try {            
            $resultado = $this->pedidoDAO->atualizar($pedido);
            if ($resultado) {
                // Redireciona com status de sucesso
                header("Location: /index.php?pedido=edit&status=success");
            } else {
                // Redireciona com status de erro
                header("Location: /index.php?pedido=edit&status=error");
            }
        } catch (Exception $e) {
            // Redireciona com status de erro em caso de exceção
            header("Location: /index.php?pedido=edit?status=error&message=" . urlencode($e->getMessage()));
        }
        exit();        
    }

    // Deletar pedido
    public function deletarPedido($id) {
        try {
            $resultado = $this->pedidoDAO->deletar($id); // Verifique se o método retorna sucesso ou falha
            if ($resultado) {
                // Redireciona com status de sucesso
                header("Location: /index.php?pedido=delete&status=success");
            } else {
                // Redireciona com status de erro
                header("Location: /index.php?pedido=delete&status=error");
            }
        } catch (Exception $e) {
            // Redireciona com status de erro em caso de exceção
            header("Location: /index.php?pedido=delete&status=error&message=" . urlencode($e->getMessage()));
        }
        exit(); 
    }
}
?>
