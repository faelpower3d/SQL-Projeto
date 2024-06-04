<html> 
    <head> 
    <meta charset="UTF-8">
    <title>Pedidos</title> 
    </head> 
    <body>         
        <h1>PEDIDOS</h1> 
        <a href="../inclusao/pedido.php"><button>NOVO</button></a>              
        <a href="../index.html"><button>VOLTAR</button></a> 
        <form method="POST" action="../relatorio/pedido.php">
        <label> Filtro </label>
        <input type="date" size="80" maxlength="100" name="data1"
        value="<?php echo isset($_POST['data1']) ? htmlspecialchars($_POST['data1']) : ''; ?>"><span>a</span>
        <input type="date" size="80" maxlength="100" name="data2"
        value="<?php echo isset($_POST['data2']) ? htmlspecialchars($_POST['data2']) : ''; ?>">             
        <input type="submit" name="enviar" value="GERAR PDF">
        
        </form>
        
      
       
        <form method="POST" action="../filtro/pedido.php" >
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
                <td>PRODUTO</td>
                <td>QUANTIDADE</td>
                <td>FORMA PAGAMENTO</td>
                <td>PRAZO/ENTREGA</td>
                <td>VENDEDOR(A)</td>
                <td>OBSERVAÇÃO</td>
            </tr>
        <?php
            include ('../conexaoBanco/loja.php'); 
            $pesq1 = isset($_POST['data1']) ? $_POST['data1']: '';
            $pesq2 = isset($_POST['data2']) ? $_POST['data2']: ''; 
                if (empty($pesq1) && empty($pesq2) ) {
                    $sql = "SELECT * FROM ver_pedidos ORDER BY data";
                }elseif (!empty($pesq1) &&(empty($pesq2))){
                    $sql = "SELECT * FROM ver_pedidos WHERE data >= '$pesq1' ORDER BY data";
                
                }elseif (empty($pesq1) &&(!empty($pesq2))){
                    $sql = "SELECT * FROM ver_pedidos WHERE data <= '$pesq2' ORDER BY data";
                }else{
                    $sql = "SELECT * FROM ver_pedidos WHERE data BETWEEN '$pesq1' AND '$pesq2' ORDER BY data";
                }           
                $resu=mysqli_query($con, $sql) or die ("Erro ao retornar dados"); 
                      
            while ($reg = mysqli_fetch_array($resu)) { 
                $id=$reg['id'];                 
                $data=date('d-m-Y', strtotime($reg['data']));                 
                $clientes=$reg['clientes'];            
                $produto=$reg['produto'];                 
                $quantidade=$reg['quantidade'];
                $forma_pagamento=$reg['forma_pagamento'];                 
                $prazo_entrega=date('d-m-Y', strtotime($reg['prazo_entrega']));                 
                $vendedor=$reg['vendedor'];
                $observacao=$reg['observacao'];  
                
                echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$data."</td>";
            echo "<td>".$clientes."</td>";
            echo "<td>".$produto."</td>";
            echo "<td>".$quantidade."</td>";
            echo "<td>".$forma_pagamento."</td>";
            echo "<td>".$prazo_entrega."</td>";
            echo "<td>".$vendedor."</td>";
            echo "<td>".$observacao."</td>";
            echo "<td><a href='../excluir/pedido.php?id=". $reg['id']. "'>Excluir </a></td></tr>";
            echo "</tr>";

                

            }   
            
                  
            mysqli_close($con); 
        ?>        
        </table>        
        </form>   
    </body> 
</html>