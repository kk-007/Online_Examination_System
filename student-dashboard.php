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
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Subject</th>
                    <th scope="col">Marks</th>
                    <th scope="col">Start</th>
                </tr>
            </thead>
            <tbody class="append-data">
            </tbody>
        </table>
    </div>
    <script>
        res = null;
        function itemClick(e,i){
            let qbid = res[e.className-1]["qbid"];
            let ids = res[e.className-1]["qids"];

            var d = new Date();
            d.setTime(d.getTime() + (10*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = "qbid" + "=" + qbid + ";" + expires + ";path=/";

            window.location.href = "./mcq-paper.php?id="+ids+"&marks="+res[i].mcq;
        }
        $(document).ready(function(){
            $.ajax({
                url:"./api/qbfetch.php",
                type: "get",
                success: function(data){
                    res = JSON.parse(data);
                    console.log(k = <?php session_start(); echo json_encode($_SESSION["sid"]); ?>);
                    for(let i = 0;i<res.length;i++){
                        if(res[i].mcq != 0){
                            let lala = '<tr><th scope="row">'+res[i].subject+'</th><th>'+res[i].mcq+'</th><td><button onclick="itemClick(this,'+i+')" class="'+res[i].qbid+'">Start Exam</button></td></tr>';
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