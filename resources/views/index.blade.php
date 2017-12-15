<head>
  <link rel="stylesheet" href="{{ URL::asset('css/estiloCursos.css') }}">
</head>

@extends('layouts.main')

@section('content')

  <div class="">
    <img class="carrousel" src="img/curso12.png" alt="">
  </div>

  <hr>


    <section class="">
      @isset($categoria)
        <h2>{{$categoria->title}}</h2>
      @endisset

      @foreach ($cursos as $curso)
        <div class="row">
          <div class="col-md-12">
            <article class="cursos">
              <div class="row">
                <div class="container">


                  <div class="col-md-4">
                    <h2 id="titulo">{{ $curso->title }}</h2>
                    <h5 id="">Ofrecido por: {{$curso->user->first_name}} {{$curso->user->last_name}}</h5>
                    <h5 id="">Categoria: {{$curso->category->title}}</h5>
                  </div>
                  <div class="col-md-2">
                    <div class="">
                      <br><br>
                      <a href="{{route('curso', ['id'=>$curso->id])}}"><button type="button" class="btn btn-info btn-block">
                        VER MÁS
                      </button></a>

                    </div>
                  </div>
                </div>
              </div>
            </article>
            <hr>
          </div>
        </div>
     @endforeach

      <div class="container ">
        {{ $cursos->links() }}
      </div>
    </section>
@endsection

@section('footer')
  @include('footer')

@endsection
