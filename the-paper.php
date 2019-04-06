<?php
    $id = explode(",",$_GET["id"]);

    session_start();
    error_reporting(0);
    require ('./api/connection.php');
    $sql = "SELECT * FROM thquestion";
    $result = $con->query($sql);
    $res = null;
    $i = 0;
    while($row = $result->fetch_assoc()) {
        if($row["qid"] == $id[$i]){
            $res[$i] = $row;
            $i++;
        }
    }
    //print_r($res);
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
        <h1>Theory Papers</h1>
    </div>
        <div class="card-columns past">
            <?php
            for($i=0;$i<$_GET["count"];$i++){
                shuffle($res);
                echo '<div class="text-center"><p class="card-text"><h2>PAPER'.($i+1).'</h2></p></div>
                <div class="card bg-success que'.$i.'" style="padding:20px;">';
                for($j=0;$j<$_GET["qcount"];$j++){
                    // echo $res[$j]["que"];
                    // echo $res[$j]["marks"];
                    // echo "<br>";
                    $lala = '<div class="card-body">
                    <p class="card-text que">'.$res[$j]["que"].'  <b>['.$res[$j]["marks"].']</b></p>
                </div>';
                echo $lala;
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>