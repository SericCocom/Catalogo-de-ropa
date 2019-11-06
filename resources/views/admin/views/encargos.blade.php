@extends('admin.layouts.contenedor')
@section('title')
Encargos
@endsection
@section('encabezado')
        Encargos
        <small>lista de encargos</small>

@endsection
@section('content')
<div class="box" id="encargos">
          
            <div class="box-header">
              
            </div>
           
            <div class="box-body">
              <table class="table table-condensed table-bordered table-hover" >
                <thead>
                  <th width="12%">Cliente</th>
                  <th width="18%">Prenda</th>
                  <th width="5%">Precio</th>
                  <th width="8%">Fecha encargo</th>
                  <th width="8%">Preparado</th>
                  <th width="8%">Entregado</th>

                  <th width="8%">Opciones</th>
                  
                </thead>

                <tr v-for="encargo in encargos">
              <td>@{{encargo.nombre}}</td>
              <td><img v-bind:src="`./img/${encargo.photo}`" style="width: 270px;height: 200px"></td>
              <td>$ @{{encargo.precio}}</td>
              <td>@{{encargo.fecha}}</td>
              <td >@{{encargo.preparado}} </td>
               <td>@{{encargo.entregado}}</td>
              <td>
                {{-- <span class="glyphicon glyphicon-cog btn btn-sm"v-on:click="asigSelected(index)"></span> --}}

                <span class="fa fa-pencil btn btn-sm" v-on:click="EditarEmpleado(empleado.curp)"></span>
                <span class="glyphicon glyphicon-eject btn btn-sm" v-on:click="DespedirEmpleado(empleado.curp)"></span>


              </td>
            </tr>

                <tbody>
                
				</tbody>
					
        <tfoot>
    				
        </tfoot>
			</table>

    		</div>

                
                
    </div>

<script src="{{asset('js/Encargos/encargos.js')}}"></script>

@endsection