<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div id="app">
        <hello-vue></hello-vue>
    </div>
    <form action="{{ route('uploadTrack') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="track" accept=".mp3">
        <input type="submit" value="SDSDSD">
    </form>
</body>
</html>
