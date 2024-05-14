<!DOCTYPE html>
<head>
    <meta charset="UTF-8">   
    <title>INCLUSÃO-Produto</title>
</head>
<body>
    <p><h1>PRODUTO - CADASTRO</h1>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include ("../conexaoBanco/loja.php");
        $data = $_POST["data"];        
        $id_cliente = $_POST["id_cliente"];
        $observacao = $_POST["observacao"];
        $forma_pagto = $_POST["forma_pagto"];
        $prazo_entrega = $_POST["prazo_entrega"];   
        $id_vendedor = $_POST["id_vendedor"];    
        
        $query = "INSERT INTO venda ('data', id_cliente, observacao, forma_pagto, prazo_entrega, id_vendedor)
        VALUES ('$data', '$id_cliente', '$observacao', '$forma_pagto', '$prazo_entrega', '$id_vendedor')";
        $result = mysqli_query($con, $query);
        if (mysqli_insert_id($con)) {
            echo "Inclusão realizada com sucesso ! !";
        }else{
            echo "ERRO AO INSERIR OS DADOS : ".mysqli_connect_error();
        }
        mysqli_close($con);        
    }   
    ?>
    <form method="post">
    <label> data: </label>
        <input type="date" size="80" maxlength="100" name="nome" required>        
    <label> quantidade no estoque: </label>
        <input type="number"  name="qtde_estoque" required>        
    <label> Preço: </label>
        <input type="number" name="preco" required> 
    <label> Unidade de medida</label>         
    <select name="unidade_medida">
            <option value="PÇ">PÇ</option> 
            <option value="KG">KG</option>            
            <option value="L">L</option>               
            <option value="M">M</option>                  
        </select>    
        <label>Promção</label>
    <select name="promocao">
            <option value="S">S</option>            
            <option value="N">N</option> </select>                
        </select>
        <p><input type="submit" value="Enviar"> <input type="reset" value="Limpar">
    </form>
    <a href="../consulta/produto.php"><button>Voltar</button></a>     
           

    
</body>
</html>