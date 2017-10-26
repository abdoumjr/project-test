<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exp extends Model
{

  protected $fillable = ['title','body','start','end'];

  public function User() {
    return $this->belongsto(User::class);
  }

  public function cv() {
    return $this->belongsto(cv::class);
  }

}
