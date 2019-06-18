<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$publication->title}}</title>
</head>
<body>

    <div class="container" style="height: 100vh;">
        <embed src="{{asset('assets/publications/' . $publication->publication)}}" type="application/pdf" width="100%" height="100%">
    </div>

</body>
</html>
