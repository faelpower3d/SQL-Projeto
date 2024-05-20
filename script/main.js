function addIten(){
    var divProduto=document.getElementById("itens");
    var input =document.createElement("input");
    input.type="number";
    input.name="qtd";
    input.placeholder="(XX) XXXX-XXXX";
    divProduto.appendChild(input);            
}
function addIten(){
    var divTel =document.getElementById("telefones");
    var input =document.createElement("input");
    input.type="tel";
    input.name="telefones[]";
    input.placeholder="(XX) XXXX-XXXX";
    divTel.appendChild(input);            
}