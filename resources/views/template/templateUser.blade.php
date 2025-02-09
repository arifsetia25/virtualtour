<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curug Cipeuteuy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .hero {
            background: url('assets/img/backgroung_login.jpeg') no-repeat center center/cover;
            height: 100%;
            position: relative;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-text {
            position: relative;
            z-index: 2;
            text-shadow: 3px 3px 5px #000000;
        }

        .navbar {
            background-color: transparent;
            padding: 25px;
            margin-left: 25px;
            margin-right: 50px;
        }

        .navbar a {
            color: #d9d9d9;
        }

        .navbar a:hover {
            color: #ffffff;
        }
    </style>
</head>

<body>
    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>