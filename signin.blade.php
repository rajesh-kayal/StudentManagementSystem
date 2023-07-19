<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    body{
        background-color: peachpuff;
    }
</style>
</head>
<body>
    <div class="container">
        @if (session()->has('message'))
            @if(session()->get('message')=='success')
            <div class="alert alert-success">You have successfully signup</div>
            @elseif (session()->get('message')=='error')
            <div class="alert alert-danger">Signup unsuccessfull</div>
            @endif
        @endif
            @if (session()->has('login'))
            @if(session()->get('login')=='success')
            <div class="alert alert-success">You have successfully login</div>
            @elseif (session()->get('login')=='exists')
            <div class="alert alert-warning">User dose not exists</div>
            @elseif (session()->get('login')=='error')
            <div class="alert alert-danger">Wrong Crendatiles!</div>
            @elseif (session()->get('login')=='logout')
            <div class="alert alert-success">You have successfully logout</div>
            @endif
        @endif
        <header class="modal-header"><h3>Login Student Account</h3></header>
        <form action="{{url('/login')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Log in" class="btn btn-outline-danger">
        </div>
    </form>
    </div>
</body>
</html>