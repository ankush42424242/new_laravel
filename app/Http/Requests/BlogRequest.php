<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\BlogsRequest;
use App\Http\Controllers\BlogRequest;
use App\Http\Controllers\BlogController;

class BlogRequest extends BlogsRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {        
        return [
            'title' => 'required|blog,title',
            'content' => 'required|blog,content',
            'image' =>  'required|blog,image',           
        ];
    }
}