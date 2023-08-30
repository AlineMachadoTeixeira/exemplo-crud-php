## Exercícios

### 30/08/2023

#### Exercício 04

Quando Você clicar em editar um fabricante na pasta visualizar.php o nome dos dados dos produtos precisa aparecer

- Em `produtos/visualizar.php` crie um link dinâmico para a página **atualizar.php** passando o `id` do produto como parâmetro de URL.

- Em `produtos/atualizar.php` faça a programação necessária para capturar/sanitizar o valor do parâmetro `id` vindo da URL.

- Em `funcoes-produtos.php` programe uma função chamada `lerUmProduto` que receba o `id` do produto a ser consultado e retorne um array associativo com os dados do produto.

- Em `produtos/atualizar.php` faça a programação necessária para chamar a função `lerUmProduto` e, após receber os dados de retorno dela, exiba os valores nos campos **nome**, **preço**, **quantidade** e **descricao**.

***Obs.:** por enquanto, não se preocupe em mostrar qual o fabricante do produto selecionado.*
