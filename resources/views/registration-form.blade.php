<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    
    <title>Document</title>
</head>
<body>
    <h1>Registration Form</h1>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
    @endif

    @if(session()->has('delete'))
        <div class="alert alert-danger" role="alert">
            {{session()->get('delete')}}
        </div>
    @endif

    @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    @endif
    <form action={{ url('/save_detail') }} method="post" enctype="multipart/form" >
    {{-- {{csrf_field()}} --}}
        @csrf()
        <div class="form-group">
        <label for="fname">First name:</label>
            <input type="text" id="fname" class="form-control" name="fname" value="{{old('fname')}}" oncopy="return false" oncontextmenu="return false">
            <small id="emailHelp" class="form-text text-muted">@error('fname') {{$message}} @enderror</small>
        </div>
        <div class="form-group">
        <label for="lname">Last name:</label>
            <input type="text" class="form-control" id="lname" name="lname" value="{{old('lname')}}" onpaste="return false">
            <small id="emailHelp" class="form-text text-muted">@error('lname') {{$message}} @enderror</small>
        </div>
        <div class="form-group">
        <label for="lname">Mobile:</label>
            <input type="number" minlength="10" class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}" onpaste="return false">
            <small id="emailHelp" class="form-text text-muted">@error('mobile') {{$message}} @enderror</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

        @if($data)
        <table class="table table-dark" id="myTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Nmae</th>
                <th scope="col">Mobile</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$value)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$value->fname}}</td>
                    <td>{{$value->lname}}</td>
                    <td>{{$value->mobile}}</td>
                    <td><a href="{{url('')}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{url('delete_record/')}}/{{$value->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</body>
</html>