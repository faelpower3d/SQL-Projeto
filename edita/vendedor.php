<?php 
session_start();
include_once("../conexaoBanco/loja.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
    $result = "SELECT * FROM vendedor WHERE id = '$id'";  
    $resultado = mysqli_query($con, $result); 
    $row = mysqli_fetch_assoc($resultado); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $perc_comissao = $_POST["perc_comissao"];  

    $result= "UPDATE vendedor SET nome='$nome', endereco='$endereco', cidade='$cidade', 
    estado='$estado', celular='$celular', email='$email', perc_comissao='$perc_comissao' WHERE id='$id'";

    $resultado= mysqli_query($con, $result) or die (mysqli_connect_error());

    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color:green;'>Cliente alterado com sucesso</p>";
        header("Location: vendedor.php?id=$id"); 
        exit();
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Cliente não foi alterado, verifique</p>";
        header("Location: vendedor.php?id=$id"); 
        exit();
    } 
}
mysqli_close($con); 
?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
<meta charset="utf-8"> 
<title>Editar Vendedor</title> 
</head> 
<body> 
<h1>Editar Vendedor</h1> 

<?php 
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg']; 
        unset ($_SESSION['msg']);
    }  
?> 
 
<form method="POST" action="">     
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <p><label>Nome: </label>
    <input type="text" name="nome" size="100" value="<?php echo $row['nome']; ?>"> 
    
<fieldset><legend> Endereço </legend> 
<table width="80%"> 
<tr> 
<td> Endereço: </td><td><input type="text" name="endereco" size="100" value="<?php echo $row['endereco'];?>"></td>

<td> Cidade: </td><td><input type="text" name="cidade" value="<?php echo $row['cidade'];?>"></td> 

<td> Estado: </td><td>
<select name="estado" > 
<option value="<?php echo $row['estado'];?>"><?php echo $row['estado'];?></option> 
<option value="SP"> SP </option>
<option value="BA"> BA </option> 
<option value="RJ"> RJ </option> 
<option value="MG"> MG </option> 
<option value="PR"> PR </option> 
</select> 
</td> 
</tr> 
</table> 
</fieldset> 

<label> Celular: </label> <input type="number" name="celular" size="30" value="<?php echo $row['celular']; ?>">

<label> e-mail: </label><input type="email" name="email" value="<?php echo $row['email']; ?>">

<label> Percentual de comissão : </label><input type="text" name="perc_comissao" size="30" value="<?php echo $row['perc_comissao']; ?>">

 

<p><input type="submit" value="Salvar">
</form>

<p><a href="../consulta/vendedor.php"><button>Voltar</button></a>
</body> 
</html>
