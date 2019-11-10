@extends('admin.layouts.contenedor')
@section('title')
Clientes
@endsection
@section('encabezado')
        Clientes
        <small>lista de Clientes</small>

@endsection
@section('content')
<div class="table-responsive" id="Mutuario">
          
          
            <div class="box-header">
             
            <div class="col-lg-2">
              <div class="input-group">
                        <h3 class="box-title">Detalle clientes</h3>
                         <button class="btn-primary form-control" v-on:click="ShowModal()">Nuevo clientes +</button>
                </div>
             </div>

  <div class="col-lg-1">
    <div class="input-group">
      <br>
      <button class="btn-primary form-control" v-on:click="getSolicitudes()">Solicitudes</button>
    </div>
  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-condensed table-bordered table-hover" >
                <thead>
                  <th width="19%">CURP</th>
                  <th width="30%">Nombre</th>
                  <th width="25%">Dirección </th>
                  <th width="23%">Correo</th>
                  <th width="23%">Teléfono</th>
                  <th width="23%">Usuario</th>
                  <th width="23%">Contraseña</th>
                  <th width="5%">Opciones</th>
                  
                </thead>


            <tr v-for="mutuario in mutuarios">
              <td>@{{mutuario.curp}}</td>
              <td>@{{mutuario.nombre}} @{{mutuario.apellidop}} @{{mutuario.apellidom}}</td>
              <td>@{{mutuario.direccion}}</td>
              <td>@{{mutuario.email}}</td>
              <td>@{{mutuario.telefono}}</td>
              <td>@{{mutuario.usuario}}</td>
              <td>@{{mutuario.password}}</td>
              <td>
                {{-- <span class="glyphicon glyphicon-cog btn btn-sm"v-on:click="asigSelected(index)"></span> --}}

                <span class="fa fa-pencil btn btn-sm" v-on:click="EditarMutuario(mutuario.curp)"></span>
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
                        <h4 class="modal-title" v-if="!editando">Agregar clientes</h4>
                        <h4 class="modal-title" v-if="editando">Editando clientes</h4>
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
                    <br>
                    <input type="text" name="" placeholder="Usuario" class="form-control" v-model="usuario">
                    <br>
                    <input type="text" name="" placeholder="Contraseña" class="form-control" v-model="password">
                    <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" v-on:click="AgregarMutuario()" v-if="!editando">Guardar</button>
                        
                          <button type="submit" class="btn btn-primary" v-on:click="ActualizarMutuario(auxCurp)" v-if="editando" >Actualizar</button>
                          
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" tabindex="-1" role="dialog" id="solicitudes">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <h4 class="modal-title" >Solicitudes</h4>
                        <table class="table table-condensed table-bordered table-hover" >
                <thead>
                  <th width="19%">CURP</th>
                  <th width="30%">Nombre</th>
                  <th width="25%">Dirección </th>
                  
                  <th width="23%">Teléfono</th>
                  
                  <th width="5%">Opciones</th>
                  
                </thead>


            <tr v-for="solicitud in solicitudes">
              <td>@{{solicitud.curp}}</td>
              <td>@{{solicitud.nombre}} @{{solicitud.apellidop}} @{{solicitud.apellidom}}</td>
              <td>@{{solicitud.direccion}}</td>
              
              <td>@{{solicitud.telefono}}</td>
              
              <td>
                {{-- <span class="glyphicon glyphicon-cog btn btn-sm"v-on:click="asigSelected(index)"></span> --}}

                <span class="fa fa-check"  v-on:click="AutotizarSolicitud(solicitud.curp,solicitud.nombre)"></span>

              </td>
            </tr>

                <tbody>
                
        </tbody>
          
        <tfoot>
        </tfoot>
      </table>
                    </div>
                    <div class="modal-body ">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->




                
                
                
    </div>

  <script src="{{asset('js/Mutuarios.js')}}"></script>


@endsection