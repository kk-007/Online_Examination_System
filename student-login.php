<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online_Examination_System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="form">
            <div class="form-group">
                <label for="email">User ID:</label>
                <input type="text" class="form-control uid" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control pass" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default btn-submit">Submit</button>
        </div>
        <div class="msg"></div>
        <center>
            <button class="btn btn-primary register">Register</button>
        </center>
    </div>
    <script>
        $(document).ready(function(){
            $('.register').on('click',()=>{
                window.location.href = "./student-register.html";
            });
            $('.btn-submit').on('click',function(){
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
                            <?php
                                session_start();
                                $_SESSION["st"] = 0;
                                $_SESSION["sid"] = "test";
                            ?>
                            // $('.msg').html('');
                            // $('.msg').html("<div class=\"alert alert-primary\" role=\"alert\">Login Successfully</div>");
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