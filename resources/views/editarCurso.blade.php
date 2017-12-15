@extends('layouts.app')

@section('principal')
<div class="container">


<h2>Editar Cursos</h2>

<div class="editarFormCurso">
  <form class="" method="post" action="{{ route('actualizaCurso', ['id'=>$curso->id])}}">
      {{ csrf_field() }}
      {{ method_field('put')}}

    <input type="text" name="titulo" value="{{ old('titulo', $curso->title) }}" placeholder="titulo" style="width:51%"><br><br>
    <textarea name="descripcion" placeholder="descripcion" rows="8" cols="80">{{ old('descripcion', $curso->description) }}</textarea>
    <div class="">
      <label for="categoria">Categoria:</label>
      <select class="" name="categoria">
        <option>--Seleccione--</option>
        @isset($misCategorias)
          @foreach ($misCategorias as $categoria)
              <option value="{{$categoria->id}}" {{ (old('categoria', $curso->category_id)==$categoria->id) ? 'selected': '' }} >{{$categoria->title}}</option>
          @endforeach
        @endisset
      </select>
    </div>
    <div class="">
      <label for="modalidad">Modalidad:</label>
      <input type="radio" name="modalidad" value="Presencial" {{ old('modalidad', $curso->modality)=='Presencial' ? 'checked': '' }}> Presencial
      <input type="radio" name="modalidad" value="Virtual" {{ old('modalidad', $curso->modality)=='Virtual' ? 'checked': '' }}> Virtual
    </div>
    <div class="">
      <label for="precio">Precio:</label>
      <input type="number" name="precio" value="{{ old('titulo', $curso->price) }}" placeholder="precio"><br><br>
    </div>
    <button type="submit" class="btn btn-primary">
      ACTUALIZAR
    </button>
  </form>
</div>


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

@endsection
