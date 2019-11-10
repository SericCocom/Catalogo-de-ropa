<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use Response;
class FpdfController extends Controller
{
   public function ImprimirPDF()
   {
    $pdf= new Fpdf();
    $pdf->AddPage();
    $pdf->setFont('Arial','B',16);
    $pdf->Cell(40,10,'Hello world');
    $headers=['Content-Type'=>'application/pdf'];
    return Response::make($pdf->Output(),200,$headers);

   }
}
