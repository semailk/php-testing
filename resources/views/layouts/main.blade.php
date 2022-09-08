<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    #cof {
        transition: 1s;
    }
    #cof:hover {
        color: red;
    }

    .links {
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }
    .links a{
        text-decoration: none;
        font-size: 24px;
        margin: 20px;
    }
</style>
<body>
<div class="links">
    <a href="{{ route('cats.index') }}">CATS</a>
    <a href="{{ route('coffees.index') }}">COFFEES</a>
</div>
@yield('content')

</body>
</html>
