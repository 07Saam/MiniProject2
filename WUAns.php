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
    <form method='post' action="">
        <?php
        include "../inc/dbinfo.inc"; 
        if (!$conn) {
            die("Error error" . mysql_error());
        }
        if (isset($_COOKIE['R'])) {
            $R = json_decode($_COOKIE['R'], true);
            $Course = $R['Course'];
            $Year = $R['Year'];
            $Subject = $R['Subject'];
            $A = isset($R['A']) ? $R['A'] : 0;
        }
        if ($A == '1') {
            ?>
            <label>Question: </label>
            <?php
            $sql = "Select Q_Id,Question from questions where Year='$Year' && Sub_Id='$Subject' && Course='$Course' && EXISTS (Select DISTINCT(Q_ID) from answers WHERE answers.Q_ID = questions.Q_Id)";
            $result = mysqli_query($conn, $sql);
            while ($row = $result->fetch_assoc()) {
                $options[] = $row;
            }
            ?>
            <select id='question' name='question'>
                <option value='' disabled selected>Select Question To Write Answer</option>
                <?php
                foreach ($options as $option) {
                    echo '<option value="' . $option['Q_Id'] . '">' . $option['Question'] . '</option>';
                }
                ?>
                <label>Enter Answer</label>
                <textarea name='answer'id='answer'></textarea>
                <input type="submit"value='Submit'name='Ans'>
                <?php
                if(isset($_POST['Ans']))
                {
                    $QID=$_POST['question'];
                    $ANS=$_POST['answer'];
                    //need F_Id
                    $F_Id = $_SESSION['F_Id']; 
                    $sql="Insert into answers(Answer,Q_Id,F_Id)Values('$ANS','$QID','$F_Id')";
                    $conn->query($sql);
                    if(!$conn->error){
                    echo "Answered succefully";
                }}
                ?>
        </form>
       <?php }
        else{
        ?>
        <label>Question: </label>
        <?php
        $sql = "Select Q_Id,Question from questions where Year='$Year' && Sub_Id='$Subject' && Course='$Course' && NOT EXISTS (Select DISTINCT(Q_ID) from answers WHERE answers.Q_ID = questions.Q_Id)";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
            $options[] = $row;
        }
        ?>
        <select id='question' name='question'>
            <option value='' disabled selected>Select Question To Write Answer</option>
            <?php
            foreach ($options as $option) {
                echo '<option value="' . $option['Q_Id'] . '">' . $option['Question'] . '</option>';
            }
            ?>
                <label>Enter Answer</label>
                <textarea name='answer'id='answer'></textarea>
                <input type="submit"value='Submit'name='Ans'>
                <?php
                if(isset($_POST['Ans']))
                {
                    $QID=$_POST['question'];
                    $ANS=$_POST['answer'];
                    //need F_Id
                    $F_Id = $_SESSION['F_Id']; 
                    $sql="Insert into answers(Answer,Q_Id,F_Id)Values('$ANS','$QID','$F_Id')";
                    $conn->query($sql);
                    if(!$conn->error){
                    echo "Answered succefully";
                }}
                ?>
        </form>
        <?php
        }
        ?>
        
    </select>
</body>

</html>