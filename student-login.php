<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online_Examination_System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="./">Online Examination System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container">
        <div class="form">
            <div class="form-group">
                <label for="email">User ID:</label>
                <input type="text" class="form-control uid" id="email" placeholder="Enter userId" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control pass" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary btn-submit">Submit</button>
        </div>
        <div class="msg"></div>
        <center>
            <button class="btn btn-primary register btn-primary">Register</button>
        </center>
    </div>
    <script>
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        function setCookie(id,pass){
            var d = new Date();
            d.setTime(d.getTime() + (7*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = "suid" + "=" + id + ";" + expires + ";path=/";
            document.cookie = "spass" + "=" + pass + ";" + expires + ";path=/";
        }
        $(document).ready(function(){
            $('.uid').val(getCookie("suid"));
            $('.pass').val(getCookie("spass"));
            $('.register').on('click',()=>{
                window.location.href = "./student-register.html";
            });
            $('.btn-submit').on('click',function(){
                var checked = $('input[type="checkbox"]').prop("checked");
                if(checked){
                    setCookie($('.uid').val(),$('.pass').val());
                }else{
                    if(confirm("You want to Save Password")){
                        setCookie($('.uid').val(),$('.pass').val());
                    }else{
                        setCookie("","");
                    }
                }
                $.ajax({
                    url:"./api/slogin.php",
                    type: "get",
                    data: {
                        "id": $('.uid').val(),
                        "pass": $('.pass').val()
                    },
                    success: function(data){
                        var res = JSON.parse(data);
                        if(res.status){
                            window.location.href = "./student-dashboard.php";
                        }else{
                            $('.msg').html('');
                            $('.msg').html("<div class=\"alert alert-danger\" role=\"alert\">Enter Correct Details</div>");
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
</body>
</html>