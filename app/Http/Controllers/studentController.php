<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use DB;
use PDF;

class StudentController extends Controller 
{
       public function insert(){
        return view('auth.students');
       }

        public function studentlist(){
            $students = Student::latest()->paginate(5);
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
            return redirect('studentlist')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
                $student = new Student;
                $student->name = $data['name'];
                $student->last_name = $data['last_name'];
                $student->email = $data['email'];
                 $student->save();
                return redirect()->route('auth.studentlist')
                        ->with('success','user  created successfully.');
        }
    }

    public function studentpdfs() {
      /*$data = Student::all();
        view()->share('students',$data);

      $pdf = PDF::loadView('auth.studentpdf', $data);
     // print_r($pdf);
      return $pdf->download('studentpdf.pdf');*/
    
            $items = DB::table("students")->get();
            view()->share('students',$items);
            $pdf = PDF::loadView('auth.studentpdf');
            return $pdf->download('studentpdf.pdf');

 }
 public function studentexport() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /*public function uploadUsers(Request $request)
{
        Excel::import(new UsersImport, $request->file);

        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
}*/

}