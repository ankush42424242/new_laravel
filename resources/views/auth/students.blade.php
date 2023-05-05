<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="{{ URL::asset('/assets/bootstrap/js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('/assets/bootstrap/js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" />

</head>
<div class="container">

   
  <h2 class="text-center">Student Management</h2>
   <a href="/studentlist" class="btn btn-primary">All users list</a>
  <br>
   <form action="{{ route('auth.studentlist') }}" method="POST" class="form-group" id="myform" style="width:70%; margin-left:15%;">
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
    <button type="submit"  value ="Add student" class="btn btn-primary">Submit</button>
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
    jQuery('#myform').validate({ 
        rules: {
            name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true
            }, 
        },
        messages: {
            name: {
                required: "Enter your Name"
            },
            last_name: {
                required: "Enter your lastname"
            },
            email: {
                required: "Enter your Email"
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