<!DOCTYPE html>
<head>
    <meta charset="UTF-8">   
    <title>INCLUSÃO-Vendedor</title>
</head>
<body>
    <p><h1>Vendedor - CADASTRO</h1>
    <?php
    //Verifica se o Formulario foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include ("../conexaoBanco/loja.php");
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];       
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];
        $perc_comissao = $_POST["perc_comissao"];
        
        $query = "INSERT INTO  vendedor(nome,endereco,cidade,estado,celular,email,perc_comissao)
        VALUES ('$nome','$endereco','$cidade','$estado','$celular','$email','$perc_comissao')";
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
        <label> Cidade: </label>
        <input type="text" size="40" maxlength="80" name="cidade" required>
        <label> Estado: </label>        
        <select name="estado">
            <option value="SP">SP</option>
            <option value="MG">MG</option>
            <option value="PR">PR</option>
            <option value="RJ">RJ</option> </select> 
            <label> Celular: </label>
        <input type="tel" maxlength="14" name="celular" placeholder="(XX)XXXXX-XXXX" required>
        <label> e-mail: </label>
        <input type="email" size="40" maxlength="80" name="email" required>  
        <label>percentual de comissao</label>
        <input type="number" size="40" maxlength="80" name="perc_comissao" required>               
        </select>
        <p><input type="submit" value="Enviar"> <input type="reset" value="Limpar">
    </form>
    <a href="../index.html"><button>Voltar</button></a>     
           

    
</body>
</html>