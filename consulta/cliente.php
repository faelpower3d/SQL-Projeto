<html> 
    <head> 
    <meta charset="UTF-8">
    <title>Clientes</title> 
    </head> 
    <body>         
        <h1> CLIENTES</h1> 
        <a href="../inclusao/cliente.php"><button>NOVO</button></a>              
        <a href="../index.html"><button>VOLTAR</button></a>
        <form method="POST">
        <label> Filtro = </label>
        <input type="text" size="80" maxlength="100" name="filt" placeholder="NOME OU CIDADE"  >        
        <input type="submit" name="enviar" value="FILTRAR">
        <input type="reset" name="limpar" value="LIMPAR">
        </form>
        <form method="POST">              
    <table border="1" width="100%">
    <tr>
            <th>NOME</th>
            <th>ENDEREÇO</th>
            <th>N°</th>
            <th>BAIRRO</th>
            <th>CIDADE</th>
            <th>ESTADO</th>             
            <th>E-MAIL</th>
            <th>CPF/CNPJ</th>
            <th>RG</th>
            <th>TELEFONE</th>
            <th>CELULAR</th>
            <th>DATA DE NASCIMENTO</th>
            <th>SALARIO</th>
        </tr>        
        <?php    
        include('../conexaoBanco/loja.php');
        $pesq = isset($_POST['filt']) ? $_POST['filt'] : '';       
            if (empty($pesq)) {
                $sql = "SELECT * FROM clientes ORDER BY nome";
            } else{
                $sql = "SELECT * FROM clientes WHERE nome LIKE '%$pesq%' OR cidade LIKE '%$pesq%' ORDER BY nome";
            }
            $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");
        
        while ($registro = mysqli_fetch_array($resultado)) {
            $nome = $registro['nome'];
            $endereco = $registro['endereco'];
            $numero = $registro['numero'];
            $bairro = $registro['bairro'];            
            $cidade = $registro['cidade'];
            $estado = $registro['estado'];            
            $email = $registro['email'];
            $cpf_cnpj = $registro['cpf_cnpj'];
            $rg = $registro['rg'];
            $telefone = $registro['telefone'];
            $celular = $registro['celular'];
            $data_nasc = $registro['data_nasc'];
            $salario = $registro['salario'];
 
            echo "<tr>";
            echo "<td>".$nome."</td>";
            echo "<td>".$endereco."</td>";
            echo "<td>".$numero."</td>";
            echo "<td>".$bairro."</td>";
            echo "<td>".$cidade."</td>";
            echo "<td>".$estado."</td>";
            echo "<td>".$email."</td>";
            echo "<td>".$cpf_cnpj."</td>";
            echo "<td>".$rg."</td>";            
            echo "<td>".$telefone."</td>";
            echo "<td>".$celular."</td>";
            echo "<td>".$data_nasc."</td>";
            echo "<td>".$salario."</td>";
            echo "<td><a href='../edita/cliente.php?id=". $registro['id']."'>Editar</a></td>"; 
            echo "<td><a href='../excluir/cliente.php?id=". $registro['id']. "'>Excluir </a></td></tr>"; 
            echo "</tr>";
        }
        mysqli_close($con);
        
        ?>
        </table>
           
    </body> 
</html>