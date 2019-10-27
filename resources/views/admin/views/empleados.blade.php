@extends('admin.layouts.contenedor')
@section('title')
Empleados
@endsection
@section('encabezado')
        Empleados
        <small>lista de empleados</small>

@endsection
@section('content')
<div class="box" id="Empleado">
          
          

          
            <div class="box-header">
              <h3 class="box-title">Detalle empleados</h3>
              <button class="btn-primary" v-on:click="ShowModal()">Nuevo empleado +</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-condensed table-bordered table-hover" >
                <thead>
                  <th width="10%">CURP</th>
                  <th width="20%">Nombre</th>
                  <th width="6%">Dirección </th>
                  <th width="12%">Correo</th>
                  <th width="7%">Teléfono</th>
                  <th width="8%">Opciones</th>
                  
                </thead>

                <tr v-for="empleado in empleados">
              <td>@{{empleado.curp}}</td>
              <td>@{{empleado.nombre}} @{{empleado.apellidop}} @{{empleado.apellidom}}</td>
              <td>@{{empleado.direccion}}</td>
              <td>@{{empleado.correo}}</td>
              <td>@{{empleado.telefono}}</td>
              
              <td>
                {{-- <span class="glyphicon glyphicon-cog btn btn-sm"v-on:click="asigSelected(index)"></span> --}}

                <span class="fa fa-pencil btn btn-sm" v-on:click="EditarEmpleado(empleado.curp)"></span>
                <span class="glyphicon glyphicon-eject btn btn-sm" v-on:click="DespedirEmpleado(empleado.curp)"></span>


              </td>
            </tr>



                <tbody>
                
				</tbody>
					
        <tfoot>
    				<tr>
    					
    					
    				
    				<td><h3> 	</h3></td>
    				
           


    				{{--<td class="btn btn-danger"><h4>{{$totales[1]}}</h4></td>
    				<td class="btn btn-danger"><h4>{{$totales[2]}}</h4></td>
    				--}}

    				</tr>
        </tfoot>
			</table>

    		</div>

                 <div class="modal fade" tabindex="-1" role="dialog" id="add_mutuario">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <h4 class="modal-title" v-if="!editando">Agregar empleado</h4>
                        <h4 class="modal-title" v-if="editando">Editando empleado</h4>
                    </div>
                    <div class="modal-body ">

                        <input type="text" name="" placeholder="CURP" class="form-control" v-model="curp">
                    <p></p>
                    <input type="text" name="" placeholder="Nombre" class="form-control" v-model="nombre">
                    <p></p>
                    <input type="text" name="" placeholder="Apellido Paterno" class="form-control" v-model="apellidop">
                    <p></p>
                    <input type="text" name="" placeholder="Apellido Materno" class="form-control" v-model="apellidom">
                    <p></p>
                    <input type="text" name="" placeholder="Dirección" class="form-control" v-model="direccion">
                    <p></p>
                    <input type="email" name="" placeholder="Email" class="form-control" v-model="email">
                    <p></p>
                    <input type="text" name="" placeholder="Teléfono" class="form-control" v-model="telefono">
                    <p></p>
                     <input type="text" name="" placeholder="Usuario" class="form-control" v-model="usuario">
                     <p></p>
                      <input type="text" name="" placeholder="Contraseña" class="form-control" v-model="contrase">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" v-on:click="AgregarEmpleado()" v-if="!editando">Guardar</button>
                        
                          <button type="submit" class="btn btn-primary" v-on:click="ActualizarEmpleado(auxCurp)" v-if="editando" >Actualizar</button>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
                
                
    </div>

<script src="{{asset('js/Empleados.js')}}"></script>

@endsection