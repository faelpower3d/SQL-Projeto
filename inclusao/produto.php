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
        $nome = $_POST["nome"];
        $qtde_estoque = $_POST["qtde_estoque"];
        $preco = $_POST["preco"];
        $unidade_medida = $_POST["unidade_medida"];   
        $promocao = $_POST["promocao"];            
        $query = "INSERT INTO produto(nome, qtde_estoque, preco, unidade_medida, promocao) 
        VALUES ('$nome', '$qtde_estoque', '$preco', '$unidade_medida', '$promocao')";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        if (mysqli_insert_id($con)) {
            echo "Inclusão realizada com sucesso ! !";
        }else{
            echo "ERRO AO INSERIR OS DADOS : ".mysqli_connect_error();
        }
        mysqli_close($con);        
    }   
    ?>
    <form method="post">
    <label> nome: </label>
        <input type="text" size="60" maxlength="100" name="nome" required>        
    <label> quantidade no estoque: </label>
        <input type="number"  name="qtde_estoque" required>        
    <label> Preço: </label>
        <input type="text" name="preco" step="0.01" maxlength="8" required> 
    <label> Unidade de medida</label>         
    <select name="unidade_medida">
            <option value="PÇ">PÇ</option> 
            <option value="KG">KG</option>            
            <option value="L">L</option>               
            <option value="M">M</option>                  
        </select>    
        <label>Promção :</label>
    <select name="promocao">
            <option value="S">S</option>            
            <option value="N">N</option> </select>                
        </select>
        <p><input type="submit" value="Enviar"> <input type="reset" value="Limpar">
    </form>
    <a href="../consulta/produto.php"><button>Voltar</button></a>     
           

    
</body>
</html>