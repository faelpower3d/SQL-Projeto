<?php 
session_start();
include_once("../conexaoBanco/loja.php");

// Verifica se o ID foi passado na URL
if(isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
    $result = "SELECT * FROM clientes WHERE id = '$id'";  
    $resultado = mysqli_query($con, $result); 
    $row = mysqli_fetch_assoc($resultado); 
} else {
    $_SESSION['msg'] = "<p style='color:red;'>ID do cliente não foi fornecido.</p>";
    header("Location: cliente.php");
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];        
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $email = $_POST["email"];
    $cpf_cnpj = $_POST["cpf_cnpj"];
    $rg = $_POST["rg"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $data_nasc = $_POST["data_nasc"];        
    $salario = $_POST["salario"];

    $result= "UPDATE clientes SET nome='$nome', endereco='$endereco', numero='$numero',
    bairro='$bairro', cidade='$cidade', estado='$estado', cpf_cnpj='$cpf_cnpj',
    rg='$rg', telefone='$telefone', celular='$celular', email='$email',
    data_nasc='$data_nasc', salario='$salario' WHERE id='$id'";

    $resultado= mysqli_query($con, $result) or die (mysqli_connect_error());

    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color:green;'>Cliente alterado com sucesso</p>";
        header("Location: cliente.php"); 
        exit();
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Cliente não foi alterado, verifique</p>";
        header("Location: cliente.php"); 
        exit();
    } 
}
mysqli_close($con); 
?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
<meta charset="utf-8"> 
<title>Editar Cliente</title> 
</head> 
<body> 
<h1>Editar Cliente</h1> 

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
<td> Número: </td><td><input type="number" name="numero" value="<?php echo $row['numero'];?>"></td>
</tr> 
<tr> 
<td> Bairro: </td><td><input type="text" name="bairro" value="<?php echo $row['bairro'];?>"></td> 

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

<label> e-mail: </label><input type="email" name="email" value="<?php echo $row['email']; ?>">

<label> CPF/CNPJ: </label><input type="text" name="cpf_cnpj" size="30" value="<?php echo $row['cpf_cnpj']; ?>">

<label> RG: </label><input type="text" name="rg" size="30" value="<?php echo $row['rg']; ?>">

<label> telefone: </label><input type="number" name="telefone" size="30" value="<?php echo $row['telefone']; ?>">

<label> Celular: </label> <input type="number" name="celular" size="30" value="<?php echo $row['celular']; ?>">

<label>Data de nascimento</label>  <input type="date" name="data_nasc" value="<?php echo $row['data_nasc'];?>">    

<label> Salario</label>    <input type="number" min="0" max="50000" name="salario" value="<?php echo $row['salario'];?>">   

<p><input type="submit" value="Salvar">
</form>

<p><a href="../consulta/cliente.php"><button>Voltar</button></a>
</body> 
</html>
