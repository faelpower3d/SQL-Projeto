<?php 
session_start();
include_once("../conexaoBanco/loja.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
    $result = "SELECT * FROM forma_pagto WHERE id = '$id'";  
    $resultado = mysqli_query($con, $result); 
    $row = mysqli_fetch_assoc($resultado); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $descricao = $_POST["descricao"];
    
    $result= "UPDATE forma_pagto SET descricao='$descricao'  WHERE id='$id'";

    $resultado= mysqli_query($con, $result) or die (mysqli_connect_error());

    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color:green;'>Cliente alterado com sucesso</p>";
        header("Location: pagamento.php?id=$id"); 
        exit();
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Cliente não foi alterado, verifique</p>";
        header("Location: pagamento.php?id=$id"); 
        exit();
    } 
}
mysqli_close($con); 
?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
<meta charset="utf-8"> 
<title>Editar Forma pagamento</title> 
</head> 
<body> 
<h1>Editar Forma de Pagamento</h1> 

<?php 
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg']; 
        unset ($_SESSION['msg']);
    }  
?> 
 
<form method="POST">     
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <p><label>Descrição: </label>
    <input type="text" name="descricao" size="100" value="<?php echo $row['descricao']; ?>">     

<p><input type="submit" value="Salvar">
</form>

<p><a href="../consulta/pagamento.php"><button>Voltar</button></a>
</body> 
</html>
