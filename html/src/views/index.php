<?php
include "template/header.php";
?>

<div class="container">
    <div id="message-box"></div>
    <h3 class="brown-text text-darken-1">Pedidos</h3>
    <table class="highlight">
        <thead>
            <tr class="brown-text text-darken-1">
                <th>Código</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Total</th>
                <th>Vendedor</th>
                <th>Data/hora do pedido</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido) { ?>
                <tr>
                    <td><?= $pedido['id']; ?></td>
                    <td><?= $pedido['descricao']; ?></td>
                    <td><?= $pedido['quantidade']; ?></td>
                    <td><?= number_format($pedido['preco'], 2, ',', '.'); ?></td>
                    <td><?= number_format($pedido['total'], 2, ',', '.'); ?></td>
                    <td><?= $pedido['vendedor']; ?></td>
                    <td><?= date("d/m/Y H:m:s", strtotime($pedido['data'])); ?></td>
                    <td>
                        <a href="index.php?editar=<?= $pedido['id']; ?>"
                            class="btn tooltipped btn-floating btn-medium waves-effect waves-light brown lighten-1"
                            data-position="top"
                            data-tooltip="Editar pedido">
                            <i class="material-icons">edit</i>
                        </a>
                        <a href="index.php?deletar=<?= $pedido['id']; ?>"
                            class="btn tooltipped btn-floating btn-medium waves-effect waves-light brown lighten-1"
                            data-position="top"
                            data-tooltip="Excluir pedido"
                            onclick="return confirm('Você tem certeza que deseja excluir este pedido?');">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Paginação -->
    <ul class="pagination center" id="section">
        <!-- Botão "Anterior" -->
        <li class="<?php echo $paginaAtual == 0 ? 'disabled' : 'waves-effect'; ?>">
            <a <?= $paginaAtual == 0 ? "" : 'href="?pagina=' . $paginaAtual . '"'; ?>>
                <i class="material-icons">chevron_left</i>
            </a>
        </li>

        <!-- Números de páginas -->
        <?php for ($i = 0; $i < $totalPaginas; $i++): ?>
            <li class="<?php echo $paginaAtual == $i ? 'active' : 'waves-effect'; ?>">
                <a href="?pagina=<?= $i + 1; ?>"><?= $i + 1; ?></a>
            </li>
        <?php endfor; ?>

        <!-- Botão "Próximo" -->
        <li class="<?= $paginaAtual == ($totalPaginas - 1) ? 'disabled' : 'waves-effect'; ?>">
            <a <?= $paginaAtual == ($totalPaginas - 1) ? "" : 'href="?pagina=' . ($paginaAtual + 2) . '"'; ?>>
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    </ul>

    <!-- Botão Criar novo pedido -->
    <div class="section" id="section">
        <a href="src/views/create.php" class="waves-effect waves-light btn-large red lighten-4 brown-text text-darken-3">
            <i class="material-icons right brown-text text-darken-3">add</i>Criar novo pedido
        </a>
    </div>
</div>

<?php
include "template/footer.php";
?>