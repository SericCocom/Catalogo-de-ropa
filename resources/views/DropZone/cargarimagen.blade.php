@extends('admin.layouts.contenedor')
@section('title')
Catalogo 
@endsection
@section('encabezado')
        Catalogo
        <strong>Importante!!!</strong>
        <small>Recuerde elegir un album al cual va subir las fotos</small>

@endsection
@section('scrpts')
<link rel="stylesheet" href="css/custom.css">
<script src="{{asset('js/dropzone.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@endsection
@section('content')
<div class="form-group">
	<div class="col-md-4">
		<select class="form-control" id="album" >
			<option disabled="" selected="">Elije un album</option>
		@for ($i = 0; $i <sizeof($albums) ; $i++)
			<option  value="{{ $albums[$i]->id_album }}">{{ $albums[$i]->album }}</option>
		@endfor
		</select>
	
	</div>
	<br>
	<br>
    <div class="dropzone">
        
    </div>
</div>




<script src="{{asset('js/DropZone/dropzone-config.js')}}"></script>

@endsection

