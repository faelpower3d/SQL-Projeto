<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>Cliente</title> 
</head> 
<body> 
<h1>Exclusão</h1> 
<?php 

if (isset($_GET['id'])) { 
include('../conexaoBanco/loja.php'); 
$id = $_GET['id'];
 

$query = "SELECT * FROM clientes WHERE id = $id"; 
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
 

if ($row) { 

    echo "<p>ID:".$row['id']."</p>";    
    echo "<p>Cliente: " .$row['nome']."</p>";     
    echo "<p>Confirma a exclusão?</p>"; 
    echo "<form method='POST'>"; 
    echo "<input type='hidden' name='id' value='" .$row['id'] . "'>";
    echo "<input type='submit' name='confirmar' value='Sim'>"; 
    echo "<input type='submit' name='cancelar' value='Não'>"; 
    echo "</form>"; 
    }else {
        echo "Cliente não encontrada."; 
    } 
 
    mysqli_close($con);
    }else {
        echo "Cliente não especificado."; 
    }
?>
 
<?php
 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) { 
    include('../conexaoBanco/loja.php');


    $id = $_POST["id"]; 

$query = "DELETE FROM clientes WHERE id = $id"; 


$result = mysqli_query($con, $query);


    mysqli_close($con);
     
    header("Location: ../consulta/cliente.php");
     
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {     
    
        header("Location: ../consulta/cliente.php");
        exit;     
    }     
    ?>
     
</body>
     
</html>