<html> 
    <head> 
    <meta charset="UTF-8">
    <title>Pedidos</title> 
    </head> 
    <body>         
        <h1>PEDIDOS</h1> 
        <a href="../inclusao/pedido.php"><button>NOVO</button></a>              
        <a href="../index.html"><button>VOLTAR</button></a> 
        <form action="../filtros/cliente.php" method="POST">
        <label> Filtro = </label>
        <input type="text" size="80" maxlength="100" name="data"0 required>
        <a href="../index.html"><button>FILTRAR</button></a> 
        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="limpar" value="Limpar">
        </form>
        <form method="POST">             
        <table border="1" width="100%"> 
        <?php 
            include ('../conexaoBanco/loja.php'); 
            $query="Select * FROM ver_pedidos order by data"; 
            $resu=mysqli_query($con, $query) or die (mysqli_connect_error()); 

            echo "<tr><td><b> Nº PEDIDO";
            echo "<td><b> DATA</td>";
            echo "<td><b> CLIENTE</td>";
            echo "<td><b> PRODUTO</td>";
            echo "<td><b> QUANTIDADE</td>";
            echo "<td><b> FORMA PAGAMENTO</td>";
            echo "<td><b> PRAZO/ENTREGA</td>";
            echo "<td><b> VENDEDOR(A)</td>"; 
            echo "<td><b> OBSERVAÇÃO</td>";           
            while ($reg = mysqli_fetch_array($resu)) { 
                echo "<tr><td>".$reg['id']. "</td>";                 
                echo "<td>".$reg['data']. "</td>";                 
                echo "<td>".$reg['clientes']. "</td>";            
                echo "<td>".$reg['produto']. "</td>";                 
                echo "<td>".$reg['quantidade']. "</td>";
                echo "<td>".$reg['forma_pagamento']. "</td>";                 
                echo "<td>".$reg['prazo_entrega']. "</td>";                 
                echo "<td>".$reg['vendedor']. "</td>";
                echo "<td>".$reg['observacao']. "</td>";                
                echo "<td><a href='../excluir/pedido.php?id=". $reg['id']. "'>Excluir </a></td></tr>";

            }   
            
                  
            mysqli_close($con); 
        ?>        
        </table>        
        </form>   
    </body> 
</html>