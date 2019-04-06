<?php
    if(isset($_GET["logout"])){
        session_start();
        $_SESSION["tid"] = null;
        header('location:./');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                <a class="nav-link user-name" href="./display-result.php">Generate Theory Paper</a>
            </li>
            <li class="nav-item">
                <a class="nav-link user-name" href="./genrate-the-paper.php">MCQ Exam Result</a>
            </li>
            <li class="nav-item">
            <form>
                    <button class="user-logout nav-link btn btn-primary" type="submit" name="logout">Logout</button>
                </form>
            </li>
            </ul>
        </div>
    </nav>
    <?php
        session_start();
        require ('./api/connection.php');
        $sql = "SELECT * FROM result";
        $result = $con->query($sql);
        $res = null;
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $res[$i] = $row;
            $sql2 = "SELECT `name` from `student` where sid=".$row["sid"];
            $result2 = $con->query($sql2);
            while($row2 = $result2->fetch_assoc()){
                $res[$i]["name"] =  $row2["name"];
                break;
            }
            $sql3 = "SELECT `subject` from `questionbank` where qbid=".$row["qbid"];
            $result3 = $con->query($sql3);
            while($row3 = $result3->fetch_assoc()){
                $res[$i]["subject"] =  $row3["subject"];
                break;
            }
            $i++;
        }
    ?>
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Marks</th>
                </tr>   
            </thead>
            <tbody class="append-data">
                <?php
                    for($i=0;$i<sizeof($res);$i++){
                        $lala = '<tr><th scope="row">'.$res[$i]["name"].'</th><td>'.$res[$i]["subject"].'</td><td>'.$res[$i]["marks"].'</td></tr>';
                        echo $lala;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>