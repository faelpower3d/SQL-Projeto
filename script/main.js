function addItens() {
    // Obtém a tabela de itens
    var table = document.getElementById("itensTable");

    // Clona a última linha da tabela
    var newRow = table.rows[0].cloneNode(true);

    // Limpa os valores dos novos campos de entrada
    var selects = newRow.getElementsByClassName("prod");
    for (var i = 0; i < selects.length; i++) {
        selects[i].selectedIndex = 0;
    }

    var inputs = newRow.getElementsByClassName("qtde");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
    }

    // Adiciona a nova linha à tabela
    table.appendChild(newRow);
}

