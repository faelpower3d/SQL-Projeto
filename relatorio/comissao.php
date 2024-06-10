<?php
require '../conexaoBanco/loja.php'; // Certifique-se de que o autoload do Composer está correto
use Dompdf\Dompdf;
use Dompdf\Options;

include '../dompdf/autoload.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['data_inicio']) && isset($_GET['data_fim'])) {
    $data_inicio = $_GET['data_inicio'];
    $data_fim = $_GET['data_fim'];

    // Consulta para calcular o total vendido e a comissão recebida por cada vendedor
    $sql = "SELECT v.nome AS vendedor_nome, 
                   SUM(i.qtde * p.preco) AS total_vendido,
                   SUM(i.qtde * p.preco) * (v.perc_comissao / 100) AS comissao_recebida
            FROM vendedor v
            JOIN pedidos o ON v.id = o.id_vendedor
            JOIN itens_pedido i ON o.id = i.id_pedido
            JOIN produto p ON i.id_produto = p.id
            WHERE o.data BETWEEN ? AND ?
            GROUP BY v.id, v.nome
            HAVING total_vendido > 0";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $data_inicio, $data_fim);
    $stmt->execute();
    $result = $stmt->get_result();

    ob_start();
    ?>
    <h1>Relatório de Comissões</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nome do Vendedor</th>
                <th>Total Vendido</th>
                <th>Comissão Recebida</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['vendedor_nome']); ?></td>
                    <td><?php echo number_format($row['total_vendido'], 2, ',', '.'); ?></td>
                    <td><?php echo number_format($row['comissao_recebida'], 2, ',', '.'); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php
    $html = ob_get_clean();

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("relatorio_comissoes.pdf", array("Attachment" => false));
    exit(0);
}
?>

<form method="get" action="">
    Data Início: <input type="date" name="data_inicio" required><br>
    Data Fim: <input type="date" name="data_fim" required><br>
    <input type="submit" value="Gerar Relatório">
</form>
