<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($data as $track)
        <div>
            <p>{{ $track->name }}</p>
            <p>{{ $track->author }}</p>
            <p>
                <audio preload="metadata" controls src="{{ $track->path }}"></audio>
            </p>
        </div>
    @endforeach
</body>
</html>
