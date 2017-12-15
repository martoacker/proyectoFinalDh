<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Course extends Model
{
  // QUE ONDA ESTO?

  // private $id;
  // private $titulo;
  // private $descripcion;

  // QUE ONDA ESTO DEL FILLABLE Y GUARDED
  protected $fillable = [
      'title', 'description', 'user_id', 'category_id', 'modality', 'price', 'image',
  ];

  public function category(){
    return $this->belongsTo(Category::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }


}
