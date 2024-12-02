<?php
require_once "template/header.php";
?>

<div class="row">
    <div class="container">
        <div id="message-box"></div>
        <h3 class="brown-text text-darken-1">Editar pedido</h3>
        <form method="POST" action="../index.php" class="col s12">
            <div class="row">
                <div class="input-field col s12 m8 l6">
                    <input
                        type="text"
                        name="descricao"
                        value="<?= $pedido->getDescricao(); ?>"
                        required>
                    <label class="active" for="descricao">Descrição</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8 l6">
                    <input
                        id="quantidade"
                        type="number"
                        name="quantidade"
                        min="0"
                        step="1"
                        value="<?= $pedido->getQuantidade(); ?>"
                        required>
                    <label class="active" for="quantidade">Quantidade</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8 l6">
                    <input
                        type="number"
                        id="preco"
                        min="0"
                        step="0.01"
                        name="preco"
                        value="<?= $pedido->getPreco(); ?>"
                        required>
                    <label class="active" for="preco">Preço unitário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8 l6">
                    <input
                        type="text"
                        id="total"
                        name="total"
                        class="validate"
                        value="<?= number_format($pedido->getTotal(), 2, ',', '.'); ?>"
                        readonly    >
                    <label class="active" for="total">Total</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8 l6">
                    <input
                        type="text"
                        name="vendedor"
                        value="<?= $pedido->getVendedor(); ?>"
                        required>
                    <label class="active" for="vendedor">Vendedor</label>
                </div>
            </div>
            <div class="section" id="section">
                <button
                    type="submit"
                    name="atualizar"
                    value="<?= $pedido->getId(); ?>"
                    class="waves-effect waves-light btn-large red lighten-4 brown-text text-darken-3">
                    <i class="material-icons right brown-text text-darken-3">save</i>Atualizar Pedido
                </button>
                <a
                    href="/"
                    class="waves-effect waves-light btn-large brown lighten-4 brown-text text-darken-3">
                    <i class="material-icons right brown-text text-darken-3">cancel</i>Cancelar
                </a>
            </div>
        </form>
    </div>
</div>