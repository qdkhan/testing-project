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
    <div class="container">
        <div class="row">
        <h1>Update Form</h1>
            <div class="col-sm-4">
                @if($errors->any())
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                @endif
                <form action="{{url('edit_record')}}/{{$data->id}}" method="post" enctype="multipart/form" >
                {{-- {{csrf_field()}} --}}
                    @csrf()
                    <div class="form-group">
                    <label for="fname">First name:</label>
                        <input type="text" id="fname" class="form-control" name="fname" value="{{old('fname', $data->fname)}}" oncopy="return false" oncontextmenu="return false">
                        <small id="emailHelp" class="form-text text-muted">@error('fname') {{$message}} @enderror</small>
                    </div>
                    <div class="form-group">
                    <label for="lname">Last name:</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="{{old('lname', $data->lname)}}" onpaste="return false">
                        <small id="emailHelp" class="form-text text-muted">@error('lname') {{$message}} @enderror</small>
                    </div>
                    <div class="form-group">
                    <label for="lname">Mobile:</label>
                        <input type="number" minlength="10" class="form-control" id="mobile" name="mobile" value="{{old('mobile', $data->mobile)}}" onpaste="return false">
                        <small id="emailHelp" class="form-text text-muted">@error('mobile') {{$message}} @enderror</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>