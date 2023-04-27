<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="{{ URL::asset('/assets/bootstrap/js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/assets/bootstrap/js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" />

</head>
<div class="container">
  <h2 class="text-center">Student Management</h2>
  <br>
   <form action="{{ route('auth.studentlist') }}" method="Post" class="form-group" style="width:70%; margin-left:15%;">
   <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

    <label for="floatingEmail">First Name</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
    <input type="text" class="form-control" placeholder="First Name" name="name">
        
    <label for="floatingEmail">Last Name</label>
            @if ($errors->has('last_name'))
                <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
            @endif
    <input type="text" class="form-control" placeholder="Last Name" name="last_name">

    <label for="floatingEmail">Enter Email</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
  
    <input type="text" class="form-control" placeholder="Enter Email" name="email"><br>
    <button type="submit"  value = "Add student" class="btn btn-primary">Submit</button>
  </form>
</div>