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
    <form action={{ url('/save_detail') }} method="post" enctype="multipart/form">
        {{-- {{csrf_field()}} --}}
        @csrf()
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="" oncopy="return false"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value="" onpaste="return false"><br><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>