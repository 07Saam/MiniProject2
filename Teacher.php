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
<?php
       include "../inc/dbinfo.inc"; 
        if (!$conn) {
            die("Error error" . mysql_error());
        }
    ?>
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
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
        <table>
        <form method='post' action=''>
        <tr><td><label >Course</label></td>
        <td><select id='course'name='course'  class="w-100">
            <option value='' disabled selected>Select Course</option>
            <option value='MCA'>MCA</option>
            <option value='MBA'>MBA</option>
        </select></td></tr>
        <tr><td colspan="2"><div class="row">
            <div class="col-3"></div>
            <div class="col-6"><input type=submit name='cour'value='Go' class="w-100"></div>
            <div class="col-3"></div>
        </div></td></tr>
        <?php
            global $Course;
            if(isset($_POST['cour']))
            {
                $Course=$_POST['course'];
            }
             $sql="Select Subject_Id,Subject from subjects where Course='$Course'";
             $result=mysqli_query($conn,$sql);
             while ($row = $result->fetch_assoc()) {
                 $options[] = $row;
             }
             setcookie('C',$Course, time() + 86400);
        ?>
    </form>
    <form action='Teacher1.php'method='post'>
        <tr><td><label> Subject :</label></td>
        <td><select id='subject' name='subject' class="w-100">
            <option value='' disabled selected>Select Subject</option>
            <?php
                foreach ($options as $option) {
                    echo '<option value="' . $option['Subject_Id'] . '">' . $option['Subject'] . '</option>';
                }
                ?>
        </select></td></tr>
        <tr><td><label>Year :</label></td>
        <td><select id='year' name='year' class="w-100">
            <option value='' disabled selected>Select Year</option>
            <option value='2017'>2017</option>
            <option value='2018'>2018</option>
            <option value='2019'>2019</option>
            <option value='2020'>2020</option>
            <option value='2021'>2021</option>
            <option value='2022'>2022</option>
        </select></td></tr>
        <tr><td><input type='submit' value='View Unanswered' name='unans' class="w-100"></td>
        <td><input type='submit' value='View Answered' name='ans' class="w-100"></td></tr>
        
    </form>
    </table>
    </div>
        <div class="col-4"></div>
    </div>
    
    
    </section>  
</body>

</html>
