<?php 

	session_start();

	$check = $checkErr = "";

	if (isset($_SESSION["email"])) {

		$email = $_SESSION["email"];

		# code...
	} else {

		echo "<script>window.location.href='../';</script>";

	}

	include("../connections.php");

	include("nav.php");

	$check = $checkErr = "";

	if (isset($_POST["btnSubmit"])) {
	
		if (empty($_POST["check"])) {
			$checkErr = "Select at least one ( 1 )";
		} else {
			$check = $_POST["check"];
		}

		if ($check) {

			echo "<br><br>";
			
			foreach ($check as $new_check) {
				echo $new_check . "<br>";

				// code if plannin to save in database the checkbox
				// mysqli_query($connection, "INSERT INTO tbl_name (field_name) VALUES('$new_check') ");

			}

		}
		
	}
		

?>

<style>
	.error{
		color:red;
	}
</style>
<br>
<hr>

<form method="POST">

	<span class="error"><?php echo $checkErr; ?></span> <br> <br>
	
	<input type="checkbox" name="check[]" value="Beer"> Beer <br>

	<input type="checkbox" name="check[]" value="San Miguel Beer"> San Miguel Beer <br>

	<input type="checkbox" name="check[]" value="Alfonso Lights"> Alfonso Lights <br>

	<input type="checkbox" name="check[]" value="Great Taste White Choco"> Great Taste White Choco <br>

	<input type="submit" name="btnSubmit" value="submit"> 

</form>