<?php

namespace App;
use App\StudentInformation;
use Illuminate\Database\Eloquent\Model;
use App\StudentResult;
class StudentCode extends Model
{
    public function info($user_id){
    	return StudentInformation::where('user_id', $user_id)->first();
    }

    public function result($user_id){
    	return StudentResult::where('user_id', $user_id)->first();
    }
}
