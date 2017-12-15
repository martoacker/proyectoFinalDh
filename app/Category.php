<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Category extends Model
{

  protected $fillable = [
      'title',
  ];

  public function course(){
    return $this->hasMany(Course::class);
  }
}
