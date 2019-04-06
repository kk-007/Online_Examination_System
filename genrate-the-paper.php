<?php
    if(isset($_GET["logout"])){
        session_start();
        $_SESSION["tid"] = null;
        header('location:./');
    }
?>
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
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link user-name" href="#"></a>
            </li>
            <li class="nav-item">
            <form>
                    <button class="user-logout nav-link btn btn-primary" type="submit" name="logout">Logout</button>
                </form>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="form">
            <div class="form-group">
                <label for="no">No OF Question Paper:</label>
                <input type="text" class="form-control no" id="no" placeholder="Enter Number Of paper" name="name">
            </div>
            <div class="form-group">
                <label for="no">No OF Questions:</label>
                <input type="text" class="form-control qno" id="qno" placeholder="Enter Number Of questions" name="name">
            </div>
        </div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Subject</th>
                    <th scope="col">generate</th>
                </tr>
            </thead>
            <tbody class="append-data">
            </tbody>
        </table>
    </div>
    <script>
        res = null;
        function itemClick(e){
            if($('.no').val() == 0 || $('.qno').val() == 0){
                alert('Enter All The Field');
            }else{
                let ids = res[e.className-1]["qids"];
                let id = ids.split(',');
                window.location.href = "./the-paper.php?id="+ids+"&count="+$('.no').val()+"&qcount="+$('.qno').val();
            }
        }
        $(document).ready(function(){
            $('.create-bank').on('click',()=>window.location.href = "./create_qbank.php");
            $.ajax({
                url:"./api/qbfetch.php",
                type: "get",
                success: function(data){
                    res = JSON.parse(data);
                    console.log(k = <?php session_start(); echo json_encode($_SESSION["tid"]); ?>);
                    for(let i = 0;i<res.length;i++){
                        if(res[i].tid == k && res[i].mcq == 0){
                            let lala = '<tr><th scope="row">'+res[i].subject+'</th><td><button onclick="itemClick(this)" class="'+res[i].qbid+'">Generate</button></td></tr>';
                            $('.append-data').append(lala);
                        }
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    </script>
</body>
</html>