<html> 
    <head> 
    <meta charset="UTF-8">
    <title>PRODUTOS</title> 
    </head> 
    <body> 
        <form method="POST" > 
        <h1> PRODUTOS </h1> 
        <table border="1" width="100%" > 
        <?php 
            include ('../conexaoBanco/loja.php'); 
            $query="Select * FROM produto order by nome"; 
            $resu=mysqli_query($con, $query) or die (mysqli_connect_error()); 
            echo "<tr><td><b> NOME";
            echo "<td><b> QTD ESTOQUE</td>";            
            echo "<td><b> PRECO</td>";
            echo "<td><b> UNID. MEDIDA</td>";
            echo "<td><b> PROMOÇÃO</td>";                  

            while ($reg = mysqli_fetch_array($resu)) { 
                echo "<tr><td>".$reg['nome']. "</td>";                 
                echo "<td>".$reg['qtde_estoque']. "</td>";                                
                echo "><td>".$reg['preco']. "</td>";                 
                echo "<td>".$reg['unidade_medida']. "</td>";  
                echo "<td>".$reg['promocao']. "</td>";                      
                echo "<td><a href='../edita/produto.php?id=". $reg['id']."'>Editar</a></td>"; 
                echo "<td><a href='exclui_funcao.php?id=". $reg['id']. "'>Excluir </a></td></tr>"; 
            }        
        ?>        
        </table>        
        </form>        
        <?php
            mysqli_close($con);        
        ?>     
        <a href="incluid_funcao.php"><button>NOVO </button></a>              
        <a href="../index.html"><button>VOLTAR</button></a>   
    </body> 
</html>