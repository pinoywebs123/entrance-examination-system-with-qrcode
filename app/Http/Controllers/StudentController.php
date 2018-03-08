<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInformation;
use Auth;
use App\Examination;
use PDF;
use App\User;
use App\StudentCode;
use App\StudentResult;
use App\StudentExam;
use DB;
class StudentController extends Controller
{
    public function __construct(){
      $this->middleware('studentcheck');
    }

    public function student_main(){
    	return view('student.main');
    }

    public function student_new_information(Request $request){
    	$info = new StudentInformation;
    	  		$info->user_id = Auth::id();
               $info->fname = $request['fname'];
               $info->mname = $request['mname'];
               $info->lname = $request['lname'];
               $info->contact = $request['contact'];
               $info->address = $request['address'];
               $info->pbirth = $request['pbirth'];
               $info->dob = $request['dob'];
               $info->age = $request['age'];
               $info->sex = $request['sex'];
               $info->status = $request['status'];
               $info->height = $request['height'];
               $info->width = $request['width'];
               $info->citizenship = $request['citizenship'];
               $info->religion = $request['religion'];
               $info->refered_study_norsu = $request['refered_study_norsu'];
               $info->brosis = $request['brosis'];
               $info->brosis_year_level = $request['brosis_year_level'];
               $info->father_name = $request['father_name'];
               $info->father_occupation = $request['father_occupation'];
               $info->father_contact = $request['father_contact'];
               $info->father_education = $request['father_education'];
               $info->father_address = $request['father_address'];
               $info->mother_name = $request['mother_name'];
               $info->mother_occupation = $request['mother_occupation'];
               $info->mother_contact = $request['mother_contact'];
               $info->mother_education = $request['mother_education'];
               $info->mother_address = $request['mother_address'];
               $info->my_elementary = $request['my_elementary'];
               $info->my_elementary_year = $request['my_elementary_year'];
               $info->my_highschool = $request['my_highschool'];
               $info->my_highschool_year = $request['my_highschool_year'];
               $info->my_college = $request['my_college'];
               $info->my_college_year = $request['my_college_year'];
           		$info->why_study_norsu = $request['why_study_norsu'];
            	$info->major_area = $request['major_area'];
              $info->department = $request['department'];
            	$info->save();
            return redirect()->route('student_exam', ['id'=> 1]);	
    	
    }

    public function student_exam($id){
    	$count = Examination::count();
    	$find = Examination::findOrFail($id);
    	return view('student.exam', compact('find', 'count'));
    }

    public function student_exam_starting(Request $request,$id){
      if($request['answer'] == null || $request['answer'] == ""){
        return redirect()->back()->with('err', 'Kindly choose any answer.');
      }
      $exam = new StudentExam;
      $exam->user_id = Auth::id();
      $exam->examination_id = $id; 
      $exam->answer = $request['answer'];
      $exam->save();
    	return redirect()->route('student_exam', ['id'=> $id+1]);
    }

    public function student_exam_finish(Request $request, $id){
       if($request['answer'] == null || $request['answer'] == ""){
        return redirect()->back()->with('err', 'Kindly choose any answer.');
      }
      
      $exam = new StudentExam;
      $exam->user_id = Auth::id();
      $exam->examination_id = $id; 
      $exam->answer = $request['answer'];
      $exam->save();

      DB::table('examinations')
            ->update(['time' => 60]);

    	return view('student.finish');
    }

    public function student_to_rating(Request $request){
    	$check_admin = User::where('original', $request['credential'])->first();
    	if($check_admin){
    		return view('student.rating');
    	}else{
    		return redirect()->back()->with('err', 'Invalid Admin Credentials, Try Again!');
    	}
    	
    }

    public function student_qrcode(Request $request){
      $result = new StudentResult;
      $result->user_id = Auth::id();
      $result->grade = $request['average'];
      $result->commu = $request['commu'];
      $result->interest = $request['interest'];
      $result->special = $request['special'];
      $result->personality = $request['personality'];
      $result->bearing = $request['bearing'];
      $result->save();

      $ran = rand('12356','9876');
      $code = new StudentCode;
      $code->user_id = Auth::id();
      $code->qr_code = $ran;
      $code->save();
    	
    	$pdf = PDF::loadView('pdf.qrcode', compact('ran'));
		return $pdf->stream('examination.pdf');
    	
    }

    public function student_timer($id){
    	$timerem = $_GET['timerem'];
    	$timer = Examination::where('id', $id)->update(['time'=> $timerem]);

    	
    }

    public function student_timeout($id, $answer){
      $exam = new StudentExam;
      $exam->user_id = Auth::id();
      $exam->examination_id = $id; 
      $exam->answer = $answer;
      $exam->save();
    	return redirect()->route('student_exam', ['id'=> $id+1]);
    }
}
