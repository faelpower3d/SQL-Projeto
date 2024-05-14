<!DOCTYPE html>
<head>
    <meta charset="UTF-8">   
    <title>INCLUSÃO-Cliente</title>
</head>
<body>
    <p><h1>CLIENTE - CADASTRO</h1>
    <?php
    //Verifica se o Formulario foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include ("../conexaoBanco/loja.php");
        $data = $_POST["data"];
        $id_cliente = $_POST["id_cliente"];
        $observacao = $_POST["observacao"];        
        $forma_pagto = $_POST["forma_pagto"];
        $prazo_entrega = $_POST["prazo_entrega"];
        $id_vendedor = $_POST["id_vendedor"];        
        
        $query = "INSERT INTO pedidos ('data', id_cliente, observacao, forma_pagto, prazo_entrega, id_vendedor) 
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
        <input type="date" size="80" maxlength="100" name="data" required> 
        <label> cliente: </label> 
        <select name="id_cliente">
        <?php
        include ("../conexaoBanco/loja.php");
        $query = 'SELECT * FROM clientes ORDER BY nome;';
        $resu = mysqli_query($con, $query) or die (mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
        ?>
        
         <option value="<?php echo $reg ['id'];?>"> <?php echo $reg ['nome'];?>
        </option>         
        <?php
        }
        mysqli_close($con);
        ?>
        </select>      
        <br><label> Observação: </label>
        <input type="text" size="80" maxlength="100" name="observacao" required>
        <label>Forma de pagamento</label>
        <select name="forma_pagto" >
        <?php
        include ("../conexaoBanco/loja.php");
        $query = 'SELECT * FROM forma_pagto ORDER BY descricao;';
        $resu = mysqli_query($con, $query) or die (mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
        ?>
         <option value="<?php echo $reg ['id'];?>"> <?php echo $reg ['descricao'];?>
        </option>         
        <?php
        }
        mysqli_close($con);
        ?>
        </select>  

        


        <label> prazo de prazo_entrega: </label>
        <input type="date" maxlength="10" name="prazo_entrega" required>          
        
        </select>
        <label> Vendedor (a): </label>       
        <select name="vendedor">
        <?php
        include ("../conexaoBanco/loja.php");
        $query = 'SELECT * FROM vendedor ORDER BY nome;';
        $resu = mysqli_query($con, $query) or die (mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
        ?>
         <option value="<?php echo $reg ['id'];?>"> <?php echo $reg ['nome'];?>
        </option>         
        <?php
        }
        mysqli_close($con);
        ?>       
        <br><input type="submit" value="Enviar"> <input type="reset" value="Limpar">
    </form>
    <a href="../index.html"><button>Voltar</button></a>  
</body>
</html>