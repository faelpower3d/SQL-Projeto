<html> 
    <head> 
    <meta charset="UTF-8">
    <title>Vendedor</title> 
    </head> 
    <body> 
        <form method="POST" > 
        <p><center><h1> VENDEDORES </center></h1> 
        <table border="1" width="100%" > 
        <?php 
            include ('../conexaoBanco/loja.php'); 
            $query="Select * FROM vendedor order by nome"; 
            $resu=mysqli_query($con, $query) or die (mysqli_connect_error()); 
            echo "<tr><td><b> NOME";
            echo "<td><b> ENDEREÇO</td>";            
            echo "<td><b> CIDADE</td>";
            echo "<td><b> ESTADO</td>";
            echo "<td><b> CELULAR</td>";
            echo "<td><b> EMAIL</td>";            
            echo "<td><b> PERCENTUAL DE COMISSAO</td>";       

            while ($reg = mysqli_fetch_array($resu)) { 
                echo "<tr><td>".$reg['nome']. "</td>";                 
                echo "<td>".$reg['endereco']. "</td>";                                
                echo "><td>".$reg['cidade']. "</td>";                 
                echo "<td>".$reg['estado']. "</td>";  
                echo "<td>".$reg['celular']. "</td>";                
                echo "<td>".$reg['email']. "</td>";        
                echo "<td>".$reg['perc_comissao']. "</td>";        
                echo "<td><a href='edit_funcao.php?id=". $reg['id']."'>Editar</a></td>"; 
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