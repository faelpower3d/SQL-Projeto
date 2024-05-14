<!DOCTYPE html>
<head>
    <meta charset="UTF-8">   
    <title>INCLUSÃO-Forma Pagamento</title>
</head>
<body>
    <p><h1>CADASTRO</h1>
    <?php
    //Verifica se o Formulario foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include ("../conexaoBanco/loja.php");
        $descricao = $_POST["descricao"];        
        $query = "INSERT INTO  forma_pagto(descricao)
        VALUES ('$descricao')";
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
    <label> Forma de pagamento: </label>
        <input type="text" size="80" maxlength="100" name="descricao" required>          
        </select>
        <p><input type="submit" value="Enviar"> <input type="reset" value="Limpar">
    </form>
    <a href="../consulta/pagamento.php"><button>Voltar</button></a>     
           

    
</body>
</html>