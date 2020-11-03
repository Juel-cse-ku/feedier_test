<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
<p>Dear Admin,</p>
@if($answer_count == 0)
    <p>You have received no answer for the last 48 hours of you text question</p>
@else
    <p>You have received {{$answer_count}} answers for the last 48 hours of your text question and last {{count($answers)}} answers are given below</p>
    <ol>
        @foreach($answers as $ans)
            <li>{{$ans->name}}</li>
        @endforeach
    </ol>
@endif
</body>
</html>
