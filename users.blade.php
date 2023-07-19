<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="continer-fluid">
                @if (session()->has('message'))
            @if(session()->get('message')=='success')
            <div class="alert alert-success">One user profile has been updated</div>
            @elseif (session()->get('message')=='delete')
            <div class="alert alert-info">One user profile has been deleted</div>
            @elseif (session()->get('message')=='error')
            <div class="alert alert-danger">Unabel to perform task</div>
            @endif
        @endif
        <header class="modal-header">
            <div class="float-right">Welcome <sup>{{session('USER')}}</sup><a href="{{url('/logout')}}" class="btn btn-sm btn-danger">Logout</a></div><h4>Students Info:</h4></header>
        <table class="table table-responsive table-hover table-bordered bg-light text-dark">
            @if(isset($userInfo))
            <tr>
                <th>Sl/</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Student Phone Number</th>
                <th>Student Gender</th>
                <th>Student Language</th>
                <th>Student Qualifications</th>
                <th>Student <Picture>picture</Picture></th>
                <th>Action</th>
            </tr>
            @php
                    $i=1
                @endphp
                @foreach ($userInfo as $user)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$user->name}}</td>
                <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                <td><a href="tell:{{$user->phone}}">{{$user->phone}}</a></td>
                <td>{{$user->gender}}</td>
                <td>{{$user->languages}}</td>
                <td>{{$user->qualifications}}</td>
                <td><img src="{{asset('/images')}}/{{$user->picture}}" alt="no img" width="100px" height="100px" title="{{$user->name}}"></td>
                <td><a href="{{url('/edit')}}/{{$user->id}}" class="btn btn-sm btn-outline-dark">Edit</a> | 
                <a href="{{url('/delete')}}/{{$user->id}}" class="btn btn-sm btn-outline-dark">delete</a></td>
            </tr>
            @endforeach
        </table>
        <div>
            {{$userInfo->links()}}
        </div>
        @endif
    </div>
</body>
</html>