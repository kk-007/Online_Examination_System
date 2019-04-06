<?php
    session_start();
    error_reporting(0);

    $id = explode(",",$_GET["id"]);
    $marks = $_GET["marks"];
    $ans = null;

    require ('./api/connection.php');
    $sql = "SELECT * FROM mcquestion";
    $result = $con->query($sql);
    $res = null;
    $i = 0;
    while($row = $result->fetch_assoc()) {
        if($row["qid"] == $id[$i]){
            $res[$i] = $row;
            $i++;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <div class="jumbotron text-center">
        <h1>MCQ Exam</h1>
    </div>
        <div class="card-columns past">
            <?php
            shuffle($res);
                for($i=0;$i<$marks;$i++){
                    $ans[$i] = $res[$i]["ans"];
                    $lala = '<div class="card bg-success que'.$i.'" style="margin-bottom:20px;">
                                <div class="card-body">
                                    <p class="card-text">'.$res[$i]["que"].'</p>
                                    <label class="radio-inline"><input type="radio" name="optradio'.$i.'">'.$res[$i]["op1"].'</label><br>
                                    <label class="radio-inline"><input type="radio" name="optradio'.$i.'">'.$res[$i]["op2"].'</label><br>
                                    <label class="radio-inline"><input type="radio" name="optradio'.$i.'">'.$res[$i]["op3"].'</label><br>
                                    <label class="radio-inline"><input type="radio" name="optradio'.$i.'">'.$res[$i]["op4"].'</label><br>
                                </div>
                            </div>';
                    echo $lala;
                }
                echo "<center><button class='btn btn-primary' onclick='getans()'>Submit</button></center>";
            ?>
        </div>
    </div>
    <script>
        result = 0;
        function getans(){
            var selected = new Array();
            console.log(ans = <?php echo json_encode($ans); ?>);
            console.log(count= <?php echo $marks; ?>);
            for(let i=0;i<count;i++){
                let test = $(".que"+i+" :radio[name='optradio"+i+"']").index($(".que"+i+" :radio[name='optradio"+i+"']:checked"));
                selected.push(test);
            }
            jQuery.map(ans,(val,i)=>{
                ans[i] = val-1;
            });
            for(let i=0;i<ans.length;i++){
                if(ans[i] == selected[i]){
                    result++;
                }
            }
            alert("Your Result is : " + result);
            window.location.href = "./api/add_result.php?marks="+result;
        }
    </script>
</body>
</html>