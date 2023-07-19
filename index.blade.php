<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
    body{
        background-color: rgb(255, 185, 237);
    }
</style>
</head>
<body>
    <div class="container">
        <header class="modal-header"><h2>Student Management</h2></header>
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
            <input type="radio" name="gen" value="Male">Male
            <input type="radio" name="gen" value="Female">Female
        </div>
        <div class="form-group">
            <select name="lang[]" id="lang" multiple>
                <option disabled>--couse a field--</option>
                <option>Bengali</option>
                <option>Hindi</option>
                <option>English</option>
            </select>
        </div>
        <div class="form-group">
            <input type="checkbox" name="ch_all" id="ch_all" onclick="selectAll()">Select All
            <input type="checkbox" name="ch[]" id="ch1" value="10th">10 <sub>th</sub>
            <input type="checkbox" name="ch[]" id="ch2" value="12th">12 <sub>th</sub>
            <input type="checkbox" name="ch[]" id="ch3" value="Gradutation">Gradutation
            <input type="checkbox" name="ch[]" id="ch4" value="Post Gradutation">Post Gradutation
        </div>
        <script>
            function selectAll(){
                var ch_all=document.getElementById("ch_all");
                var ch1=document.getElementById("ch1");
                var ch2=document.getElementById("ch2");
                var ch3=document.getElementById("ch3");
                var ch4=document.getElementById("ch4");
                if(ch_all.checked){
                    ch1.checked=ch2.checked=ch3.checked=ch4.checked=true;
                }else{
                    ch1.checked=ch2.checked=ch3.checked=ch4.checked=false;
                }
            }
            
        </script>
        <div class="form-group">
            <label for="image">Student Picture</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
            <img alt="no image" id="preview" width="100px" height="100px" class="img-thumbnail" style="display: none">
        </div>
        <script>
            $(document).ready(function(){
                $("#avatar").change(function(){
                    var preview=$("#preview");
                    if(this.files && this.files[0]){
                        preview[0].src=URL.createObjectURL(this.files[0]);
                        preview.show();
                    }else{
                        preview.hide();
                    }
                })
            });
        </script>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="pass" id="pass" class="form-control">
        </div>
                <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" name="pass.c" id="pass.c" class="form-control">
        </div>
        <input type="submit" class="btn btn-outline-success" value="sign up">
        </form>
    </div>
</body>
</html>