<?php
class Pedido
{
    private $id;
    private $descricao;
    private $quantidade;
    private $preco;
    private $total;
    private $vendedor;

    public function __construct($descricao, $quantidade, $preco, $total, $vendedor, $id = null)
    {
        $this->descricao = $descricao;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
        $this->total = $total;
        $this->vendedor = $vendedor;
        if ($id) {
            $this->id = $id;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getVendedor()
    {
        return $this->vendedor;
    }

    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;
    }
}
