<?php
    include("../conexaoBanco/loja.php");
    $pesq = $_POST['nome'];
    
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado da pesquisa</title>
</head>
<body>
    <h2><p align="center">CONSULTA DE PACIENTES</h2>
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
            if (empty($pesq)) {
                $sql = "SELECT * FROM cliente ORDER BY nome";
            } elseif (!empty($pesq)) {
                $sql = "SELECT * FROM paciente WHERE nome LIKE '%$pesq%' OR cidade LIKE '%$pesq%' ORDER BY nome";
            }
            $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");
 
        // Obtendo os dados por meio de um loop while
        while ($registro = mysqli_fetch_array($resultado)) {
            $nome = $registro['nome'];
            $cpf = $registro['cpf'];
            $rg = $registro['rg'];
            $endereco = $registro['endereco'];
            $numero = $registro['numero'];
            $cidade = $registro['cidade'];
            $estado = $registro['estado'];
            $bairro = $registro['bairro'];
            $email = $registro['email'];
 
            echo "<tr>";
            echo "<td>".$nome."</td>";
            echo "<td>".$cpf."</td>";
            echo "<td>".$rg."</td>";
            echo "<td>".$endereco."</td>";
            echo "<td>".$numero."</td>";
            echo "<td>".$bairro."</td>";
            echo "<td>".$cidade."</td>";
            echo "<td>".$estado."</td>";
            echo "<td>".$email."</td>";
            echo "</tr>";
        }
        mysqli_close($con);
        echo "</table>";
        ?>
        <br><a href="consulta_paciente.php">Voltar</a><br>
    </body>
</html>