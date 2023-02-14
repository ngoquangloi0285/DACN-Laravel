<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404-error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center
        }
        .alert {
            position: absolute;
            top: 50%;
            transform: translate(0,-50%);
            text-align: center;
        }
        a {
            padding: 10px;
            background: #fff;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <div class="alert alert-danger" role="alert">
        <h1>Can't Find This Page!</h1>
        <a href="{{ route('/') }}">To Back Home</a>
    </div>
</body>

</html>
