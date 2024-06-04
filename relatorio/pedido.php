
<?php
include_once("../conexaoBanco/loja.php");
$pesq1 = isset($_POST['data1']) ? $_POST['data1']: '';
            $pesq2 = isset($_POST['data2']) ? $_POST['data2']: ''; 
                if (empty($pesq1) && empty($pesq2) ) {
                    $sql = "SELECT * FROM ver_pedidos ORDER BY data";
                }elseif (!empty($pesq1) &&(empty($pesq2))){
                    $sql = "SELECT * FROM ver_pedidos WHERE data >= '$pesq1' ORDER BY data";
                
                }elseif (empty($pesq1) &&(!empty($pesq2))){
                    $sql = "SELECT * FROM ver_pedidos WHERE data <= '$pesq2' ORDER BY data";
                }else{
                    $sql = "SELECT * FROM ver_pedidos WHERE data BETWEEN '$pesq1' AND '$pesq2' ORDER BY data";
                }           
                $resu=mysqli_query($con, $sql) or die ("Erro ao retornar dados"); 

$linha ="";
while ($registro = mysqli_fetch_array($resu)){
    $linha.="<tr><td>".date('d-m-Y', strtotime($registro['data']))."</td><td>".$registro['clientes']."</td><td>";
    $linha.=$registro['produto']."</td><td>".$registro['quantidade']."</td><td>";
    $linha.=$registro['forma_pagamento']."</td><td>";
    $linha.=date('d-m-Y', strtotime($registro['prazo_entrega']))."</td><td>";
    $linha.=$registro['vendedor']."</td>";
    $linha.="<td>".$registro['observacao']."</td><td><br>";
}

use Dompdf\Dompdf;

require_once("../dompdf/autoload.inc.php");

$dompdf = new DOMPDF();

$dompdf->load_html('
        <h1>RELATORIO DE PEDIDOS </h1>
        <hr>
        <table width="100%">
        <tr>
        <td>DATA</td>
        <td>CLIENTES</td>
        <td>PRODUTOS</td>
        <td>QUANTIDADES</td>
        <td>FORMA PAGAMENTO</td>
        <td>PRAZO ENTREGA</td>
        <td>VENDEDOR</td>
        <td>OBSERVACOES</td>
        </tr>'.$linha.'</table>');

$dompdf->setPaper('A4','landscape');

$dompdf->render();

$dompdf ->stream(
    "relatorio_medico.pdf",
    array(
        "Attachment"=> False //exibe pdf na tela pra fazer download direto altere para true
    )
    );

?>