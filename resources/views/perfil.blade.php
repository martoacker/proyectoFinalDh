<head>
  <link rel="stylesheet" href="{{ URL::asset('css/perfil.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/estiloCursos.css') }}">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> --}}
</head>

@extends('layouts.app')

@section('principal')

    <div class="row">
      @isset($miPerfil)
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
          <div class="div-img">
              <img style="height:100%" src="{{ Storage::disk('public')->url( $miPerfil->avatar) }}" class="img-responsive centrado"alt="Foto de perfil de {{$miPerfil->first_name}}">
          </div>
          <h1 class="text-center">{{$miPerfil->first_name}} {{$miPerfil->last_name}} </h1>
        </div>

        <div class="col-md-4">

        </div>


      @endisset

  </div>




<hr>

    <div class="row">


      <div class="col-md-4 col-md-offset-2 ">

      <h2>Mis cursos creados</h2>

          @forelse ($misCursos as $curso)
            <div class="well well-sm">
              <ul>
                <li>Titulo: <span style="font-weight:bold">{{$curso->title}}</span></li>
                <li>Descripcion: {{$curso->description}}</li>
                <li>Categoria: {{$curso->category->title}}</li>
                <li>Modalidad: {{$curso->modality}}</li>
                <li>Precio: ${{$curso->price}}</li>
                <div class="">
                <li>Foto:</li>
                   <img src="{{ Storage::disk('public')->url( $curso->image) }}" class="img_curso"alt="Imagen del curso de {{$curso->title}}">
                </div>


                <button type="button" class="btn btn-warning">
                  <a href="{{route('editarCurso', ['id'=>$curso->id])}}">EDITAR</a>
                </button>

                <form class="" action="{{ route('eliminarCurso', ['id'=>$curso->id])}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete')}}
                <button type="submit" class="btn btn-danger">ELIMINAR</button>
                </form>
              </ul>
          </div>
          @empty

            <div class="">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Crea tu primer curso</button>
            </div>
          @else
          <div class="">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Crear nuevo curso</button>
          </div>

          @endforelse

      </div>
      <div class="col-md-4 col-md-offset-1">

        <h2 class="">Mis inscripciones</h2>
        @forelse ($miPerfil->enrolleds as $curso)


            <div class="well">
                <ul>
                    <li>Titulo: {{$curso->title}}</li>
                    <button type="button" class="btn btn-success"><a href="{{route('curso', ['id'=>$curso->id])}}">VER</a></button>
                </ul>
            </div>

        @empty
          <div class="">
            <button type="button" class="btn btn-success"><a href="{{ route('inicio') }}">Buscar cursos</a></button>
          </div>
        @endforelse


      </div>
    </div>
    <div class="row">
      <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo curso</h4>
              </div>
              <div class="modal-body">
                <form class="" method="post" id="formNewCourse" action="{{ route('nuevoCurso')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <label class="control-label" id="titulo" for="titulo">Titulo:</label>
                    <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" placeholder="Ej: Introducción a Inglés">
                  </div>
                  <div class="form-group">
                    <label class="control-label" id="descripcion" for="descripcion">Descripción:</label>
                    <textarea name="descripcion" class="form-control" rows="8" cols="80" placeholder="Ej: Para niños de 5 a 14 años">{{ old('descripcion') }}</textarea>
                  </div>
                  <div class="form-group">
                    <label class="control-label" id="categoria" for="categoria">Categoria:</label>
                    <select class="form-control" name="categoria">
                      <option>--Seleccione--</option>
                      @isset($misCategorias)
                        @foreach ($misCategorias as $categoria)
                            <option value="{{$categoria->id}}" {{ (old('categoria')==$categoria->id) ? 'selected': '' }} >{{$categoria->title}}</option>
                        @endforeach
                      @endisset
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label" id="modalidad" for="">Modalidad:</label><br>
                    <input type="radio" name="modalidad" id="Presencial" value="Presencial">
                      <label for="Presencial">Presencial</label>
                    <input type="radio" name="modalidad" id="Virtual" value="Virtual">
                      <label for="Virtual">Virtual</label>
                  </div>
                  <div class="form-group">
                    <label class="control-label" id="precio" for="precio">Precio:</label>
                    <input type="number" class="form-control" name="precio" value="{{ old('precio') }}" placeholder="Ej: $200">
                  </div>
                  <div class="form-group">
                    <input type="file" name="imagen"><br>
                      <div class="form-group">
                        <button type="submit" id="aceptar" class="btn btn-success">Guardar cambios</button>
                      </div>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>
                </form>

                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<hr>


@endsection
<script src="{{ asset('js/validatorNewCourse.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
