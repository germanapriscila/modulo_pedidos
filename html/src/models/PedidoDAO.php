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
    public function listar() {
        $sql = "SELECT * FROM pedidos ORDER BY id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

}
?>
