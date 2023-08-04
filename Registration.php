<?php
session_start();
session_unset();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Register | Q&A Repository</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="Rcss1.css">
		<link rel="icon" type="image/x-icon" href="Documentations/SPPU_PNG.webp">
        <style type="text/css">
        </style>
		<script>  
            function validateform(){  
                var password=(document.reg_form.password.value);
                var cnf_pass=(document.reg_form.confirm_password.value);
                
                if(password.length<6 || cnf_pass.length<6){  
                    alert("Password must be at least 6 characters long.");  
                    return false;  
                }
                else if(password!=cnf_pass){
                    alert("Passwords did not match");
                    return false;
                }
            }
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
							<h5 style="font-family: Noto Sans;" class="text-center">Register to </h5><h4 style="font-family: Noto Sans;" class="text-center">Q&A Repository</h4><br>
							<form method="post" onsubmit="return  validateform()" action="Create.php" name="reg_form	">
                                <div class="form-group ps-4">
									<label for="fname">First Name</label><br>
									<input type="text" pattern="[A-Za-z]{1,10}" name="fname" id="fname" required>
				  				</div>
								  <div class="form-group ps-4">
									<label for="lname">Last Name</label><br>
									<input type="text" pattern="[A-Za-z]{1,10}" name="lname" id="lname" required>
				  				</div>
								  <div class="form-group ps-4">
									<label for="mobile">Mobile No.</label><br>
									<input type="tel" pattern="[0-9]{10}" title="10 Digits Number Only" name="mobile" id="mobile" required>
								</div>
								<div class="form-group ps-4">
									<label for="email">E-mail</label><br>
									<input type="email" name="email" id="email" title="Valid Email only" required>
								</div>
								<div class="form-group ps-4">
									<label for="utype">Choose user type:</label><br>
									<select class="w-75" id="utype" name="utype" required>
										<option value="" selected disabled hidden>Select</option>
										<option value="Student">Student</option>
										<option value="Faculty">Faculty</option>
									</select>
								</div>
								<div class="form-group ps-4">
									<label for="upass1">Password</label><br>
									<input type="password" name="password" id="upass1" required>
                                </div>
								<div class="form-group ps-4">
									<label for="upass2">Confirm Password</label><br>
									<input type="password" name="confirm_password" id="upass2" required>
                                </div>

								<div class="form-group text-center">
									
									<input type="submit" value="Register" name="submit" id="submit" class="btn bg-info my-3">
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