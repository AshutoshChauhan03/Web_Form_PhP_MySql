<?php
	$submitted=false;
	if (isset($_POST['name']) and strlen($_POST['name']) > 4) {
		
		$server="localhost";
		$username="root";
		$password="";

		// Create Connection
		$connection = mysqli_connect($server, $username, $password);

		// Check Connection
		if (!$connection) {
			die("Connection Failed : ".mysqli_connect_error());
		}
		else
			$submitted=true;

		$name = $_POST['name'];
		$age = $_POST['age'];
		$phone =$_POST['phone']; 
		$email =$_POST['email'];
		$date =$_POST['date'];
		$dose =$_POST['dose'];
		$center =$_POST['center']; 
		
		$insert_row = "INSERT INTO `mydb`.`students` (`Name`, `Age`, `Phone_Number`, `Email`, `Vaccination_Date`, `Doses`, `Center`, `Submit_Date`) VALUES ('$name', '$age', '$phone', '$email', '$date', '$dose', '$center', current_timestamp());";
		
		if ($connection->query($insert_row) == true)
			{}
		else
			echo "Error : $insert_row </br> $connection->error";
		
		$connection->close();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Submission !</title>

	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="header">
		<h2>VACCINATION DETAIL FORM</h2>
		</br>
		<?php
			if($submitted==false)	
				echo "<p>Enter your vaccination details below</p>";
			else
				echo "<p class='submitMsg'>Your vaccination data is submitted !</p>";
		?>
	</div>
	<div class="form">
		<form action="index.php" method="post">
			<label for="name">Name : </label>
			<input type="text" name="name" placeholder="Type here...">
			</br>
			<label for="age">Age : </label>
			<input type="number" min="18" max="50" name="age" value='0'>
			</br>
			<label for="phone">Phone Number : </label>
			<input type="phone" name="phone" placeholder="Type here...">
			</br>
			<label for="email">Email : </label>
			<input type="email" name="email" placeholder="Type here...">
			</br>
			<label for="date">Date of vaccination : </label>
			<input type="date" name="date">
			</br>
			<label for="dose">No of Doses : </label>
			<input type="number" min="1" max="2" name="dose" value='0'>
			</br>
			<label for="center">Vaccination Center : </label>
			<input type="text" name="center" placeholder="Type here...">
			</br>
			<button type='submit'>Submit</button>
		</form>
	</div>
</body>
</html>