<html> 
    <head> 
    <meta charset="UTF-8">
    <title>Forma Pagamento</title> 
    </head> 
    <body> 
        <form method="POST" > 
        <h1> Forma Pagamento</h1> 
        <table border="1" width="100%" > 
        <?php 
            include ('../conexaoBanco/loja.php'); 
            $query="Select * FROM forma_pagto order by descricao"; 
            $resu=mysqli_query($con, $query) or die (mysqli_connect_error()); 
            echo "<tr><td><b> ID";
            echo "<td><b> DESCRIÇÃO</td>";          

            while ($reg = mysqli_fetch_array($resu)) { 
                echo "<tr><td>".$reg['id']. "</td>";                 
                echo "<td>".$reg['descricao']. "</td>";                       
                echo "<td><a href='../edita/pagamento.php?id=". $reg['id']."'>Editar</a></td>"; 
                echo "<td><a href='../excluir/pagamento.php?id=". $reg['id']. "'>Excluir </a></td></tr>"; 
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