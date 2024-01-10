<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /* Custom Styles */
        body {
            padding: 20px;
            margin: 0;
            background-image: url("{{ asset('bg/bg3.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            color: #fff;
        }
        header h4 {
            font-weight: bold;
        }
        .student-table {
            text-align: center;
            color: #333;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            overflow-x: auto;
        }
        .student-table th {
            text-align: center;
            vertical-align: middle;
        }
        .student-table img {
            max-width: 100px;
            height: auto;
            border-radius: 50%;
        }
        .pagination {
            justify-content: right;
        }
        .page-link {
            color: #6c63ff;
        }
        .page-item.active .page-link {
            background-color: #6c63ff;
            border-color: #6c63ff;
        }
        .btn-signup {
            width: 100%;
            margin-top: 10px;
            background-color: #6c63ff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-signup:hover {
            background-color: #504aca;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h4>Students Info:</h4>
            <div class="d-flex align-items-center">
                <span class="mr-3">Welcome <sup>{{ session('USER') }}</sup></span>
                <a href="{{ url('/logout') }}" class="btn btn-sm btn-danger" title="{{ session('USER') }}">Logout</a>
            </div>
        </header>

@if (session()->has('message'))
    @if (session()->get('message') == 'success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            One user profile has been updated
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session()->get('message') == 'delete')
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            One user profile has been deleted
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session()->get('message') == 'error')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Unable to perform the task
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endif


        @if (isset($userInfo))
            <div class="table-responsive student-table">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>SL.</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Phone Number</th>
                            <th>Student Gender</th>
                            <th>Student Language</th>
                            <th>Student Qualifications</th>
                            <th>Student Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($userInfo as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$user->name}}</td>
                                <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                                <td><a href="tel:{{$user->phone}}">{{$user->phone}}</a></td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->languages}}</td>
                                <td>{{$user->qualifications}}</td>
                                <td><img src="{{asset('/images')}}/{{$user->picture}}" alt="No img" title="{{$user->name}}"></td>
                                <td>
                                    <a href="{{url('/edit')}}/{{$user->id}}" class="btn btn-sm btn-outline-dark">Edit</a>
                                    <a href="{{url('/delete')}}/{{$user->id}}" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{$userInfo->links()}}
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-oU1Jr1k0LzXtT7H6JvZ8Onz+0Vz6d5tE73zUu8+lyPg=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
