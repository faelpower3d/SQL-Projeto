function addItens() {
    
    var table = document.getElementById("itensTable");

    
    var newRow = table.rows[0].cloneNode(true);

    
    var selects = newRow.getElementsByClassName("prod");
    for (var i = 0; i < selects.length; i++) {
        selects[i].selectedIndex = 0;
    }

    var inputs = newRow.getElementsByClassName("qtde");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].value = "";
    }

  
    table.appendChild(newRow);
}

