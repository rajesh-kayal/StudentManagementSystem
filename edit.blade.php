<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <header class="modal-header"><h2>Student Management</h2></header>
        <form action="{{url('/update')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" name="phone" id="phone" value="{{$user->phone}}" class="form-control">
        </div>
                <div class="form-group">
            <label for="gender">Gender</label>
            <input type="radio" name="gen" value="Male" @if($user->gender=='Male'){{'checked'}} @endif>Male
            <input type="radio" name="gen" value="Female" @if($user->gender=='Female'){{'checked'}} @endif>Female
        </div>
        <?php
                $languages=$user->languages;
                $languages=explode(',',$languages);
                ?>
        <div class="form-group">
            <select name="lang[]" id="lang" multiple>
                <option disabled>--couse a field--</option>
                <option @if (in_array('Bengali',$languages)){{'selected'}}
                @endif>Bengali</option>
                <option @if (in_array('Hindi',$languages)){{'selected'}}
                @endif>Hindi</option>
                <option @if (in_array('English',$languages)){{'selected'}}
                @endif>English</option>
            </select>
        </div>
                <?php
                $qualifications=$user->qualifications;
                $qualifications=explode(',',$qualifications);
                ?>
        <div class="form-group">
            <input type="checkbox" name="ch_all" id="ch_all" onclick="selectAll()">Select All
            <input type="checkbox" name="ch[]" id="ch1" value="10th" @if (in_array('10th',$qualifications)){{'checked'}}
                @endif>10 <sub>th</sub>
            <input type="checkbox" name="ch[]" id="ch2" value="12th" @if (in_array('12th',$qualifications)){{'checked'}}
                @endif>12 <sub>th</sub>
            <input type="checkbox" name="ch[]" id="ch3" value="Gradutation" @if (in_array('Gradutation',$qualifications)){{'checked'}}
                @endif>Gradutation
            <input type="checkbox" name="ch[]" id="ch4" value="Post Gradutation" @if (in_array('Post Gradutation',$qualifications)){{'checked'}}
                @endif>Post Gradutation
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
            <img  src="{{asset('/images')}}/{{$user->picture}}" ="no image" id="preview" width="100px" height="100px" class="img-thumbnail">
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
        <input type="hidden" name="hid" value="{{$user->id}}">
        <input type="submit" class="btn btn-outline-Info" value="Update">
        </form>
    </div>
</body>
</html>