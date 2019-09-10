<?php
	require_once('config.php');
	
	if(isset($_POST['submit'])){
		if($_POST['password'] == $_POST['confirm_password']){
			$fname = $_POST['first_name'];
			$lname = $_POST['last_name'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$pwd = md5($_POST['password']);
			$result = '';			
			$query = "insert into register(fname,lname,email,contact,password) values('$fname','$lname','$email','$contact','$pwd')";
			$run = mysqli_query($conn,$query);
			if($run){
				$result = 'Successfully Registerd.Login now!';
			}
			else{
				$result = 'Error in register.';
			}
		}
		else{
				$result = 'Password not match';
		}
	}
	include('header.php');
?>

<body>
<div class="signup-form">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="contact" placeholder="Contact" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>        
        
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit">Sign Up</button>
        </div>
    </form>
    <div class="hint-text"><?php if(isset($result)){ ?><?= $result; }?></div>
	<div class="hint-text">Already have an account? <a href="login.php">Login here</a></div>
</div>
</body>
</html>                            
