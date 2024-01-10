<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-image: url("{{ asset('bg/bg3.jpg') }}");
            background-size: cover;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 350px;
            max-width: 90%;
            text-align: center;
        }
        .login-container h3 {
            margin-bottom: 30px;
            color: #555;
        }
        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        .login-form input[type="email"]:focus,
        .login-form input[type="password"]:focus {
            outline: none;
            border-color: #6c63ff;
        }
        .login-form input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #6c63ff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-form input[type="submit"]:hover {
            background-color: #504aca;
        }
        .login-form .alert {
            margin-top: 20px;
            text-align: left;
            padding: 10px;
            background-color: #fed8d8;
            border: 1px solid #fbb6b6;
            border-radius: 4px;
            color: #b91c1c;
        }
        .login-form .alert.success {
            background-color: #d2f4d2;
            border: 1px solid #63ac63;
            color: #116611;
        }
        .login-form .form-check {
            text-align: left;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        @if (session()->has('message'))
            @if(session()->get('message')=='success')
            <div class="alert success">You have successfully signed up</div>
            @elseif (session()->get('message')=='error')
            <div class="alert">Signup unsuccessful</div>
            @endif
        @endif
        @if (session()->has('login'))
            @if(session()->get('login')=='success')
            <div class="alert success">You have successfully logged in</div>
            @elseif (session()->get('login')=='exists')
            <div class="alert">User does not exist</div>
            @elseif (session()->get('login')=='error')
            <div class="alert">Wrong Credentials!</div>
            @elseif (session()->get('login')=='logout')
            <div class="alert success">You have successfully logged out</div>
            @endif
        @endif
        <h3>Login Student Account</h3>
        <form class="login-form" action="{{url('/login')}}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="pass" placeholder="Password" required>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <input type="submit" value="Log in">
                            <a href="{{url('/')}}" class="signup-btn">Don't have an account? Sign up</a>
        </form>
    </div>
</body>
</html>
