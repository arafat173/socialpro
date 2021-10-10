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
	 if(isset($_POST['add_students'])){
		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $cell = $_POST['cell'];
		 $location = $_POST['location'];
		 $age = $_POST['age'];
		 if(isset($_POST['gender'])){
			$gender = $_POST['gender'];
		 }else{
			 $gender=NULL;
		 }
		 $amount = $_POST['amount'];
		 
		 
		 if(empty($name) || empty($email) || empty($cell)){
			 $msg = validation('All fileds are required.');
		}
		else if(emailcheck($email) == false){
			$msg = validation('Invalid Email Address.');
		}
		 
		else if(mobileVerification($cell) == false){
			$msg = validation('Invalid Cell Number.'); 
		}
		else{
			$file_name = move($_FILES['photo'],'media/students');
			create("INSERT INTO students(name,email,cell,location,age,gender,amount,photo) VALUES('$name','$email','$cell','$location','$age','$gender','$amount','$file_name')");
			$msg =validation('Student added succesfully.','success'); 

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
						<input name='name' class="form-control" value="<?php old('name')?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name='email' class="form-control" value="<?php old('email')?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name='cell' class="form-control" value="<?php old('cell')?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<select class="form-control" name="location" id="">
							<option value="">--Select--</option>
							<option value="Mirpur">Mirpur</option>
							<option value="Dhanmondi">Dhanmondi</option>
							<option value="Badda">Badda</option>
							<option value="Gulshan">Gulshan</option>
							<option value="Uttara">Uttara</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name='age' class="form-control" value="<?php old('age')?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Gender</label> <br>
						<input type="radio" name='gender' value="Male" id="Male"><label for="Male">Male</label>
						<input type="radio" name='gender' value="Male" id="Female"><label for="Female">Female</label>
					</div>
					<div class="form-group">
						<label for="">Amount</label>
						<input name='amount' class="form-control" value="<?php old('amount')?>" type="text">
					</div>
					<div class="form-group">
						<label for="">photo</label>
						<input name='photo' class="" value="<?php old('photo')?>" type="file">
					</div>
					<div class="form-group">
						<input name='add_students' class="btn btn-primary" type="submit" value="Sign Up">
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