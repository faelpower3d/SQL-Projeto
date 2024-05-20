<html> 
    <head> 
    <meta charset="UTF-8">
    <title>Pedidos</title> 
    </head> 
    <body>         
        <h1>PEDIDOS</h1> 
        <a href="../inclusao/produto.php"><button>NOVO</button></a>              
        <a href="../index.html"><button>VOLTAR</button></a> 
        <form method="POST"> 
        <table border="1" width="100%"> 
        <?php 
            include ('../conexaoBanco/loja.php'); 
            $query="Select data,id_cliente FROM pedidos order by data"; 
            $resu=mysqli_query($con, $query) or die (mysqli_connect_error()); 
            $query2 = "Select * FROM itens_pedido";
            $resu2=mysqli_query($con, $query2) or die (mysqli_connect_error());
            $query3="Select observacao,prazo_entrega,id_vendedor FROM pedidos order by data"; 
            $resu3=mysqli_query($con, $query3) or die (mysqli_connect_error());
            echo "<tr><td><b> DATA";
            echo "<td><b> CLIENTE</td>";
            echo "<td><b> PRODUTO</td>";
            echo "<td><b> QUANTIDADE</td>";
            echo "<td><b> OBSERVAÇÃO</td>";
            echo "<td><b> PRAZO/ENTREGA</td>";
            echo "<td><b> VENDEDOR(A)</td>";            
            while ($reg1 = mysqli_fetch_array($resu)) { 
                echo "<tr><td>".$reg1['data']. "</td>";                 
                echo "<td>".$reg1['id_cliente']. "</td>";
            } 
                while($reg= mysqli_fetch_array($resu2))  {
                    echo "<td>".$reg['id_produto']. "</td>";                 
                    echo "<td>".$reg['qtde']. "</td>";
                }  
                while ($reg = mysqli_fetch_array($resu3)) {                               
                echo "<td>".$reg['observacao']. "</td>";                 
                echo "<td>".$reg['prazo_entrega']. "</td>";                 
                echo "<td>".$reg['id_vendedor']. "</td>";        
            }   
            echo "<td><a href='../edita/cliente.php?id=". $reg1['id']."'>Detalhes</a></td>"; 
            echo "<td><a href='../excluir/cliente.php?id=". $reg1['id']. "'>Excluir </a></td></tr>";
                  
            mysqli_close($con); 
        ?>        
        </table>        
        </form>    
                    
    </body> 
</html>