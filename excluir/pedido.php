<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>Pedido</title> 
</head> 
<body> 
<h1>Exclusão</h1> 
<?php 

if (isset($_GET['id'])) { 
include('../conexaoBanco/loja.php'); 
$id = $_GET['id'];
 

$query = "SELECT * FROM ver_pedidos WHERE id = $id"; 
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
 

if ($row) { 

    echo "<p>Confirma a exclusão?</p>";
    echo "<p>ID:".$row['id']."</p>";        
    echo "<p>Vendedor: " .$row['vendedor']."</p>"; 
    echo "<p>Cliente: " .$row['clientes']."</p>";     
    echo "<form method='POST'>"; 
    echo "<input type='hidden' name='id' value='" .$row['id'] . "'>";
    echo "<input type='submit' name='confirmar' value='Sim'>"; 
    echo "<input type='submit' name='cancelar' value='Não'>"; 
    echo "</form>"; 
    }else {
        echo "Forma de pagamento não encontrada."; 
    } 
 
    mysqli_close($con);
    }else {
        echo "ID da Forma de pagamento não especificado."; 
    }
?>
 
<?php
 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) { 
    include('../conexaoBanco/loja.php');


    $id = $_POST["id"]; 

$query = "DELETE FROM produto WHERE id = $id"; 
$result = mysqli_query($con, $query);
$query1 = "DELETE FROM itens_pedido WHERE id_pedido = $id";
$result2 = mysqli_query($con, $query1);


    mysqli_close($con);
     
    header("Location: ../consulta/pedido.php");
     
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {     
    
        header("Location: ../consulta/pedido.php");
        exit;     
    }     
    ?>
     
</body>
     
</html>