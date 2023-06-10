<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $html = $_POST['html'];

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="password_card.pdf"');
    require_once 'vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output('password_card.pdf', 'D');
}
?>
