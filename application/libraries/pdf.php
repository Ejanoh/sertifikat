<?php
require_once(APPPATH . 'third_party/fpdf/fpdf.php');
require_once(APPPATH . 'third_party/fpdi/src/autoload.php');

use setasign\Fpdi\Fpdi;

class Pdf extends Fpdi
{
    public function __construct()
    {
        parent::__construct();
    }
}
