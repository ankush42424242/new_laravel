<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class InsertController extends Controller
{
    public function insertform(){
        return view('newpage');
        }
        public function insertdata(Request $request){
        $firstname = $request->input('firstname');
        $secondname = $request->input('secondname');
        $username = $request->input('username');
        $email = $request->input('email');
        $Password = $request->input('Password')
        $data=array('firstname'=>$firstname,"secondname"=>$secondname,"username"=>$username,"email"=>$email,"Password"=>$Password);
        DB::table('users_register')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
    }
}