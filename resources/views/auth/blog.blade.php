@extends('layouts.auth-master')
    @section('content')
    <header class="p-3 bg-dark text-white">
    <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    @auth
        {{auth()->user()->name}}
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
        </div>
      @endauth
    <form method="post" action="{{ route('blog.perform') }}" id="myform">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />   
        <input type="hidden" name="userid" value="" />
        <h1 class="h3 mb-3 fw-normal">Blog</h1>

        <div class="form-group form-floating mb-3">
            <input type="type" class="form-control" name="title" value="" placeholder="name@example.com" autofocus>
            <label for="floatingEmail">Blog Title</label>
            @if ($errors->has('title'))
                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <textarea class="form-control" name="content" value="" placeholder="Username" autofocus></textarea> 
            <label for="floatingName">Discription</label>
            @if ($errors->has('content'))
                <span class="text-danger text-left">{{ $errors->first('content') }}</span>
            @endif
        </div>      

        <div class="form-group form-floating mb-3">
             <input type="file" class="form-control" name="image" value=""> 
            <label for="floatingName"></label>
            @if ($errors->has('image'))
                <span class="text-danger text-left">{{ $errors->first('image') }}</span>
            @endif
        </div>  

        <button class="w-100 btn btn-lg btn-primary" type="submit">Add Blog</button>
           
        
        @include('auth.partials.copy')
    </form>
    </div>
  </div>
</header> 
@endsection