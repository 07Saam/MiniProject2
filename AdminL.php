<?php
	session_start();
	session_unset();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Admin Login | Q&A Repository</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="Rcss1.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="Documentations/SPPU_PNG.webp">
        <script>  
        </script>
        <style type="text/css">
          </style>
	</head>

	<body>
		<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand text-info" href="Login.php">SPPU Q&A Repository</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="px-2"><a href="Login.php" class="text-white fs-6 fw-light">Login</a></li>
                        <li class="px-2"><a href="Registration.php" class="text-white fs-6">Sign Up</a></li>
                    </ul>
                </div>
                
            </div>
        </nav>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
						<h5 class="text-center" style="font-family: Noto Sans;">Login as</h5>
						<h4 class="text-center" style="font-family: Noto Sans;">Admin</h4><br>
							<form method="post" action="AIQuestion.php" >
								<div class="form-group">
									<label>Mobile:</label>
									<input type="tel" pattern="[0-9]{10}" name="mobile" class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">Enter Password:
										
									</label>
									<input type="password" name="pass" class="form-control">
								</div> 
								<div class="form-group text-center">
									<input type="submit" value="Login" name="submit" id="submit" class="btn btn-info my-3">
								</div>
								<div>

                            </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>