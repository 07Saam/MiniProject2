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
    <style>
        h2,
        th,
        td {
            text-align: center;
        }
    </style>
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
    <br><br>
    <section>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <table>
                    <form method='post' action='' onsubmit="myFunc()">
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
                                    <option value='' disabled selected>Select Year</option>
                                    <option value='2017'>2017</option>
                                    <option value='2018'>2018</option>
                                    <option value='2019'>2019</option>
                                    <option value='2020'>2020</option>
                                    <option value='2021'>2021</option>
                                    <option value='2022'>2022</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label> Session :</label></td>
                            <td><select id='SW' name='SW' class="w-75">
                                    <option value='' disabled selected>Select Summer/Winter</option>
                                    <option value='0'>Winter</option>
                                    <option value='1'>Summer</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label> Semester :</label></td>
                            <td><select id='Sem' name='Sem' class="w-75">
                                    <option value='' disabled selected>Select Semester</option>
                                    <option value='1'>I</option>
                                    <option value='2'>II</option>
                                    <option value='3'>III</option>
                                    <option value='4'>IV</option>
                                    <option value='5'>V</option>
                                    <option value='6'>VI</option>
                                    <option value='7'>VII</option>
                                    <option value='8'>VIII</option>
                                    <option value='9'>IX</option>
                                    <option value='10'>X</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4"><input type='submit' value='Go' name='Submit' class="w-100">
                                    </div>
                                    <div class="col-4"></div>
                                </div>

                            </td>
                        </tr>
                    </form>
                    <script>
                        function myFunc() {
                            let course = document.getElementById('course');
                            let year = document.getElementById('year');
                            let sw = document.getElementById('SW');
                            let sem = document.getElementById('sem');
                        }
                    </script>
                    <form method='post' action='AIQuestion1.php'>
                        <?php
                        include "../inc/dbinfo.inc"; 
                        if (!$conn) {
                            die("Error error" . mysql_error());
                        }
                        global $Sem;
                        global $SW;
                        global $Course;
                        global $Year;
                        if (isset($_POST['Submit'])) {
                            $Sem = $_POST['Sem'];
                            $SW = $_POST['SW'];
                            $Year = $_POST['year'];
                            $Course = $_POST['course'];
                            $Query = "SELECT Subject_Id, Subject FROM subjects WHERE semester='$Sem'";
                            $user_data = array(
                                'Sem' => $Sem,
                                'SW' => $SW,
                                'Year' => $Year,
                                'Course' => $Course
                            );
                            $json_data = json_encode($user_data);
                            setcookie('A1', $json_data, time() + 86400);
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
                            <tr>
                                <td><label> Question :</label></td>
                                <td><textarea name='que' id='que' class="w-75"></textarea></td>
                            </tr>
                            <tr>
                                <td><input type='submit' name='SUB' Value='Submit'></td>
                            </tr>
                        </form>
                    </table>
                </div>
                <div class="col-3"></div>
            </div>

            <?php
                        }
                        $conn->close();

                        ?>
    </section>
</body>

</html>