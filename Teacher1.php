<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login | Q&A Repository</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="Rcss1.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Documentations/SPPU_PNG.webp">
</head>

<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-info" href="Login.php">SPPU Q&A Repository</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <?php
            if (isset($_Session)) {
            ?>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="px-2"><a href="Login.php" class="text-white fs-6 fw-light">Logout</a></li>

                    </ul>
                </div>
            <?php
            }
            ?>
        </div>
    </nav>
    <section>
    <br><br>
    <?php
   include "../inc/dbinfo.inc"; 
    if (!$conn) {
        die("Error error" . mysql_error());
    }
    global $Course;
    if (isset($_COOKIE['C'])) {
        $Course = $_COOKIE['C'];
    }
    //For Answered Questions
    if (isset($_POST['ans'])) {

        $Year = $_POST['year'];
        $Subject = $_POST['subject'];
        //Used To Send Data to Next One.......
        $user_data = array(
            'Course' => $Course,
            'Year' => $Year,
            'Subject' => $Subject,
            'A' => '1'
        );
        $json_data = json_encode($user_data);
        setcookie('R', $json_data, time() + 86400);
        
        $sql = "Select Q_Id,Question,Semester,Year,S_W from questions where Year='$Year' && Sub_Id='$Subject' && Course='$Course' && EXISTS (Select DISTINCT(Q_ID) from answers WHERE answers.Q_ID = questions.Q_Id)";
        echo "<header><a href='WUAns.php'>Write Answer</a></header>";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Question_ID</th><th>Question</th><th>Semester</th><th>Year</th><th>Summer/Winter (1/0) </th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Q_Id"] . "</td>";
                echo "<td>" . $row["Question"] . "</td>";
                echo "<td>" . $row["Semester"] . "</td>";
                echo "<td>" . $row["Year"] . "</td>";
                echo "<td>" . $row["S_W"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
    }
    //For UnAnswered Questions
    if (isset($_POST['unans'])) {
        setcookie('A', 2, time() + 86400);
        $Year = $_POST['year'];
        $Subject = $_POST['subject'];
         //Used To Send Data to Next One.......
        $user_data = array(
            'Course' => $Course,
            'Year' => $Year,
            'Subject' => $Subject,
            'A' => '2'
        );
        $json_data = json_encode($user_data);
        setcookie('R', $json_data, time() + 86400);

        $sql = "Select Q_Id,Question,Semester,Year,S_W from questions where Year='$Year' && Sub_Id='$Subject' && Course='$Course' && NOT EXISTS (Select DISTINCT(Q_ID) from answers WHERE answers.Q_ID = questions.Q_Id)";
        echo "<header><a href='WUAns.php'>Write Answer</a></header>";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Question_ID</th><th>Question</th><th>Semester</th><th>Year</th><th>Summer/Winter (1/0) </th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Q_Id"] . "</td>";
                echo "<td>" . $row["Question"] . "</td>";
                echo "<td>" . $row["Semester"] . "</td>";
                echo "<td>" . $row["Year"] . "</td>";
                echo "<td>" . $row["S_W"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
    }
    ?>
    </section>