<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\StudentCode;
use PDF;
use App\Examination;
use App\StudentExam;
class AuthController extends Controller
{
    

    public function login(){
    	return view('auth.login');
    }

    public function lock_check(Request $request){
    	$this->validate($request, [
    		'credit'=> 'required',
    		'password'=> 'required'
    	]);

    	
    	if(Auth::attempt(['original'=> $request['credit'], 'password'=> $request['password']])){
    		if(Auth::user()->role_id == 1){
    			return redirect()->route('admin_main');
    		}else{
    			return  redirect()->route('student_main');
    		}
    	}else{
    		return redirect()->back()->with('error', 'Invalid Credentials');
    	}
    	
    }

    public function qr_scanner(){
        return view('auth.scanner');
    }

    public function qr_scanner_check(Request $request){
        $data = StudentCode::where('qr_code', $request['qr'])->count();
        return response()->json(['message'=> $data]);
    }

    public function student_result(){
         $qr = $_GET['qr'];
        $find = StudentCode::where('qr_code', $qr)->first();

        $total_exam = Examination::count();
        $answers = StudentExam::where('user_id', $find->user_id)->get();
        $score = 0;
        foreach($answers as $ans){
            if($ans->exam->answer->answer == $ans->answer){
                $score = $score + 1;
            }
            
        }

         $score_percent = ($score / $total_exam) * 100;
       
        if($find){

            $pdf = PDF::loadView('pdf.result', compact('find','total_exam','score_percent'));
            return $pdf->stream('invoice.pdf');
        }
        
    }
}
