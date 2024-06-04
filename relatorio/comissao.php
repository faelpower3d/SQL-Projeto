<?php
include_once("../conexaoBanco/loja.php");
$sql="SELECT * FROM ver_pedidos ORDER BY data";
$result = mysqli_query($con,$sql) or die ("Erro rsrsrs");

$linha ="";
while ($registro = mysqli_fetch_array($result)){
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