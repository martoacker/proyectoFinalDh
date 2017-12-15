<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Category;
use App\User;
use App\Enrolled;


class MainController extends Controller
{
  public function index()
  {
    $categorias = Category::all();
    $topCursos = Course::paginate(3);
    $cursos = Course::inRandomOrder()->paginate(5);
    $usuarios = null;
    if(Auth::User()){
      $usuarios = User::find(Auth::User()->id);
    }

    return view('index', ['cursos'=> $cursos,
                          'cursosDestacados' => $topCursos,
                          'miPerfil' => $usuarios,
                          'misCategorias' => $categorias]);

  }

  public function todosLosCursos()
  {
    $categorias = Category::all();
    $topCursos = Course::paginate(3);
    $cursos = Course::inRandomOrder()->paginate(5);

    return view('index', ['cursos'=> $cursos,
                          'cursosDestacados' => $topCursos,
                          'misCategorias' => $categorias]);
  }

  public function faq()
  {
    $categorias = Category::all();
    $topCursos = Course::paginate(3);
    $cursos = Course::inRandomOrder()->paginate(5);
    $usuarios = null;
    if(Auth::User()){
      $usuarios = User::find(Auth::User()->id);
    }
    return view('faq', ['miPerfil' => $usuarios,
                        'cursosDestacados' => $topCursos,
                        'misCategorias' => $categorias,
                        'cursos'=> $cursos]);

  }

  public function perfil()
  {
      return view('perfil');
  }

  public function curso($id, Request $request)
  {
    $curso = Course::find($id);
    $topCursos = Course::paginate(3);
    $cursos = Course::inRandomOrder()->paginate(5);

    $inscripto=null;
    if(Auth::User()){
      $inscripto = Enrolled::where('user_id', Auth::User()->id)
                      ->where('course_id', $id)->first();
    }

    $usuarios = null;
    if(Auth::User()){
      $usuarios = User::find(Auth::User()->id);
    }

    $categorias = Category::all();
    return view('curso', ['cursoID' => $curso,
                          'anotado' => $inscripto,
                          'cursosDestacados' => $topCursos,
                          'cursos'=> $cursos,
                          'miPerfil' => $usuarios,
                          'misCategorias' => $categorias]);
  }




  public function crearCursos(Request $request)
  {
    // $input = $request->all();
    // var_dump($input);
    //
    // $input = $request->only('titulo', 'descripcion');

    $this->validate($request, [
        // 'titulo' => 'required|unique:movie|max:255',
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
        'categoria' =>'required|numeric|min:1|max:22',
        'modalidad'=>'required',
        'precio' =>'required|numeric|min:0',
        'imagen' => 'image|required',
      ]);


      $params['imagen']='';
      if($request->file('imagen')){
          $file = $request->file('imagen');
          $name = Auth::User()->first_name ."_curso_" .$request->input('titulo') . "." . $file->extension();
          $folder = "imagenesDeCursos";
          $path = $file->storePubliclyAs($folder, $name);
          $params['imagen'] = $path;
       }

    $curso = Course::create([
              'title' => $request->input('titulo'),
              'description' => $request->input('descripcion'),
              'category' => $request->input('categoria'),
              'user_id' => Auth::User()->id,
              'category_id'=> $request->input('categoria'),
              'modality'=> $request->input('modalidad'),
              'price'=> $request->input('precio'),
              'image'=>$params['imagen'],
            ]);

      $cursos = Course::where('user_id', Auth::User()->id)->get();
      return redirect()->route('mostrarPerfil');
      // return view('perfil', ['misCursos' => $cursos,
      //                       // 'misCategorias' => $categorias,
      //                       'mensaje' => 'Curso creado con éxito']);
  }

  // public function mostrarCategorias(Request $request){
  //   $categorias = Category::all();
  //   return view('perfil')->with('misCategorias', $categorias);
  // }

  public function mostrarMiPerfil(Request $request){
    $categorias = Category::all();

    $usuario = User::find(Auth::User()->id);
    //$inscripto = Enrolled::where('user_id', Auth::User()->id)->get();
    $inscripto=null;
    $cursos = Course::where('user_id', Auth::User()->id)->get();
    return view('perfil', ['misCursos'=> $cursos,
                          'inscripciones' => $inscripto,
                          'misCategorias' => $categorias,
                          'miPerfil' => $usuario ]);
  }

  public function editarCursos($id, Request $request){
    $curso = Course::find($id);
    $categorias = Category::all();
    return view('editarCurso', ['curso' => $curso,
                              'misCategorias' => $categorias]);
  }

  public function actualizarCursos($id, Request $request){
    $curso = Course::find($id);
    $this->validate($request, [
        // 'titulo' => 'required|unique:movie|max:255',
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
        'categoria' =>'required|numeric|min:1|max:22',
        'modalidad'=>'required',
        'precio' =>'required|numeric|min:0',
        'imagen' => 'image',
      ]);
    $curso->title = $request->input('titulo');
    $curso->description = $request->input('descripcion');
    $curso->category_id = $request->input('categoria');
    $curso->modality = $request->input('modalidad');
    $curso->price = $request->input('precio');
    $curso->save();
    return redirect()->route('mostrarPerfil');
  }

  public function eliminarCursos($id){
    $curso = Course::find($id);
    $curso->delete();
    return redirect()->route('mostrarPerfil');
  }

  public function inscripcion($id, Request $request){

    $inscripcion = Enrolled::create([
      'user_id' => Auth::User()->id,
      'course_id' => Course::find($id)->id,

    ]);
    return redirect()->route('curso', ['id'=>Course::find($id)->id]);
  }

  public function desinscripcion($id, Request $request){

    $inscripcion = Enrolled::where('user_id', Auth::User()->id)
                  ->where('course_id', $id)->first();
    $inscripcion->delete();
    return redirect()->route('curso', ['id'=>Course::find($id)->id]);
  }

    public function cursosCategoria($id, Request $request){
      $categorias = Category::all();
      $topCursos = Course::paginate(3);
      $usuarios = null;
      if(Auth::User()){
        $usuarios = User::find(Auth::User()->id);
      }

      $cursos = Course::where('category_id', $id)->paginate(5);
      $categoria = Category::find($id);
      return view('index', ['cursos' => $cursos,
                            'cursosDestacados' => $topCursos,
                            'misCategorias' => $categorias,
                            'miPerfil' => $usuarios,
                            'categoria' => $categoria]);

   }

}
