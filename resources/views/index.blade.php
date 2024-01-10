<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
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
        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        #preview {
            display: block;
            margin-top: 10px;
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
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <header class="modal-header">
            <h2 class="text-primary">Student Registration</h2>
        </header>
        <form action="{{url('/insert')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div class="form-check">
                    <input type="radio" name="gen" value="Male" class="form-check-input">
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gen" value="Female" class="form-check-input">
                    <label class="form-check-label">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="lang">Languages</label>
                <select name="lang[]" id="lang" multiple class="form-control">
                    <option disabled selected>-- Choose Language(s) --</option>
                    <option>Bengali</option>
                    <option>Hindi</option>
                    <option>English</option>
                </select>
            </div>
            <div class="form-group">
                <label>Qualifications</label>
                <div class="form-check">
                    <input type="checkbox" name="ch_all" id="ch_all" onclick="selectAll()" class="form-check-input">
                    <label class="form-check-label">Select All</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="ch[]" id="ch1" value="10th" class="form-check-input">
                    <label class="form-check-label">10th</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="ch[]" id="ch2" value="12th" class="form-check-input">
                    <label class="form-check-label">12th</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="ch[]" id="ch3" value="Graduation" class="form-check-input">
                    <label class="form-check-label">Graduation</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="ch[]" id="ch4" value="Post Graduation" class="form-check-input">
                    <label class="form-check-label">Post Graduation</label>
                </div>
            </div>
            <div class="form-group">
                <label for="avatar">Student Picture</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
                <img alt="No image" id="preview" width="100px" height="100px" class="img-thumbnail" style="display: none">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="pass" id="pass" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" name="pass_confirmation" id="pass_confirmation" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary btn-signup" value="Sign Up">
              <a href="{{url('/signin')}}" class="login-btn">Already have an account? Log in</a>
        </form>
    </div>

    <script>
        function selectAll() {
            var ch_all = document.getElementById("ch_all");
            var ch1 = document.getElementById("ch1");
            var ch2 = document.getElementById("ch2");
            var ch3 = document.getElementById("ch3");
            var ch4 = document.getElementById("ch4");
            
            if (ch_all.checked) {
                ch1.checked = ch2.checked = ch3.checked = ch4.checked = true;
            } else {
                ch1.checked = ch2.checked = ch3.checked = ch4.checked = false;
            }
        }

        $(document).ready(function(){
            $("#avatar").change(function(){
                var preview = $("#preview");
                if (this.files && this.files[0]){
                    preview[0].src = URL.createObjectURL(this.files[0]);
                    preview.show();
                } else {
                    preview.hide();
                }
            });
        });
    </script>
</body>
</html>
