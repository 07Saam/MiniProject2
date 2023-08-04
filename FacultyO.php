<?php  
    session_start();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Home | Faculty Login</title>
        
        <link href="Rcss1.css" rel="stylesheet">
		<link rel="icon" type="image/x-icon" href="/MiniProject2/Documentations/SPPU_PNG.png">
        <style>
            body{
                background-image: linear-gradient(to right, #CD853F, white, #CD853F);
            }
        </style>
        <script></script>
    </head>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand text-info" href="Login.php">SPPU Q&A Repository</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <?php
            if (isset($_Session['id'])) {
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
        <br>
        <section>
            <div class="container">
        <div class="container mt-5">
            <br>
            <div class="row">
                <div class="col-6">
                    <a href="/MiniProject2/View.php">
                    <div class="card">
                        <img src="/MiniProject2/Documentations/image2.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-light" style="background-color: #474242;">
                            <p class="card-title text-center">View Answers</p>
                        </div>
                    </div>
                    </a>
                  </div>
                  <div class="col-6">
                    <a href="/MiniProject2/Teacher.php" style="">
                    <div class="card w-100">
                        <img src="/MiniProject2/Documentations/image1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-light" style="background-color: #474242;">
                          <p class="card-title text-center">Write Answers</p>
                        </div>
                    </div>
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
