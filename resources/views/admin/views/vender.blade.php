@extends('admin.layouts.contenedor')
@section('title')
Vender
@endsection
@section('encabezado')
        Venta
        <small>Nueva venta</small>

@endsection
@section('content')
<div class="box" id="Cotizacion">
          
          


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