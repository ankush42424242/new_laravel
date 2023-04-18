<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogRequest;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function performm()
    { 
        return view('auth.blog');
    }

     public function bregister(BlogRequest $requestblog) 
    {
       $blog = User::create($requestblog->validated());
        return redirect('/')->with('success', "Blog Add Successfully.");
    }
}