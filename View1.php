<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <head lang="en">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Home | Q&A Repository</title>
        <link rel="icon" type="image/x-icon" href="Documentations/SPPU_PNG.webp">
        <link href="Rcss1.css" rel="stylesheet">
        <script>
        </script>
        <style>
            	body{
            		background-image: linear-gradient(to right, #c0d1c2, #c0d1c2);
            	}
            	table{
                    margin: 5%;
                    border: 3px solid black;
                }
                td,th{
                    border: 2px dashed black;
                }
                td{
                    padding-left: 5px;
                    padding-right: 5px;
                }
                tr{
                    padding-top: 10px;
                    padding-bottom: 10px;
                }
            </style>
    </head>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-info" href="Login.php">SPPU Q&A Repository</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span>
            </button>
            <?php
            if (isset($_SESSION['Stu_id']) && $_SESSION['Stu_id'] === true) {
            echo '
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="px-2"><a href="Login.php" class="text-white fs-6 fw-light">Logout</a></li>

                    </ul>
                </div>';
            }
            ?>
        </div>
    </nav>
    <br><br>
    <section>
        
<?php
     include "../inc/dbinfo.inc"; 
     if(!$conn)
     {
         die ("Error error".mysql_error());                
     }  
     if (isset($_COOKIE['D'])) {
        $A = json_decode($_COOKIE['D'], true);
        $Course=$A['Course'];
        $Year=$A['Year'];
     }
     if(isset($_POST['submit']))
     {
        $Sub_Id=$_POST['subject'];
        $sql="SELECT questions.Q_Id,questions.Question,answers.answer,faculty.First_name,faculty.Last_name FROM questions Left JOIN answers ON questions.Q_ID = answers.Q_Id left JOIN faculty ON answers.f_id=faculty.F_Id where questions.Course='$Course'&& questions.Year='$Year' && questions.Sub_Id='$Sub_Id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h1 style='text-align:center;'>Answers are:-</h1><table >";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th>Id " . $row["Q_Id"] . "</th>";
                echo "<th>" . $row["Question"] . "</th>";
                echo "</tr><tr>";
                if (isset($row['answer'])){
                echo "<td>Answer:</td><td>" . $row["answer"] . "</td>";
                echo "</tr><tr><td>By-</td><th> " . $row["First_name"] . " ".$row["Last_name"]."</th>";
                echo "</tr>";
                }
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
     }?>
     <section>
     </body>
</html>