<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

{{-- name :  {{ $n['name'] }} <br/>
email : {{ $n['email'] }} --}}
    {{--
        name :  {{ $name }}
        email : {{ $email }}
    --}}

    <div>
        
        <br/> Redirected From Multimedia <br/>
        {{10+25}} <br/>
        {{ strtolower('QDKHAN@live.coM') }} <br/>
        {{ strtoupper('qdkhan@live.coM') }}

    </div>

    <p>
        {{-- 
            @if(count($names > 0))
                <h2> The Value in Array is more than 0<h2>
            @endif
        --}}

        @for($i =0; $i<5; $i++)
            <h4>{{$i}}</h4>
        @endfor
    </p>
</body>
</html>