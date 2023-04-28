<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<a href="/students" class="btn btn-outline-light me-2">Add students</a>
<a class="btn btn-primary" href="{{ URL::to('/studentspdf') }}">Export to PDF</a>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

 <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
          </tr>  
             @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->email }}</td>
            <td>
        </tr>
           @endforeach  
    </table>
    {!! $students->links() !!} 
    
