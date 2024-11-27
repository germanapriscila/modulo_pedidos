<?php 
    include "template/header.php";
?>

<div class="container">
    <div id="message-box"></div>
    <h3>Pedidos</h3>
    <table class="highlight">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Vendedor</th>
                <th>Data do pedido</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido) { ?>
                <tr>
                    <td><?php echo $pedido['id']; ?></td>
                    <td><?php echo $pedido['descricao']; ?></td>
                    <td><?php echo $pedido['quantidade']; ?></td>
                    <td><?php echo number_format($pedido['preco'], 2, ',', '.'); ?></td>
                    <td><?php echo $pedido['vendedor']; ?></td>
                    <td><?php echo date("d/m/Y H:m:s", strtotime($pedido['data'])); ?></td>
                    <td>
                        <a href="index.php?editar=<?php echo $pedido['id']; ?>" 
                           class="btn tooltipped btn-floating btn-medium waves-effect waves-light purple accent-1" 
                           data-position="top" 
                           data-tooltip="Editar pedido">
                            <i class="material-icons">edit</i>
                        </a>    
                        <a href="index.php?deletar=<?php echo $pedido['id']; ?>" 
                           class="btn tooltipped btn-floating btn-medium waves-effect waves-light purple accent-1" 
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
    <div class="section" id="section">
        <a href="views/create.php" class="waves-effect waves-light btn-large red lighten-2">
            <i class="material-icons right">add</i>Criar novo pedido
        </a> 
    </div>      
</div>
