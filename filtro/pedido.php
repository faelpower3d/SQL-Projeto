<html> 
    <head> 
    <meta charset="UTF-8">
    <title>Pedidos</title> 
    </head> 
    <body>         
        <h1>PEDIDOS</h1> 
        <a href="../inclusao/pedido.php"><button>NOVO</button></a>              
        <a href="../index.html"><button>VOLTAR</button></a> 
        <form method="POST">
        <label> Filtro </label>         
        <input type="text" size="80" maxlength="100" name="data" placeholder="Cliente">      
        <input type="submit" name="enviar" value="Filtrar">
        <input type="reset" name="limpar" value="Limpar">
        </form>
        <form method="POST">             
        <table border="1" width="100%"> 
            <tr>
                <td>Nº PEDIDO</td>
                <td>DATA</td>
                <td>CLIENTE</td>
                <td>VENDEDOR(A)</td>
                <td>PRODUTO</td>
                <td>PREÇO R$ </td>
                <td>QUANTIDADE</td>                
            </tr>
        <?php
            include ('../conexaoBanco/loja.php'); 
            $pesq = isset($_POST['data']) ? $_POST['data']: '';            
                if (empty($pesq)) {
                    $sql = "SELECT * FROM dtl_cliente ORDER BY data";
                }else{
                    $sql = "SELECT * FROM dtl_cliente WHERE clientes like '%$pesq%' ORDER BY data";
                }           
                $resu=mysqli_query($con, $sql) or die ("Erro ao retornar dados"); 
                      
            while ($reg = mysqli_fetch_array($resu)) { 
                $id=$reg['id'];                 
                $data=date('d-m-Y', strtotime($reg['data']));                 
                $clientes=$reg['clientes'];     
                $vendedor=$reg['vendedor'];       
                $produto=$reg['produto'];                 
                $preco_produto=$reg['preco_produto'];                 
                $quantidade=$reg['quantidade'];                
                
                echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$data."</td>";
            echo "<td>".$clientes."</td>";
            echo "<td>".$vendedor."</td>";
            echo "<td>".$produto."</td>";
            echo "<td>".$preco_produto."</td>";            
            echo "<td>".$quantidade."</td>";            
            echo "<td><a href='../excluir/pedido.php?id=". $reg['id']. "'>Excluir </a></td></tr>";
            echo "</tr>";
            }      
                  
            mysqli_close($con); 
        ?>        
        </table>        
        </form>   
    </body> 
</html>