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

    <body>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand text-info" href="Login.php">SPPU Q&A Repository</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <br><br>
        <section>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <table>
                        <form method='post' action=''>
                            <label> Course :</label>
                            <select id='course' name='course'>
                                <option value='' disabled selected>Select Course</option>
                                <option value='MCA'>Masters of Computer Application</option>
                                <option value='MBA'>Masters of Buissness Administration</option>
                            </select>
                            <label> Year :</label>
                            <select id='year' name='year'>
                                <option value='' disabled selected>Select Year</option>
                                <option value='2017'>2017</option>
                                <option value='2018'>2018</option>
                                <option value='2019'>2019</option>
                                <option value='2020'>2020</option>
                                <option value='2021'>2021</option>
                                <option value='2022'>2022</option>
                            </select>
                            <label> Choose Summer/Winter:</label>
                            <select id='SW' name='SW'>
                                <option value='' disabled selected>Select Summer/Winter</option>
                                <option value='0'>Winter</option>
                                <option value='1'>Summer</option>
                            </select>
                            <label> Semester :</label>
                            <select id='Sem' name='Sem'>
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
                            </select>
                            <input type='submit' value='Go' name='Submit'>
                        </form>
                        <form method='post' action='AIQuestion1.php'>
                            <?php
                            include 'Database.php';
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
                                <label> Select Subject :</label>
                                <select id='subject' name='subject'>
                                    <option selected disabled value="">Select an option</option>
                                    <?php
                                    foreach ($options as $option) {
                                        echo '<option value="' . $option['Subject_Id'] . '">' . $option['Subject'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <label> Question :</label>
                                <textarea name='que' id='que'></textarea>
                                <input type='submit' name='SUB' Value='Submit'>
                            </form>
                            <?php
                            }
                            $conn->close();

                            ?>

    </body>

</html>