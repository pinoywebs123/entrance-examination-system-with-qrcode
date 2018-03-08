<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    public function answer(){
    	return $this->hasOne('App\ExaminationAnswer');
    }
}
