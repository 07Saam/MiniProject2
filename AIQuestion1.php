<?php
    session_start();

    include 'Database.php';
    if (isset($_COOKIE['A1'])) {
        $A1 = json_decode($_COOKIE['A1'], true);
        $Sem=$A1['Sem'];
        $Year=$A1['Year'];
        $Course=$A1['Course'];
        $SW=$A1['SW'];

    if (isset($_POST['SUB'])) {

            $SubId = $_POST['subject'];
            $Question = $_POST['que'];
            echo "<footer>" . $Question . ', ' . $Sem . ', ' . $Year . ', ' . $SubId . ', ' . $SW . ', ' . $Course . "</footer>";

            $Sql = "INSERT INTO questions (Question, Semester,Year,Sub_Id,S_W, Course) VALUES ('$Question', '$Sem', '$Year', '$SubId', '$SW', '$Course');";
            if (mysqli_query($conn, $Sql)) {
                echo "<script>alert('Inserted Successfully!')</script>";
            } else {
                echo "Error: " . $Sql . "<br>" . mysqli_error($conn);
            }
        }
        header("Location:AIQuestion.php");
        exit();
    }
    
?>