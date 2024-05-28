<html> 
    <head> 
    <meta charset="UTF-8">
    <title>Clientes</title> 
    </head> 
    <body>         
        <h1> CLIENTES</h1> 
        <a href="../inclusao/cliente.php"><button>NOVO</button></a>              
        <a href="../index.html"><button>VOLTAR</button></a>
        <form action="../filtros/cliente.php" method="POST">
        <label> Filtro = </label>
        <input type="text" size="80" maxlength="100" name="data" placeholder="NOME OU CIDADE" required>        
        <input type="submit" name="enviar" value="FILTRAR">
        <input type="reset" name="limpar" value="LIMPAR">
        </form>
        <form method="POST"> 
        <table border="1" width="100%"> 
        <?php 
            include ('../conexaoBanco/loja.php'); 
            $query="Select * FROM clientes order by nome"; 
            $resu=mysqli_query($con, $query) or die (mysqli_connect_error()); 
            echo "<tr><td><b> NOME";
            echo "<td><b> ENDEREÇO</td>";
            echo "<td><b> N°</td>";
            echo "<td><b> BAIRRO</td>";
            echo "<td><b> CIDADE</td>";
            echo "<td><b> ESTADO</td>";
            echo "<td><b> EMAIL</td>";
            echo "<td><b> CPF/CNPJ</td>";
            echo "<td><b> RG</td>";
            echo "<td><b> TELEFONE</td>";
            echo "<td><b> CELULAR</td>";
            echo "<td><b> DATA DE NASCIMENTO</td>";
            echo "<td><b> SALARIO</td></tr>";
            while ($reg = mysqli_fetch_array($resu)) { 
                echo "<tr><td>".$reg['nome']. "</td>";                 
                echo "<td>".$reg['endereco']. "</td>";                 
                echo "<td>".$reg['numero']. "</td>";                 
                echo "<td>".$reg['bairro']. "</td>";                 
                echo "<td>".$reg['cidade']. "</td>";                 
                echo "<td>".$reg['estado']. "</td>";                 
                echo "<td>".$reg['email']. "</td>";                 
                echo "<td>".$reg['cpf_cnpj']. "</td>";                 
                echo "<td>".$reg['rg']. "</td>";                 
                echo "<td>".$reg['telefone']. "</td>";                 
                echo "<td>".$reg['celular']. "</td>";                 
                echo "<td>".$reg['data_nasc']. "</td>";                 
                echo "<td>".$reg['salario']. "</td>";                 
                echo "<td><a href='../edita/cliente.php?id=". $reg['id']."'>Editar</a></td>"; 
                echo "<td><a href='../excluir/cliente.php?id=". $reg['id']. "'>Excluir </a></td></tr>"; 
            }  
            
            mysqli_close($con); 
        ?>        
        </table>        
        </form>    
                    
    </body> 
</html>