<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Examination;
use App\ExaminationAnswer;
use App\StudentExam;
class AdminController extends Controller
{
    

    public function admin_main(){
        return view('admin.main');
    }

    public function admin_original(){
        return view('admin.original');
    }

    public function admin_original_check(Request $request){
        $this->validate($request, [
            'original'=> 'required'
        ]);
        
        $student = new User;
        $student->original = $request['original'];
        $student->role_id = 2;
        $student->password = bcrypt('login');
        $student->save();

        return redirect()->back()->with('suc', 'Original Number has been inserted successfully!');
    }

    public function admin_examination(){
        $exams = Examination::paginate(12);
        return view('admin.examination', compact('exams'));
    }

    public function admin_student_list(){
        $students = User::where('role_id',2)->get();
        return view('admin.student', compact('students'));
    }

    public function admin_logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function admin_create_examination(){
        
        return view('admin.create_examination');
    }

    public function admin_create_examination_check(Request $request){
        $this->validate($request, [
            'question'=> 'required',
            'answer'=> 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required'
        ]);

        $exam = new Examination;
        $exam->question = $request['question'];
        $exam->time = 60;
        $exam->a = $request['a'];
        $exam->b = $request['b'];
        $exam->c =$request['c'];
        $exam->d = $request['d'];
        $exam->save();

        $answer = new ExaminationAnswer;
        $answer->examination_id = $exam->id;
        $answer->answer = $request['answer'];
        $answer->save();

        return redirect()->back()->with('suc', 'New Question has been inserted successfully!!');
    }

    public function admin_edit($id){
        $find = Examination::findOrFail($id);
        if($find){
            return view('admin.edit', compact('find'));
        }
        
    }

    public function admin_exam_update(Request $request,$id){
        $find = Examination::findOrFail($id);
        if($find){
            $update = Examination::where('id', $id)->update(['question'=> $request['question'], 'a'=> $request['a'], 'b'=> $request['b'], 'c'=> $request['c'], 'd'=> $request['d']]);
            ExaminationAnswer::where('examination_id', $find->id)->update(['answer'=> $request['answer']]);

            return redirect()->back()->with('suc', 'Examination question has been updated successfully!!');
        }
    
    }

    public function admin_student_answer($id){
        $exams = StudentExam::where('user_id',$id)->paginate(10);
        

        return view('admin.student_edit',compact('exams'));
        
        
    }
}
