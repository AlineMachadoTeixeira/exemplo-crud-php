/* Selecionando os links de EXCLUIR através da class="excluir" (Que está na pasta visualizar.php linha 98 do HTML) */
const links = document.querySelectorAll(".excluir");


/* Percorrendo cada link selecionando anteriormente (conteúdo da constante "links") */
for(const link of links){
    /* Adicionando um evento de clique para cada link de excluir. */
    link.addEventListener("click", function(event) { 

        /* Anulando o comportamento padrão do link que é redirecionar para algum lugar. */
        event.preventDefault();
        let resposta = confirm("Deseja realmente excluir este registro?")

        /* Usando um confirm() para capturar a resposta do usuário, que pode ser ok/Sim (true/verdadeiro) ou Cancelar/Não (false) */
        console.log(resposta);

        /* Se a resposta for true, então redirecionamos para o destino original de cada link, ou seja, para a página PHP de exclusão. */
        if(resposta) location.href = this.href;        
    })
   
}




// Fazer aparecer uma caixinha perguntando se realmente desejá excluir o fabicante (pasta visualizar.php) linha 98