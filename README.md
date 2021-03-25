# Sistema de gerenciamento de veículos

![](https://aws1.discourse-cdn.com/standard14/uploads/slimframework/original/1X/704c3a9a7ce53ea7d06952ff4a33cf945e68ac4e.png)

#### Instrução

  - Desenvolver um sistema de gerenciamento de veículos para uma locadora
 

#### Pré-requisitos
  - Php 7.2 ou superior
  - Base de dados mysql (phpMyAdmin ou Workbench)

#### Executando a aplicação
Baixe o zip da aplicação ou clone o repoositório com o comando:
```sh
git clone <repositorio remoto>
```
A aplicação possui as credenciais padrões de uma database local, porém se voce necessitar alterar esta configuração vá ao caminho `app/helpers/config.php` e altere para as suas credenciais. Crie uma base de dados em seu SGBD (phpMyAdmin ou Workbench) chamada locadora_veiculos e importe o arquivo `locadora_veiculos.sql` para dentro dela, após isso execute o comando dentro do repositório raiz:
```sh
php -S localhost:5000 -t public
```
Ao executar o comando sua aplicação rodará na url `localhost:5000`, basta digitar o caminho em seu navegador.

### Rotas da aplicação.
A aplicação possui as seguintes rotas:

| Uri | Tipo | Valores 
| ------ | ------ | ---------|
| /aluguel-veiculos | GET | exibe view e retorna lista de veiculos alugados. |
| /alugar-carro | POST | Recebe um array com os valores: nome do locatario, endereço, cpf , id do veiculo, telefone , valor do aluguel , data de locação, data de entrega. |
| /devolucao-carro | POST |Recebe um array com os valores: id do carro, status do carro (boleano 0 e 1 onde 0 é disponível), id de devolução do carro.
| /controle-veiculos | GET | exibe view e retorna lista de veiculos cadastrados.|
| /insere-veiculos | POST | Recebe um array com os valores: modelo do carro, ano, marca, placa, imagem do carro, status. |
| /atualiza-veiculos | POST | Recebe um array com os valores: modelo do carro, ano, marca, placa. |
| /remove-veiculos | POST | Recebe um array com os valores:  id do carro. |
