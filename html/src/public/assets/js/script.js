// Verifica os parâmetros na URL
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('pedido') && urlParams.has('status')) {
    const pedido = urlParams.get('pedido');
    const status = urlParams.get('status');

    // Combina os valores de 'pedido' e 'status'
    const action = `${pedido}-${status}`;

    switch (action) {

        case 'create-success':
            showMessage('Pedido criado com sucesso!', 'success', 'green lighten-4');
            break;
        case 'create-error':
            showMessage('Erro ao criar o pedido.', 'error', 'pink lighten-4');
            break;
        case 'edit-success':
            showMessage('Pedido atualizado com sucesso!', 'success', 'green lighten-4');
            break;

        case 'edit-error':
            showMessage('Erro ao atualizar o pedido.', 'error', 'pink lighten-4');
            break;

        case 'delete-success':
            showMessage('Pedido excluído com sucesso!', 'success', 'green lighten-4');
            break;

        case 'delete-error':
            showMessage('Erro ao excluir o pedido.', 'error', 'pink lighten-4');
            break;

        default:
            console.log('Ação ou status desconhecido.');
            break;
    }
}

// Exibe tootip nos botões editar e apagar pedido
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    M.Tooltip.init(elems);
});

// Abre a barra de navegação lateral em dispositivos móveis
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    M.Sidenav.init(elems);
});

// Função para exibir mensagem
function showMessage(message, type, classe) {
    const div = document.createElement("div");
    div.className = `message ${type} card-panel ${classe}`;
    div.textContent = message;
    document.getElementById("message-box").appendChild(div);
    // Remove a mensagem após 3 segundos
    setTimeout(() => {
        div.remove();
    }, 3000);
}

// Selecionar os campos para calcular valor total dos pedidos
const quantidadeInput = document.getElementById('quantidade');
const precoInput = document.getElementById('preco');
const totalInput = document.getElementById('total');

// Função para calcular o total
function calcularTotal() {
    const quantidade = parseFloat(quantidadeInput.value) || 0;
    const preco = parseFloat(precoInput.value) || 0;
    const total = quantidade * preco;
    totalInput.value = total.toFixed(2); // Formatado com 2 casas decimais
}

// Adicionar eventos de escuta para mudanças nos campos
quantidadeInput.addEventListener('input', calcularTotal);
precoInput.addEventListener('input', calcularTotal);