<?php

namespace App\Http\Controllers;

use App\Models\Insert;
use App\Http\Requests\RegisterRequest;

class InsertController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function insert($request) 
    {
        $request->validate([
            'name' => 'required',
            'lname' => 'required',
            'email' => 'required',
        ]);
  
        $input = $request->all();

       Insert::create($input);
     
        return redirect()->route('/create')
                        ->with('success','Product created successfully.');
    }
}