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
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];        
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $email = $_POST["email"];
        $cpf_cnpj = $_POST["cpf_cnpj"];
        $rg = $_POST["rg"];
        $telefone = $_POST["telefone"];
        $celular = $_POST["celular"];
        $data_nasc = $_POST["data_nasc"];        
        $salario = $_POST["salario"];
        
        $query = "INSERT INTO  clientes(nome,endereco,numero,bairro,cidade,estado,email,cpf_cnpj,rg,telefone,celular,data_nasc,salario)
        VALUES ('$nome','$endereco','$numero',
        '$bairro','$cidade','$estado','$email','$cpf_cnpj','$rg','$telefone','$celular','$data_nasc','$salario')";
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
        <br><label> Endereço: </label>
        <input type="text" size="80" maxlength="100" name="endereco" required>
        <label> Número: </label>
        <input type="number" maxlength="10" name="numero" required>        
        <label> Bairro: </label>
        <input type="text" size="60" maxlength="60" name="bairro" required>
        <label> Cidade: </label>
        <input type="text" size="40" maxlength="80" name="cidade" required>
        <label> Estado: </label>        
        <select name="estado">
            <option value="SP">SP</option>
            <option value="MG">MG</option>
            <option value="PR">PR</option>
            <option value="RJ">RJ</option> </select> 
        <label> e-mail: </label>
        <input type="email" size="40" maxlength="80" name="email" required>  
        <label> CPF/CNPJ :</label>
        <input type="text" size="11" maxlength="11" name="cpf_cnpj" required>     
        <label> RG :</label>
        <input type="text" size="9" maxlength="9" name="rg" required>             
        <label> Telefone: </label>
        <input type="tel" maxlength="14" name="telefone" placeholder="(XX)XXXX-XXXX" required>
        <label> Celular: </label>
        <input type="tel" maxlength="14" name="celular" placeholder="(XX)XXXXX-XXXX" required>  
        <label>Data de nascimento</label>      
        <input type="date" name="data_nasc" required>
        <label> Salario</label>
        <input type="number" min="0" max="50000" name="salario" required>         
        </select>
        <p><input type="submit" value="Enviar"> <input type="reset" value="Limpar">
    </form>
    <a href="../consulta/cliente.php"><button>Voltar</button></a>     
           

    
</body>
</html>