<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cv extends Model
{

   protected $fillable = ['fullname','user_id','user_email','skill','exp','photo'];

    public function User() {
      return $this->belongsto(User::class);
    }

    public function exp() {
       return $this->hasmany(exp::class);
    }
}
