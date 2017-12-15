<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Course;

class Enrolled extends Model
{
  protected $fillable = [
      'user_id', 'course_id',
  ];

  public function course(){
    return $this->belongsTo(Course::class);
  }

  public function user(){
    return $this->hasOne(User::class);
  }
}
