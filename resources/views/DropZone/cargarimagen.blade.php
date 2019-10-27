@extends('admin.layouts.contenedor')
@section('title')
Catalogo
@endsection
@section('encabezado')
        Catalogo
        

@endsection
@section('scrpts')
<link rel="stylesheet" href="css/custom.css">
<script src="{{asset('js/dropzone.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@endsection
@section('content')
<div class="form-group">
    <div class="dropzone">
        
    </div>
</div>




<script src="{{asset('js/DropZone/dropzone-config.js')}}"></script>
@endsection

