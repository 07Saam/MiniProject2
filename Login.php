<?php
    session_start();
    session_unset();
?>
<!doctype html>
<html lang="en">
    <head lang="en">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Login | Q&A Repository</title>
        <link rel="icon" type="image/x-icon" href="Documentations/SPPU_PNG.webp">
        <link href="Rcss1.css" rel="stylesheet">
        <script>
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand text-info" href="Login.php">SPPU Q&A Repository</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="px-2"><a href="Login.php" class="text-white fs-6 fw-light">Login </a></li>
                        <li class="px-2"><a href="Registration.php" class="text-white fs-6">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <section class="login first grey">
			<div class="container">
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="col-4">
                
                <div class="container">
                    <div class="box-wrapper">				
                        <div class="box box-border">
                            <div class="box-body">
                                <p class="text-center bg-info">LOGIN</p>
                    <table>
                        <tr>
                            <td><p>As a </p></td>
                            <td><ul>
                                <li><a href="StudentL.php" class="text-info">Student</a></li>
                                <li><a href="FacultyL.php" class="text-info">Faculty</a></li>
                                <li><a href="AdminL.php" class="text-info">Admin</a></li>
                                </ul>    
                            </td>    
                        </tr>
                        <tr>
                            
                            <td><p>For</p></td>
                            <td><ul>
                                <li><a href="Registration.php" class="text-info">New Registration</a></li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                    </div></div></div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
        </div></section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </body>
</html>