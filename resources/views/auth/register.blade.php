@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}" id="myform">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" autofocus>
            <label for="floatingName">Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" >
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" >
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
           <br> <br>
          <a href="/login" class="w-100 btn btn-lg btn-primary" type="submit">login</a>
        
        @include('auth.partials.copy')
    </form>
@endsection

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
    alert("here");
    jQuery('#myform').validate({ 

        rules: {
            email: {
                required: true
            },
            username: {
                required: true
            },
            password: {
                required: true
            },
            password_confirmation: {
                required: true
            },
              
        },
        messages: {
            email: {
                required: "Enter something"
            },
            username: {
                required: "Enter something"
            },
            password: {
                required: "Enter something"
            },
            password_confirmation: {
                required: "Enter something"
            },
        }
    });

    jQuery('[name*="field"]').each(function () {
        jQuery(this).rules('add', {
            required: true,
            messages: {
                required: "Enter something else"
            }
        });
    });

});
</script>
