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
            let ids = res[e.className-1]["qids"];
            let id = ids.split(',');
            window.location.href = "./the-paper.php?id="+ids+"&count="+$('.no').val()+"&qcount="+$('.qno').val();
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