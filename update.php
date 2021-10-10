<?php
   include_once "autoload.php";
   $edit_id = $_GET['edit_id'];

   $student = find('students',$edit_id);

?>

<?php include_once "autoload.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	<?php
	 if(isset($_POST['update_student'])){
		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $cell = $_POST['cell'];
		
		 $age = $_POST['age'];
		 
		 $amount = $_POST['amount'];
		 
		 
		 if(empty($name) || empty($email) || empty($cell)){
			 $msg = validation('All fileds are required.');
         }else{
            $sql = "UPDATE students SET name='$name', email='$email', cell='$cell', age='$age', amount='$amount' WHERE id='$edit_id'";
            connect()->query($sql);
            header("location:index.php");
		}
	}
	?>
	

	<div class="wrap">
	<a class="btn btn-sm btn-primary" href="index.php">All Students</a><br> <br>
		<div class="card shadow">
			<div class="card-body">
				<h2>Add New Students</h2>
				<?php
				 if(isset($msg)){
					 echo $msg;
				 }
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name='name' class="form-control" value="<?php echo $student['name']?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name='email' class="form-control" value="<?php echo $student['email']?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name='cell' class="form-control" value="<?php echo $student['cell']?>" type="text">
					</div>
					
					<div class="form-group">
						<label for="">Age</label>
						<input name='age' class="form-control" value="<?php echo $student['age']?>" type="text">
					</div>
					
					<div class="form-group">
						<label for="">Amount</label>
						<input name='amount' class="form-control" value="<?php echo $student['amount']?>" type="text">
					</div>
					
					<div class="form-group">
						<input name='update_student' class="btn btn-primary" type="submit" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>