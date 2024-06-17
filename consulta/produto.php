<html> 
    <head> 
    <meta charset="UTF-8">
    <title>PRODUTOS</title> 
    </head> 
    <body> 
        
        <h1> PRODUTOS </h1> 
        <a href="../inclusao/produto.php"><button>NOVO </button></a>              
        <a href="../index.html"><button>VOLTAR</button></a>
        <form method="POST">
        <label> Filtro = </label>
        <input type="text" size="80" maxlength="100" name="filt" placeholder="NOME DO PRODUTO">        
        <input type="submit" name="enviar" value="FILTRAR">
        <input type="reset" name="limpar" value="LIMPAR">
        </form>
        <form method="POST" >  
        <table border="1" width="100%" > 
        <tr>
            <th>PRODUTOS</th>
            <th>ESTOQUE</th>            
            <th>UNID. MEDIDA</th>
            <th>PROMOÇÃO</th>
            <th>PREÇO</th>
        </tr>
        <?php 
        include ('../conexaoBanco/loja.php'); 
        $pesq = isset($_POST['filt']) ? $_POST['filt'] : '';       
                if (empty($pesq)) {
                    $sql = "SELECT * FROM produto ORDER BY nome";
                } else{
                    $sql = "SELECT * FROM produto WHERE nome LIKE '%$pesq%'";
                }
                $resu = mysqli_query($con, $sql) or die("Erro ao retornar dados");                            

            while ($reg = mysqli_fetch_array($resu)) {
                $nome = $reg["nome"];
                $qtde_estoque = $reg["qtde_estoque"];                
                $unidade_medida = $reg["unidade_medida"];
                $promocao = $reg["promocao"];
                $preco = $reg["preco"];
            
                echo "<tr>";
                echo "<td>".$nome."</td>";
                echo "<td>".$qtde_estoque."</td>";
                echo "<td>".$unidade_medida."</td>";
                echo "<td>".$promocao."</td>";     
                echo "<td>".$preco."</td>";             
                echo "<td><a href='../edita/produto.php?id=". $reg['id']."'>Editar</a></td>"; 
                echo "<td><a href='../excluir/produto.php?id=". $reg['id']. "'>Excluir </a></td></tr>";
                }    
                mysqli_close($con);    
        ?>        
        </table>        
        </form>     
         
    </body> 
</html>