<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>USER DETAILS</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('Information.create') }}"> Create Information</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informations as $information)
                    <tr>
                        <td>{{ $information->id }}</td>
                        <td>{{ $information->Name }}</td>
                        <td>{{ $information->Email }}</td>
                        <td>{{ $information->Number }}</td>
                        <td>{{ $information->Address }}</td>
                        <td>

                            
                        <!-- Information/edit-post/{{$information->id}} -->
                        
                        
                           <form action="Information/delete-post/{{$information->id}}" method="POST">

                           <a class="btn btn-primary" href="Information/edit-post/{{$information->id}}">
                        Edit</a>
                        
                                @csrf
                                
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>

                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $informations->links() !!}
    </div>
</body>
</html>