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
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link user-name" href="#"></a>
            </li>
            <li class="nav-item">
                <div class="user-logout"><a class="nav-link " href="#">Logout</a></div>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container main1">
        <div class="form">
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control subject" id="subject" placeholder="Enter Subject" name="name">
            </div>
            <label for="sel1">Type Of question : </label>
            <select class="form-control type" id="sel1">
                <option>MCQ</option>
                <option>Theory Based</option>
            </select>
            <div class="form-group">
                <label for="marks">Marks:</label>
                <input type="text" class="form-control marks" id="marks" placeholder="Enter Marks" name="name">
            </div>
            <div class="form-group">
                <label for="que-count">No Of Question:</label>
                <input type="text" class="form-control que-count" id="que-count" placeholder="How many question want to enter" name="name">
            </div>
            <button type="submit" class="btn btn-default btn-submit">Submit</button>
        </div>
    </div>
    <div class="container main2">
        <div class="form que-list">
            <!-- <div class="que1">
                <div class="form-group">
                    <label for="question">Question : </label>
                    <input type="text" class="form-control question" id="question" placeholder="Enter question" name="name">
                </div>
                <div class="form-group">
                    <label for="marks">Marks : </label>
                    <input type="text" class="form-control marks" id="marks" placeholder="Enter Marks of question" name="name">
                </div>
                <br>
            </div> -->
            <!-- <div class="que1">
                <div class="form-group">
                    <label for="question">Question : </label>
                    <input type="text" class="form-control question" id="question" placeholder="Enter question" name="name">
                </div>
                <div class="form-group">
                    <label for="op1">Option 1 : </label>
                    <input type="text" class="form-control op1" id="op1" placeholder="Enter option" name="name">
                </div>
                <div class="form-group">
                    <label for="question">Option 2 : </label>
                    <input type="text" class="form-control op2" id="op2" placeholder="Enter option" name="name">
                </div>
                <div class="form-group">
                    <label for="question">Option 3 : </label>
                    <input type="text" class="form-control op3" id="op3" placeholder="Enter option" name="name">
                </div>
                <div class="form-group">
                    <label for="question">Option 4 : </label>
                    <input type="text" class="form-control op4" id="op4" placeholder="Enter option" name="name">
                </div>
                <div class="form-group">
                    <label for="question">Answer : </label>
                    <input type="text" class="form-control ans" id="ans" placeholder="Enter answer" name="name">
                </div>
            </div> -->
        </div>
    </div>
    <script>
        subject = null;
        marks = null;
        mcq = 1;
        que_count = 0;
        que = new Array();

        class Question_mcq{
            constructor(que,op1,op2,op3,op4,ans){
                this.que = que;
                this.op1 = op1;
                this.op2 = op2;
                this.op3 = op3;
                this.op4 = op4;
                this.ans = ans;
            }
        }
        class Question_the{
            constructor(que,marks){
                this.que = que;
                this.marks = marks;
            }
        }
        $(document).ready(function(){
            $( ".type" ) .change(function () {
                let str = $('.type').val();
                if(str == "MCQ"){
                    mcq=1;
                }else{
                    mcq=0;
                }
            });
            $('.btn-submit').on('click',()=>{
                subject = $('.subject').val();
                marks = $('.marks').val();
                que_count = $('.que-count').val();
                if(mcq != 0){
                    for(let i=1;i<=que_count;i++){
                        let lala = '<div class="que'+i+'"><div class="form-group"><label for="question">Question : </label><input type="text" class="form-control question" id="question" placeholder="Enter question" name="name"></div><div class="form-group"><label for="op1">Option 1 : </label><input type="text" class="form-control op1" id="op1" placeholder="Enter option" name="name"></div><div class="form-group"><label for="question">Option 2 : </label><input type="text" class="form-control op2" id="op2" placeholder="Enter option" name="name"></div><div class="form-group"><label for="question">Option 3 : </label><input type="text" class="form-control op3" id="op3" placeholder="Enter option" name="name"></div><div class="form-group"><label for="question">Option 4 : </label><input type="text" class="form-control op4" id="op4" placeholder="Enter option" name="name"></div><div class="form-group"><label for="question">Answer : </label><input type="text" class="form-control ans" id="ans" placeholder="Enter answer" name="name"></div></div><hr>';
                        $('.que-list').append(lala);
                    }
                    $('.que-list').append("<center><button class=\"btn btn-primary upload\">Create</button></center>");
                    $('.upload').on('click',function(){
                        // console.log('test' + que_count);
                        for(let i=1;i<=que_count;i++){
                            let temp = '.que'+i;
                            let que_temp = new Question_mcq($(temp+' .question').val(),$(temp+' .op1').val(),$(temp+' .op2').val(),$(temp+' .op3').val(),$(temp+' .op4').val(),$(temp+' .ans').val());
                            que.push(que_temp);
                        }
                        var res = {
                            "sub" : subject,
                            "mcq" : marks,
                            "que" : que
                        }
                        $.ajax({
                            url:"./api/qbcreate.php",
                            type: "post",
                            data: res,
                            success: function(data){
                                console.log(data);
                                alert(data);
                                window.location.href = "./teacher-dashboard.php";
                            },
                            error: function(data){
                                console.log(data);
                            }
                        });
                    });
                }else{
                    for(let i=1;i<=que_count;i++){
                        let lala = '<div class="que'+i+'"><div class="form-group"><label for="question">Question : </label><input type="text" class="form-control question" id="question" placeholder="Enter question" name="name"></div><div class="form-group"><label for="marks">Marks : </label><input type="text" class="form-control marks" id="marks" placeholder="Enter Marks of question" name="name"></div><br></div>';
                        $('.que-list').append(lala);
                    }
                    $('.que-list').append("<center><button class=\"btn btn-primary upload\">Create</button></center>");
                    $('.upload').on('click',function(){
                        for(let i=1;i<=que_count;i++){
                            let temp = '.que'+i;
                            let que_temp = new Question_the($(temp+' .question').val(),$(temp+' .marks').val());
                            que.push(que_temp);
                        }
                        var res = {
                            "sub" : subject,
                            "mcq" : mcq,
                            "que" : que
                        }
                        $.ajax({
                            url:"./api/qbcreate.php",
                            type: "post",
                            data: res,
                            success: function(data){
                                console.log(data);
                                alert(data);
                                window.location.href = "./teacher-dashboard.php";
                            },
                            error: function(data){
                                console.log(data);
                            }
                        });
                    });
                }
            });
        });
    </script>
</body>
</html>