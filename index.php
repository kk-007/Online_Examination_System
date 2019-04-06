<?php
    session_start();
    if(isset($_SESSION["tid"])){
        header("location:./teacher-dashboard.php");
    }elseif(isset($_SESSION["sid"])){
        header("location:./student-dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Examination System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        html,body{
            height:100%;
        }
    </style>
</head>
<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="#">Online Examination System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            </ul>
        </div>
    </nav> -->
    <div class="jumbotron text-center">
        <h1>Online Examination System</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="card" style="width: 18rem; text-align: center;overflow: hidden;">
                    <img src="./img/teacher.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text btn btn-primary teacher">Teacher</p>
                    </div>
                </div>
            </div>
            <div class="col"></div>
            <div class="col">
                <div class="card" style="width: 18rem; text-align: center;overflow: hidden;">
                    <img src="./img/student.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text btn btn-primary student">Student</p>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script>
        $(document).ready(function (){
            $('.student').on('click',function(){
                window.location.href = "./student-login.php";
            });
            $('.teacher').on('click',function(){
                window.location.href = "./teacher-login.php";
            });
        })
    </script>
</body>
</html>