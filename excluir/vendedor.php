<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>Vendedor</title> 
</head> 
<body> 
<h1>Exclusão</h1> 
<?php 

if (isset($_GET['id'])) { 
include('../conexaoBanco/loja.php'); 
$id = $_GET['id'];
 

$query = "SELECT * FROM vendedor WHERE id = $id"; 
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
 

if ($row) { 

    echo "<p>ID:".$row['id']."</p>";    
    echo "<p>Vendedor (a): " .$row['nome']."</p>";     
    echo "<p>Confirma a exclusão?</p>"; 
    echo "<form method='POST'>"; 
    echo "<input type='hidden' name='id' value='" .$row['id'] . "'>";
    echo "<input type='submit' name='confirmar' value='Sim'>"; 
    echo "<input type='submit' name='cancelar' value='Não'>"; 
    echo "</form>"; 
    }else {
        echo "Vendedor não encontrada."; 
    } 
 
    mysqli_close($con);
    }else {
        echo "Vendedor não especificado."; 
    }
?>
 
<?php
 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) { 
    include('../conexaoBanco/loja.php');


    $id = $_POST["id"]; 

$query = "DELETE FROM vendedor WHERE id = $id"; 


$result = mysqli_query($con, $query);


    mysqli_close($con);
     
    header("Location: ../consulta/vendedor.php");
     
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {     
    
        header("Location: ../consulta/vendedor.php");
        exit;     
    }     
    ?>
     
</body>
     
</html>