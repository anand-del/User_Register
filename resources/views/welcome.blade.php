<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: radial-gradient(circle, #4e4e4e 0%, #000000 100%);
            color: #fff;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 20px;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .login-register {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-register a {
            text-decoration: none;
            color: #fff;
            font-size: 1.2rem;
            margin: 10px;
            padding: 10px 20px;
            border: 2px solid #fff;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .login-register a:hover {
            background-color: #fff;
            color: #000;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 0.8rem;
        }

        @media screen and (min-width: 600px) {
            .container {
                padding: 0 50px;
            }

            .login-register {
                flex-direction: row;
            }

            .login-register a {
                margin: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">Welcome</div>
        <div class="login-register">
            <a href="{{ route('login') }}">Log in</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
        <div class="footer">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</body>

</html>
