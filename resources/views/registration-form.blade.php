<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registration Form</h1>
    @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    @endif
    <form action={{ url('/save_detail') }} method="post" enctype="multipart/form">
        {{-- {{csrf_field()}} --}}
        @csrf()
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="{{old('fname')}}" oncopy="return false"><br>
        @error('fname') {{$message}} @enderror <br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value="{{old('lname')}}" onpaste="return false"><br>
        @error('lname') {{$message}} @enderror <br>
        <label for="lname">Mobile:</label><br>
        <input type="text" id="mobile" name="mobile" value="{{old('mobile')}}" onpaste="return false"><br><br>
        @error('mobile') {{$message}} @enderror <br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>