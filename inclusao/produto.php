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
        $nome = $_POST["nome"];        
        $qtde_estoque = $_POST["qtde_estoq"];
        $preco = $_POST["preco"];
        $unidade_medida = $_POST["unidade_medida"];
        $promocao = $_POST["promocao"];       
        
        $query = "INSERT INTO  clientes(nome,qtde_estoque,preco,unidade_medida,promocao)
        VALUES ('$nome','$qtde_estoque','$preco','$unidade_medida','$promocao')";
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
    <label> Nome: </label>
        <input type="text" size="80" maxlength="100" name="nome" required>        
    <label> quantidade no estoque: </label>
        <input type="text" size="80" maxlength="100" name="nome" required>        
    <label> Preço: </label>
        <input type="text" size="80" maxlength="100" name="nome" required>        
    <label> Unidade de Medida: </label>
        <input type="text" size="80" maxlength="100" name="nome" required>       
    
    <select name="Promoção">
            <option value="S">S</option>            
            <option value="N">N</option> </select>                
        </select>
        <p><input type="submit" value="Enviar"> <input type="reset" value="Limpar">
    </form>
    <a href="../index.html"><button>Voltar</button></a>     
           

    
</body>
</html>