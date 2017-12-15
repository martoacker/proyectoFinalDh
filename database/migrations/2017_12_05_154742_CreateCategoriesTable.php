<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categories', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
      });
      DB::table('categories')->insert([
          ['title' => 'Administración y contabilidad'],
          ['title' => 'Administración de Proyectos'],
          ['title' => 'Calidad, Logística y Distribución'],
          ['title' => 'Ceremonial y Eventos'],
          ['title' => 'Cocina y Gastronomía'],
          ['title' => 'Computación y Sistemas'],
          ['title' => 'Comercio Exterior y Relaciones Internacionales'],
          ['title' => 'Comunicación, Publicidad y Periodismo'],
          ['title' => 'Derecho y Legales'],
          ['title' => 'Gestión y Management'],
          ['title' => 'Gestoría'],
          ['title' => 'Impuestos'],
          ['title' => 'Idiomas'],
          ['title' => 'Idiomas y negocios'],
          ['title' => 'Inversiones y Finanzas'],
          ['title' => 'Liderazgo / Coaching'],
          ['title' => 'Marketing'],
          ['title' => 'Marketing Online y Negocios en Internet'],
          ['title' => 'Medicina y Salud'],
          ['title' => 'Recursos Humanos RRHH'],
          ['title' => 'Relaciones Públicas RRPP'],
          ['title' => 'Tiempo Libre']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
