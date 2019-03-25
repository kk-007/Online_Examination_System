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
                    <th scope="col">No</th>
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Subject</th>
                </tr>   
            </thead>
            <tbody class="append-data">
            </tbody>
        </table>
        <center>
            <button class="btn btn-primary create-bank">+ Create</button>
        </center>
    </div>
    <script>
        $(document).ready(function(){
            $('.create-bank').on('click',()=>window.location.href = "./create_qbank.php");
            $.ajax({
                url:"./api/qbfetch.php",
                type: "get",
                success: function(data){
                    var res = JSON.parse(data);
                    console.log(res);
                    console.log(k = <?php session_start(); echo json_encode($_SESSION["tdata"]); ?>);
                    for(let i=0;i<res.length;i++){
                        name = "";
                        for(let y=0;y<k.length;y++){
                            if(k[y].tid == res[i].tid){
                                name = k[y].name;
                                break;
                            }
                        }
                        let lala = '<tr><th scope="row">'+res[i].qbid+'</th><td>'+name+'</td><td>'+res[i].subject+'</td></tr>';
                        $('.append-data').append(lala);
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