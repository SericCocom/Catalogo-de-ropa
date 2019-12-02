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
              <div class="box-body" >
                <div class="col-md-3">
                  <button  class="btn btn-primary form-control" data-toggle="modal" data-target="#resumen">Reporte</button>
                  <br>
                  <br>
                </div>

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


         <div class="modal fade" tabindex="-1" role="dialog" id="resumen">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                       <h4 class="modal-title" >Reporte de pedidos</h4>
                       
                        
                    </div>
                    <div class="modal-body ">
                    
                     <form action="{{ url('fpdf') }}" method="GET">
                        <select class="form-control" name="album">

                         @for ($i = 0; $i <sizeof($albums) ; $i++)
                           <option class="form-control" value="{{ $albums[$i]->id_album }}">{{ $albums[$i]->album }}</option>
                         @endfor
                       </select>
                      <br>
                      <br>
                      <button type="SUBMIT" class=" btn-primary">Generar PDF</button>
                     </form>

                       


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                         
                        
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->




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
            'copy', 'excel','print'
        ]
    } );
} );

</script>



@endsection