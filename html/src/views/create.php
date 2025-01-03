<?php
require_once "template/header.php";
?>

<div class="row">
    <div class="container">
        <h3 class="brown-text text-darken-1">Cadastrar pedido</h3>
        <form method="POST" action="/index.php" class="col s12">
            <div class="row">
                <div class="input-field col s12 m8 l6">
                    <input
                        name="descricao"
                        type="text"
                        class="validate"
                        placeholder="Digite a descrição"
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
                        class="validate"
                        placeholder="Digite a quantidade"
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
                        class="validate"
                        placeholder="Digite preço"
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
                        placeholder="0,00"
                        readonly>
                    <label class="active" for="total">Total</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8 l6">
                    <input
                        type="text"
                        name="vendedor"
                        class="validate"
                        placeholder="Digite o vendedor"
                        required>
                    <label class="active" for="vendedor">Vendedor</label>
                </div>
            </div>
            <div class="section" id="section">
                <button
                    type="submit"
                    name="criar"
                    class="waves-effect waves-light btn-large red lighten-4 brown-text text-darken-3">
                    <i class="material-icons right brown-text text-darken-3">save</i>Salvar Pedido
                </button>
                <a href="/"
                    class="waves-effect waves-light btn-large brown lighten-4 brown-text text-darken-3">
                    <i class="material-icons right brown-text text-darken-3">cancel</i>Cancelar
                </a>
            </div>
        </form>
    </div>
</div>