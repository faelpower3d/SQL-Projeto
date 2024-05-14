<?php 
session_start();
include_once("../conexaoBanco/loja.php");
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
    $result = "SELECT * FROM produto WHERE id = '$id'";  
    $resultado = mysqli_query($con, $result); 
    $row = mysqli_fetch_assoc($resultado); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $qtde_estoque = $_POST["qtde_estoque"];
    $preco = $_POST["preco"];
    $unidade_medida = $_POST["unidade_medida"];
    $promocao = $_POST["promocao"];    

    $result= "UPDATE produto SET nome='$nome', qtde_estoque='$qtde_estoque', preco='$preco', 
    unidade_medida='$unidade_medida', promocao='$promocao' WHERE id='$id'";

    $resultado= mysqli_query($con, $result) or die (mysqli_connect_error());

    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color:green;'>Cliente alterado com sucesso</p>";
        header("Location: produto.php?id=$id"); 
        exit();
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Cliente não foi alterado, verifique</p>";
        header("Location: produto.php?id=$id"); 
        exit();
    } 
}
mysqli_close($con); 
?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
<meta charset="utf-8"> 
<title>Editar Produto</title> 
</head> 
<body> 
<h1>Editar Produto</h1> 

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
    

<tr> 
<td> qtde_estoque: </td><td><input type="number" name="qtde_estoque" size="100" value="<?php echo $row['qtde_estoque'];?>"></td>

<td> Preço: </td><td><input type="number" name="preco" value="<?php echo $row['preco'];?>"></td> 

<label> Unid Medida: </label> <input type="text" name="unidade_medida" size="30" value="<?php echo $row['unidade_medida']; ?>">

<td> Promoção: </td><td>
<select name="promocao" > 
<option value="<?php echo $row['promocao'];?>"><?php echo $row['promocao'];?></option> 
<option value="S"> S </option>
<option value="N"> N </option> 

</select> 
</td> 
</tr> 

<p><input type="submit" value="Salvar">
</form>

<p><a href="../consulta/produto.php"><button>Voltar</button></a>
</body> 
</html>
