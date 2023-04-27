<?php

namespace App\Http\Controllers;

use App\Models\Inserts;
use App\Http\Controllers\InsertController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InsertController extends Controller 
{
       public function insert(){
        return view('auth.student');
       }

        public function studentlist(){
            $students = Inserts::latest()->paginate(5);
            return view('auth.studentlist',compact('students'))->with('i',(request()->input('page', 1) - 1) * 5);
       }
    
    public function insertt(Request $request){
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('insert')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
                $student = new Inserts;
                $student->name = $data['name'];
                $student->last_name = $data['last_name'];
                $student->email = $data['email'];
                 $student->save();
                return redirect()->route('auth.studentlist')
                        ->with('success','Product created successfully.');
        }
    }



    /*public function studentAlllist(Student $student)
    {
        return view('auth.studentlist',compact('student'));
    }*/
}