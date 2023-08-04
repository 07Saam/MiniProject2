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
    <div class="container mt-5 me-0">
        
        <br>
        <h4>View Answers </h4>
        <br>
        <table>
            <form method='post' action=''>
                <tr>
                    <td><label> Course :</label></td>
                    <td><select id='course' name='course' class="w-75">
                            <option value='' disabled selected>Select Course</option>
                            <option value='MCA'>Masters of Computer Application</option>
                            <option value='MBA'>Masters of Buissness Administration</option>
                        </select></td>
                    
                </tr>
                <tr>
                    <td><label> Year :</label></td>
                    <td><select id='year' name='year' class="w-75">
                            <option value=null disabled selected>Select Year</option>
                            <option value='2017'>2017</option>
                            <option value='2018'>2018</option>
                            <option value='2019'>2019</option>
                            <option value='2020'>2020</option>
                            <option value='2021'>2021</option>
                            <option value='2022'>2022</option>
                        </select></td></tr>
                       <tr> <td colspan="2"> <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"><input type="submit" name='cou' value='Go'></div>
                        <div class="col-4"></div>
                       </div></td></tr>

            </form>
            <script>
                function myFunc(){
                    let course = document.getElementById('course').value;
                    document.getElementById('course').innerHTML = course;
                }
            </script>
            <form method='post' action='view1.php'>
                <?php
               include "../inc/dbinfo.inc"; 
                if (!$conn) {
                    die("Error error" . mysql_error());
                }
                global $Course;
                if (isset($_POST['cou'])) {
                    $Course = $_POST['course'];
                    $Year=$_POST['year'];
                    $user_data = array(
                        'Course' => $Course,
                        'Year' => $Year
                    );
                    $json_data = json_encode($user_data);
                    setcookie('D',  $json_data,time() + 86400);
                }
                    //echo '<h1>'.$Course.'</h1>';
                    $Query = "SELECT Subject_Id, Subject FROM subjects WHERE Course='$Course'";
                    $options = array();
                    $result = mysqli_query($conn, $Query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $options[] = $row;
                        }
                    }
                ?>
                    <tr>
                        <td><label> Subject :</label></td>
                        <td><select id='subject' name='subject' class="w-75">
                                <option selected disabled value="">Select Subject</option>
                                <?php
                                foreach ($options as $option) {
                                    echo '<option value="' . $option['Subject_Id'] . '">' . $option['Subject'] . '</option>';
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr> <td colspan="2"> <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"><button type='submit' name='submit'>Submit</button></div>
                        <div class="col-4"></div>
                       </div></td></tr>
                      
                </form>
          
        </table>
     
    </div>
</body>

</html>