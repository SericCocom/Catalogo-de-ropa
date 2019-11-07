@extends('admin.layouts.contenedor')

@section('title')
Resumen
@endsection
@section('encabezado')
        Pedidos
        <small>Resumen de pedidos</small>

@endsection 
@section('content')
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
<div class="box">
          
          
            <div >

            

                <br>

              
        
            <!-- /.box-header -->
              <div class="box-body">
               <table class="table table-condensed table-bordered table-hover" id="pedidos">
                <thead>
                  <th width="19%">Cliente</th>
                  <th width="19%">Prenda</th>
                  
                  <th width="15%">Precio </th>
                  <th width="15%">Fecha encargo</th>
                  
                 
                
                   <th width="5%">Preparado</th>
                     <th width="5%">Entregado</th>
                </thead>
                   @for ($i = 0; $i <sizeof($pedidos) ; $i++)
                    <tr>
                    <td>{{$pedidos[$i]->nombre}}</td>
                    <td>{{$pedidos[$i]->clave}}</td>
                    <td>$ {{$pedidos[$i]->precio}}</td>
                    <td>{{$pedidos[$i]->fecha}}</td>
                    <td>{{$pedidos[$i]->preparado}}</td>
                    <td>{{$pedidos[$i]->entregado}}</td>
              
                  
                    </tr>
                    @endfor
					
			           </table>
    		      </div>

                
            </div>
 <script src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/datatable/buttons.flash.min.js')}}"></script>
<script src="{{asset('js/datatable/jszip.min.js')}}"></script>
<script src="{{asset('js/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('js/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('js/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/datatable/buttons.print.min.js')}}"></script>
  <script>
  
    //Initialize elements
    $(document).ready(function() {
    $('#pedidos').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>



@endsection