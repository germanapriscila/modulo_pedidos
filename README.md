# Projeto Integrador Transdisciplinar em Engenharia de Software II

**8º Semestre - 2024.2**  
**Professor:** Luis Carlos Machi  

## Situação-Problema
Precisamos desenvolver um módulo no sistema que permita visualizar os pedidos dos vendedores, com a possibilidade de corrigir ou modificar os dados antes que o pedido se torne uma ordem de serviço.

## Solução
Implementação de um CRUD simples utilizando Programação Orientada a Objetos e o padrão de arquitetura MVC.

## Stack de Desenvolvimento
- **Servidor:** Apache  
- **Banco de Dados:** MariaDB  
- **Back-End:** PHP  
- **Front-End:** HTML (marcação), CSS (estilização), e JavaScript (manipulação do DOM)  
- **SGBD:** Adminer  
- **Containerização:** Docker  

## Instruções para Configuração
Clone o projeto e utilize os comandos abaixo para construir e inicializar os containers:

### Construir e inicializar:
```bash
docker-compose up --build -d
```
### Apenas inicializar:
```bash
docker-compose up --build -d
```

#### Execute o comando abaixo no SGBD para criar a tabela pedidos:
```markdown
```sql
CREATE TABLE `pedidos` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `descricao` VARCHAR(255) NOT NULL,
  `quantidade` INT NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `total` DECIMAL(10,2) NOT NULL,
  `vendedor` VARCHAR(100) NOT NULL,
  `data` DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP
);
```

## Estrutura de pastas e arquivos:
modulo_pedidos<br> ├── html<br> │ ├── src<br> │ │ ├── config<br> │ │ │ └── db.php<br> │ │ ├── controllers<br> │ │ │ └── PedidoController.php<br> │ │ ├── models<br> │ │ │ ├── Pedido.php<br> │ │ │ └── PedidoDAO.php<br> │ │ ├── public<br> │ │ │ ├── assets<br> │ │ │ │ ├── css<br> │ │ │ │ │ └── styles.css<br> │ │ │ │ ├── js<br> │ │ │ │ │ └── script.js<br> │ │ ├── views<br> │ │ │ ├── templates<br> │ │ │ │ ├── header.php<br> │ │ │ │ └── footer.php<br> │ │ │ ├── create.php<br> │ │ │ ├── index.php<br> │ │ │ └── update.php<br> │ └── index.php<br> ├── docker-compose.yml<br> ├── Dockerfile<br>







