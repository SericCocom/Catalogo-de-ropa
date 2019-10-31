@extends('admin.layouts.contenedor')

@section('title')
Prendas
@endsection
@section('encabezado')
        Prendas
        <small>Lista de prendas</small>

@endsection
@section('content')
<div class="box" id="Productos">
          
          
            <div class="box-header">

              <div class="col">
  <div class="col-lg-2">
    <div class="input-group">
      <h3 class="box-title">Detalle prendas</h3>
      <br>          
      <button class="btn-primary form-control" v-on:click="ShowModal()">Nueva prenda +</button>
      <br>
      
    </div>
  </div>

  <div class="col-lg-1">
    <div class="input-group">
      <br>
      <button class="btn-primary form-control" v-on:click="ShowModalCat()">Categorias</button>
    </div>
  </div>
  <div class="col-lg-1">
    <div class="input-group">
      <br>
      <button class="btn-primary form-control" v-on:click="ShowModalAlbum()">Albumes</button>
    </div>
  </div>



</div>  

<br>

              
              <div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Buscar</button>
      </span>
      <input type="text" class="form-control">
    </div>
  </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-condensed table-bordered table-hover" >
                <thead>
                  <th width="19%">Clave</th>
                  
                  <th width="15%">Talla </th>
                  <th width="15%">Precio de Venta</th>
                  <th width="15%">Precio de compra</th>
                 
                
                   <th width="5%">Categoria</th>
                     <th width="5%">Foto</th>
                  <th width="5%">Album</th>
                  <th width="5%">Opciones</th>
                </thead>
                <tr v-for="producto in productos">
              <td>@{{producto.clave}}</td>
              
              <td>@{{producto.talla}}</td>
              <td>@{{producto.precioventa}}</td>
              <td>@{{producto.preciocompra}}</td>
              
              <td>@{{producto.categoria}}</td>
              
              <td><img v-bind:src="`./img/${producto.photo}`" class="img-responsive"></td>
             <td>@{{producto.id_album}}</td>
             <td>
                {{-- <span class="glyphicon glyphicon-cog btn btn-sm"v-on:click="asigSelected(index)"></span> --}}

                <span class="fa fa-pencil btn btn-sm" v-on:click="editProducto(producto.clave)"></span>
              </td>
            </tr>


           

                <tbody>
                
				</tbody>
					
        <tfoot>
    				
        </tfoot>
			</table>

    		</div>


        <div class="modal fade" tabindex="-1" role="dialog" id="add_mutuario">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title" v-if="!editando">Agregar producto</h4>
                        <h4 class="modal-title" v-if="editando">Editando producto</h4>
                    </div>
                    <div class="modal-body ">
                        <input type="text" name="" placeholder="Clave" v-model="clave" class="form-control">
                        
                        <br>
                        <input type="text" name="" placeholder="Talla" v-model="talla" class="form-control">
                        <br>
                        <input type="text" name="" placeholder="Precio venta" v-model="precioventa" class="form-control">
                        <br>
                        <input type="text" name="" placeholder="Precio compra" v-model="preciocompra" class="form-control">
                        <input type="text" name="" placeholder="Descripcion" v-model="descripcion" >
                        <br>
                      
                        <br>
                      
                          <select class="form-control" v-model="categoria">
                          <option disabled="" selected="">Elije una categoria</option>
                          <option v-for="categor in categorias" v-bind:value="categor.categoria">@{{ categor.categoria }}</option>
                           </select>
                        <br>
                        

                        <select class="form-control" v-model="id_album">
                          <option disabled="" selected="">Elije un album</option>
                          <option v-for="album in albums" v-bind:value="album.id_album">@{{ album.album }}</option>
                        </select>



                      <br>
                      <label v-if="editando">Foto Actual</label>
                      <label v-if="!editando">Elija una foto</label>
                      <br>
                       <td v-if="editando"><img v-if="editando" v-bind:src="`./img/${imagen}`" width="300" height="350"></td>

                       <br>
                       <input type="file" name=""  class="form-control" @change="onFileChange">
                       <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="clearComponents()">Close</button>
                        <button type="submit" class="btn btn-primary" v-on:click="addProducto()" v-if="!editando">Guardar</button>
                        
                          <button type="submit" class="btn btn-primary" v-on:click="updateProductos(auxClave)" v-if="editando" >Actualizar</button>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

         <div class="modal fade" tabindex="-1" role="dialog" id="add_categoria">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title" v-if="!editando">Categorias</h4>
                        
                    </div>
                    <div class="modal-body ">
                         <table class="table table-condensed table-bordered table-hover" >
                <thead>
                  <th width="19%">Categoria</th>
                  
                  <th width="5%">Opciones</th>
                </thead>
                <tr v-for="categoria in categorias">
              <td>@{{categoria.categoria}}</td>
              
             <td>
                {{-- <span class="glyphicon glyphicon-cog btn btn-sm"v-on:click="asigSelected(index)"></span> --}}

                <span class="fa fa-pencil btn btn-sm" v-on:click="editCategoria(categoria.categoria)"></span>
              </td>
            </tr>


           

                <tbody>
                
        </tbody>
          
        <tfoot>
            
        </tfoot>
      </table>
      <br>
      <input type="text" name="" class="form-control" placeholder="Categoria nueva" v-model="categoria">
      <button type="submit" class="btn btn-primary" v-on:click="addCategoria()" v-if="!editandoCategoria">Agregar</button>
      <button type="submit" class="btn btn-primary" v-on:click="updateCategoria(auxCategoria)" v-if="editandoCategoria" >Actualizar</button>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="clearComponents()">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
                

     <div class="modal fade" tabindex="-1" role="dialog" id="album">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title" >Albumes</h4>
                        
                    </div>
                    <div class="modal-body ">
                         <table class="table table-condensed table-bordered table-hover" >
                <thead>
                  <th width="1%">Album</th>
                  <th width="1%">Creación</th>
                   <th width="1%">Publicación</th>
                  <th width="5%">Opciones</th>
                </thead>
                <tr v-for="album in albums">
                    <td>@{{album.album}}</td>
                    <td>@{{album.created_at}}</td>
                    <td>@{{album.fecha_publica}}</td>
                    <td>
                {{-- <span class="glyphicon glyphicon-cog btn btn-sm"v-on:click="asigSelected(index)"></span> --}}
                    <span class="fa fa-pencil btn btn-sm" v-on:click="editAlbum(album.id_album)"></span>
                    </td>
            </tr>
          
          
       
         </table>
     
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="clearComponents()">Close</button>
                        <button type="button" class="btn btn-primary"  v-on:click="showModalAl()">Agregar</button>


                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



         <div class="modal fade" tabindex="-1" role="dialog" id="add_album">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                       <h4 class="modal-title" v-if="!editandoAlbum">Agregar album</h4>
                        <h4 class="modal-title" v-if="editandoAlbum">Editando album</h4>
                        
                    </div>
                    <div class="modal-body ">
                     
                          <input type="text" name="form-control" placeholder="Clave" v-model="id_album">
      
                         <input type="text" name="form-control" placeholder="Nombre de album" v-model="album">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" v-on:click="hideModaAl()">Close</button>
                         <button type="submit" class="btn btn-primary" v-on:click="addAlbum()" v-if="!editandoAlbum">Agregar</button>
                        <button type="submit" class="btn btn-primary" v-on:click="updateAlbum(auxAlbum)" v-if="editandoAlbum" >Actualizar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->




                
    </div>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
  <script src="{{asset('js/Productos/Productos.js')}}"></script>


  <script>
  
    //Initialize Select2 Elements
    $('.select2').select2();

</script>



@endsection