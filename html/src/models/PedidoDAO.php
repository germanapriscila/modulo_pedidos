<?php
include_once 'src/config/db.php';

class PedidoDAO {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Criar pedido
    public function criar(Pedido $pedido) {
        $sql = "INSERT INTO pedidos (descricao, quantidade, preco, vendedor, data) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $this->conn->prepare(mb_convert_encoding($sql, "UTF-8"));
        $stmt->execute([$pedido->getDescricao(), $pedido->getQuantidade(), $pedido->getPreco(), $pedido->getVendedor()]);
    }
    
    // Listar pedidos
    public function listar($paginaAtual) {
        $sql = "SELECT * FROM pedidos ORDER BY id DESC LIMIT 6 OFFSET " . $paginaAtual * 6;
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   

    // Recuperar total de pedidos pedidos
    public function total() {
        $sql = "SELECT COUNT(*) AS total FROM pedidos";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) ceil($result['total'] / 6);
    }   

    // // Buscar pedido por id
    public function buscarPorId($id) {
        $sql = "SELECT * FROM pedidos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Pedido($resultado['descricao'], $resultado['quantidade'], $resultado['preco'], $resultado['vendedor'], $resultado['id']);
        }
        return null;
    }

    // Atualizar pedido
    public function atualizar(Pedido $pedido) {        
        $sql = "UPDATE pedidos SET descricao = ?, quantidade = ?, preco = ?, vendedor = ?, data = NOW() WHERE id = ?";        
        $stmt = $this->conn->prepare(mb_convert_encoding($sql, "UTF-8"));        
        return $stmt->execute([$pedido->getDescricao(), $pedido->getQuantidade(), $pedido->getPreco(), $pedido->getVendedor(), $pedido->getId()]);
    }

    // Deletar pedido
    public function deletar($id) {
        $sql = "DELETE FROM pedidos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);  
        return $stmt->execute([$id]);
    }

    // Paginação
    // public function contarTotal() {
    //     $sqlTotal = "SELECT COUNT(*) as total FROM pedidos";
    //     $totalRegistros = $this->conn->query($sqlTotal)->fetch()['total'];
    //     $totalPaginas = ceil($totalRegistros / 6);
    //     return $totalPaginas;
    // }

    // public function contarTotalRegistros() {
    //     $sql = "SELECT COUNT(*) as total FROM pedidos";
    //     $stmt = $this->conn->query($sql);
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return (int) $result['total'];
    // }

    // public function buscarPorPagina($indiceInicial, $registrosPorPagina) {
    //     $sql = "SELECT * FROM pedidos LIMIT ? OFFSET ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([$registrosPorPagina, $indiceInicial]);
    //     $pedidosPorPagina = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    
    

}
?>
