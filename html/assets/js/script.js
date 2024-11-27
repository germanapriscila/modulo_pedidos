document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    M.Tooltip.init(elems);
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    M.Modal.init(elems);
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    M.Sidenav.init(elems);
});

// Verifica os parâmetros na URL
// const urlParams = new URLSearchParams(window.location.search);
// console.log(urlParams);
// if(urlParams.has('pedido') && urlParams.has('status')) {
//     const pedido = urlParams.get('pedido');
//     const status = urlParams.get('status');
//     if(pedido === 'edit' && status === 'success') {
//         showMessage('Pedido atualizado com sucesso!', 'success', 'green lighten-4');
//     } else if (pedido === 'edit' && status === 'error') {
//         showMessage('Erro ao atualizar o pedido.', 'error', 'red lighten-4');
//     } else if (pedido === 'delete' && status === 'success') {
//         showMessage('Pedido excluído com sucesso!', 'success', 'green lighten-4');
//     } else if (pedido === 'delete' && status === 'error') {
//         showMessage('Erro ao excluir o pedido.', 'error', 'red lighten-4');   
//     }
// }

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

const urlParams = new URLSearchParams(window.location.search);

if (urlParams.has('pedido') && urlParams.has('status')) {
    const pedido = urlParams.get('pedido');
    const status = urlParams.get('status');

    // Combina os valores de 'pedido' e 'status'
    const action = `${pedido}-${status}`;

    switch (action) {
        case 'create-success':
            showMessage('Pedido gerado com sucesso!', 'success', 'green lighten-4');
            break;
        
        case 'create-error':
            showMessage('Erro ao gerar o pedido.', 'success', 'green lighten-4');
            break;

        case 'edit-success':
            showMessage('Pedido atualizado com sucesso!', 'success', 'green lighten-4');
            break;

        case 'edit-error':
            showMessage('Erro ao atualizar o pedido.', 'error', 'red lighten-4');
            break;

        case 'delete-success':
            showMessage('Pedido excluído com sucesso!', 'success', 'green lighten-4');
            break;

        case 'delete-error':
            showMessage('Erro ao excluir o pedido.', 'error', 'red lighten-4');
            break;

        default:
            console.log('Ação ou status desconhecido.');
            break;
    }
}







// if (urlParams.has('status')) {    
//     const status = urlParams.get('status');
//     if (status === 'success') {
//         showMessage('Pedido excluído com sucesso!', 'success', 'green lighten-4');
//     } else {
//         showMessage('Erro ao excluir o pedido.', 'error', 'red lighten-4');
//     }
// }