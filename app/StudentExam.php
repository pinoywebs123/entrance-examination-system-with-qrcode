<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentExam extends Model
{
    public function exam(){
    	return $this->belongsTo('App\Examination', 'examination_id', 'id');
    }
}
