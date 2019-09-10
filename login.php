
<?php
session_start();
	require_once('config.php');
	
	if(isset($_POST['login'])){
		
			$email = $_POST['email'];
			$pwd = md5($_POST['password']);
			$msg = '';			
			$query = "select * from register where email='$email' and password='$pwd'";
			$run = mysqli_query($conn,$query);
			if(mysqli_num_rows($run)){
				
				while($row = mysqli_fetch_row($run)){
					$_SESSION['uid'] = $row[0];
					$_SESSION['name'] = $row[1];
				}
				header("location:profile.php");
			}
			else{
				$msg = 'Email and password not match.';
			}
		}
		
	
	include('header.php');
?>

<body>
<div class="signup-form">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<h2>Login</h2>
		<p>Please fill in this form to login</p>
		<hr>
        
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
       
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		      
        
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="login">login</button>
        </div>
        
    </form>
    <div class="hint-text"><?php if(isset($msg)){ echo $msg; } ?></div>
	<div class="hint-text"><p>Not have account?<a href='index.php'>Register</a></p></div>
</div>
</body>
</html>                            
