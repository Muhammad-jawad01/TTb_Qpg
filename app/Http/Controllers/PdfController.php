<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Subject;
// use Fpdf;


class PdfController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
		$this->fpdf = new Fpdf;
    }

    public function index() 
    {
      
    $this->fpdf->SetFont('Arial', 'B', 15);
		$this->fpdf->AddPage("L", ['100', '100']);
		$this->fpdf->Text(10, 10, "Hello World!");

		$this->fpdf->Output();

		exit;
 
    }
}
