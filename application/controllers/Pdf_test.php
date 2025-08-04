<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf_test extends CI_Controller
{

    public function index()
    {
        $this->load->library('pdf');

        $pdf = new Pdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Hello World from CI3 with FPDI!');

        // Tambahkan header eksplisit
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="hello.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');

        $pdf->Output('I', 'hello.pdf');
    }
}
