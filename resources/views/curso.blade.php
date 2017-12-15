<head>
  <link rel="stylesheet" href="{{ URL::asset('css/estiloCursos.css') }}">
</head>
@extends('layouts.main')

@section('content')

    <div class="well">
        <div class="page-header">
          <h2 class="text-center">{{ $cursoID->title }}</h2>
        </div>
        <p>{{ $cursoID->description }}</p>
        <h4>Categoria: {{$cursoID->category->title}}</h4>
        <h4>Ofrecido por: {{$cursoID->user->first_name}} {{$cursoID->user->last_name}}</h4>
        <h4>Modalidad: {{ $cursoID->modality }}</h4>
        <h4>Precio: ${{ $cursoID->price }}</h4>
        <div class="">
          <img src="{{ Storage::disk('public')->url( $cursoID->image) }}" class="img_curso img-responsive"alt="Imagen del curso de {{$cursoID->title}}"> </img>
        </div>

    </div>





 @if ($anotado)
   <form class="" id="desanotar" action="{{ route('desinscripto', ['id'=>$cursoID->id])}}" method="post">
     {{ csrf_field() }}
     {{ method_field('DELETE')}}
   <input type="submit" name="desanotarme" value="DESINSCRIBIRME">
   </form>
 @else
   <form class="" method="post" id="anotar" action="{{ route('inscripto', ['id'=>$cursoID->id])}}" enctype="multipart/form-data">
       {{ csrf_field() }}
       <input type="submit" name="anotarme" value="INSCRIBIRME">
   </form>
 @endif

{{--
<div class="row">
  <br>
  <div class="block">
    <button type="button" class="btn btn-danger" name="button"><a href="{{route('login')}}"> INICIA SESION PARA INSCRIBIRTE</a></button>
  </div>
</div> --}}
@endsection

<script src="{{ asset('js/confirmationIN.js') }}"></script>
<script src="{{ asset('js/confirmationOUT.js') }}"></script>
