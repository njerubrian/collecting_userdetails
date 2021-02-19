<?php
$fnameErr =$snameErr = $emailErr = $cEmailErr = $passwordErr = $cpasswordErr = "";

$fname = $sname = $email = $cemail = $password = $cpassword ="";


// check the records when the button submit is clicked on
if (isset($_POST["save"])) {
 	

 	 // checks if the fields are empty then they display an error message
 	if (empty($_POST["fname"])) {
		 $fnameErr ="first name is required";
	}
else{
	$fname = test_input($_POST["fname"]);

	// checks if the name only contains letters and white spaces
	if (!preg_match("/^[a-zA-Z-']*$/", $fname)) {
		$fnameErr = "only leters a-z and white spaces";
		
	}
}
if (empty($_POST["sname"])) {

	$snameErr = "second name is required";

}
else{
	$sname = test_input($_POST["sname"]);
	if (!preg_match("/^[a-zA-Z-']*$/", $sname)) {
		$snameErr = "only leters a-z and white spaces";
		
	}
}

if (empty($_POST["email"])) {

$emailErr="email is required";

}
else{
	$email = test_input($_POST["email"]);

	// checks if email adress is well formed
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$emailErr = "invalid email format.";
	}
}
if (empty($_POST["cemail"])) {
	$cEmailErr = "you have to confirm email";
}
else{
	$cemail = test_input($_POST["cemail"]);
	if (!filter_var($cemail, FILTER_VALIDATE_EMAIL)) {
	$cEmailErr = "invalid email format.";
}
if ($cemail != $email) {
	$cEmailErr = "email does not match try again";
}
}
if (empty($_POST["password"])) {

	$passwordErr = "please provide a password";
}
else{
	$password = test_input($_POST["password"]);

	// Password must be strong
if(!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_password)){
$passwordErr= ' Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit';
}
}
if (empty($_POST["cpassword"])) {
	$cpasswordErr = "please confirm your password";
}
else{
	$cpassword = test_input($_POST["cpassword"]);

	if ($cpassword != $password) {
		$cpasswordErr = "password does not match please try again";
	}
}

 } 


	


function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>


<html>
<head>
<style>
	.error {color: #ff0000;}
</style>

	<title>forms and php</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>


	<br>
	<p><h1> collecting and validating form data </h1>
	</p>
	<br>
<div class="container container-fluid">
	<p> <span class="error">*required field</span></p>
	
		<form  action="intro.php" method="post">
			<div class="row" >
				<div class= "col form-group">
					<label for="first name"> first name:</label>
					<input class= "form-comtrol"type="text" name="fname" placeholder="enter  first name here" >

					<span class="error">* <?php echo $fnameErr; ?> </span>
					
				</div>
				<div class = "col form-group">
					<label for="second name">second name:</label>
					<input type="text" name="sname" placeholder="enter second name here" class="form-comtrol">
					<span class="error">* <?php echo $snameErr ; ?> </span>
				</div>
			</div>
				<div class="row ">
					<div class="col form-group">
					<label for="email"> email: </label>
					<input type="text" name="email" placeholder="enter email here"class="form-comtrol" >

					<span class="error">* <?php echo $emailErr; ?></span>
					
				</div>
				<div class="col form-group">
					<label for="confirm email">confirm email:</label>
					<input type="text" name="cemail" placeholder="confirm email here" class="form-comtrol">

					<span class="error">* <?php echo $cEmailErr; ?></span>
				

				</div>
				</div>
				<div class="row form-comtrol">
					<div class="col form-group">
						<label for= "password">enter password:</label>
						<input type="password" name="password" placeholder="enter your password" class="form-comtrol" >

						<span class="error">* <?php echo $passwordErr; ?> </span>
					</div>

					<div class= "col form-group">
					<label for="cpasword">confirm password</label>	
					<input type="password" name="cpassword" placeholder="conifrm password" class="form-comtrol" >

					<span class="error">* <?php echo $cpasswordErr; ?></span>
				</div>
					

				</div>
				<div class="row">
					<div class="col form-group">
						<input class ="btn btn-primary "type="submit" name="save" class="form-comtrol">
						
					</div>

					
				
				<div class="col form-group">
					<input type="reset" name="warn" value="reset" class="btn btn-warning form-group" class="form-comtrol">
					
				</div>


			</div>
			
		
	
</div>
</body>
</html>


</form>


<?php

echo "<h2> your inputs: </h2>";
echo "<br>";
echo $fname;
echo "<br>";
echo $sname;
echo "<br>";
if ($email == $cemail) {
	# code...
	echo $email;
} 
// echo $email;
echo "<br>";
echo  $password;

?>
