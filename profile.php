<?php 
	session_start();
	include_once('config.php');
	include_once('header.php');
	$uid = $_SESSION['uid'];
	if(isset($_POST['submit'])){
		
			$fname = $_POST['first_name'];
			$lname = $_POST['last_name'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$pwd = md5($_POST['password']);
			$result = '';			
			$query = "update register set fname='$fname',lname='$lname',email='$email',contact='$contact',password='$pwd' where id ='$uid'";
			$run = mysqli_query($conn,$query);
			if($run){
				$result = 'Successfully update record';
			}
			else{
				$result = 'Error in data';
			}
	}
	
	if(isset($_POST['logout'])){
		session_destroy();
		header("location:index.php");
	}
	
	
	echo 'hiii '; echo $_SESSION['name']; echo $_SESSION['uid'];
	 	
	$sql = "select * from register where id = '$uid'";
	$run = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_row($run)){ ?>
	<div class="signup-form">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<h2>Profile <?php echo $row[1]; ?></h2>
		
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="first_name" value="<?php echo $row[1]; ?>" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="last_name" value="<?php echo $row[2]; ?>" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" value="<?php echo $row[3]; ?>" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="contact" value="<?php echo $row[4]; ?>" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" value="<?php echo md5($row[5]); ?>" required="required">
        </div>
		     
        
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit">Update</button>
            <button type="submit" class="btn btn-primary btn-lg" name="logout">Logout</button>
        </div>
    </form>
    
    <div class="hint-text"><?php if(isset($result)){ ?><?= $result; }?></div>
	</div>
<?php	}
	
?>

