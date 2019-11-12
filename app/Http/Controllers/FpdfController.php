<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use Response;
use DB;
class FpdfController extends Fpdf
{

   public function ImprimirPDF(Request $request)
   {
    $album=$request->get('album');
    
   	$cliente=DB::select("SELECT CONCAT(clientes.nombre,' ',clientes.apellidop,' ',clientes.apellidom) as nombre,clientes.curp as curp FROM comentarios INNER JOIN clientes ON clientes.curp=comentarios.id_usuario INNER JOIN productos ON productos.clave=comentarios.prenda INNER JOIN albums ON albums.id_album=productos.id_album WHERE albums.id_album='$album' AND comentarios.cancelado='NO' AND albums.publicado='SI' GROUP BY clientes.curp");
    $pdf= new Fpdf();
    $pdf->AddPage();
    $pdf->setFont('Arial','B',16);
    $pdf->Cell(40,10,'Resumen de pedidos');
    $pdf->Ln();
    $pdf->setFont('Arial','B',10);
    $pdf->Cell(40,10,utf8_decode('Pedidos que han sido entregados se calculan como pago y todos los demás son calculados como saldo pendiente'));
    $pdf->Ln();
    $pdf->Cell(40,10,'P=Preparado para entregaa');
    $pdf->Ln();
    $pdf->Cell(40,10,'E=Entregado a cliente');
    $pdf->Ln();
  	 
      for ($i=0; $i <sizeof($cliente) ; $i++) { 
      	$total=0;
        $totalentregado=0;
      	$cli=$cliente[$i]->curp;
      	$pedidos=DB::select("SELECT CONCAT(clientes.nombre,' ',clientes.apellidop,' ',clientes.apellidom) as nombre,productos.clave as clave,productos.precioventa as precio,comentarios.preparado as preparado,comentarios.entregado as entregado,comentarios.created_at as fecha,comentarios.preparado as prepa,productos.descripcion descripcion,productos.talla as talla FROM comentarios INNER JOIN clientes ON clientes.curp=comentarios.id_usuario INNER JOIN productos ON productos.clave=comentarios.prenda WHERE comentarios.cancelado='NO' AND comentarios.id_usuario='$cli'");
      	$pdf->setFont('Arial','',12);
      	$pdf->Cell(45,5,$cliente[$i]->nombre,0);
      	$pdf->Ln();
      	$pdf->Cell(23,5,"Prenda",1);
      	$pdf->Cell(20,5,"Precio",1);
      	$pdf->Cell(42,5,"Fecha",1);
        $pdf->Cell(10,5,"P",1);
        $pdf->Cell(10,5,"E",1);
      	$pdf->Cell(90,5,"Descripcion",1);
      	
      	$pdf->Ln();
      	for ($a=0; $a <sizeof($pedidos) ; $a++) { 
      	
      	$pdf->Cell(23,5,$pedidos[$a]->clave,1);
      	$pdf->Cell(20,5,$pedidos[$a]->precio,1);
      	$pdf->Cell(42,5,$pedidos[$a]->fecha,1);
        $pdf->Cell(10,5,$pedidos[$a]->prepa,1);
        $pdf->Cell(10,5,$pedidos[$a]->entregado,1);
      	$pdf->Cell(90,5,utf8_decode($pedidos[$a]->descripcion),1);
      	
      	if ($pedidos[$a]->entregado=='NO') {
      		$total=$total+$pedidos[$a]->precio;
      	}
        if ($pedidos[$a]->entregado=='SI') {
          $totalentregado=$totalentregado+$pedidos[$a]->precio;
        }


      	$pdf->Ln();
      }
      $pdf->Ln();
      $pdf->Cell(70,5,'Pago por prendas entregadas:    $',0);
      $pdf->Cell(49,5,$totalentregado,0);
      $pdf->Ln();

      $pdf->Cell(70,5,'Pago por prendas no entregadas:    $',0);
      $pdf->Cell(49,5,$total,0);
      $pdf->Ln();
      $pdf->Cell(50,5,'Ingreso total estimado:    $',0);
      $total=$total+$totalentregado;
      $pdf->Cell(49,5,$total,0);
      $pdf->Ln();
      $pdf->Ln();
      }


    $headers=['Content-Type'=>'application/pdf'];
    return Response::make($pdf->Output(),200,$headers);

   }

   

}
