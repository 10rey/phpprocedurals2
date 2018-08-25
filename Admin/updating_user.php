<?php 

	$id_user = $_GET["id_user"];

	$get_record = mysqli_query($connection,"SELECT * FROM tbl_user WHERE id_user= '$id_user' ");

	while ($get = mysqli_fetch_assoc($get_record)) {
		
		$db_first = $get["first_name"];
		$db_middle = $get["middle_name"];
		$db_last = $get["last_name"];
		$db_gender = $get["gender"];
		$db_prefix = $get["prefix"];
		$db_seven = $get["seven_digit"];
		$db_email = $get["email"];
		$db_password = $get["password"];

	}

	$new_first = $new_middle = $new_last = $new_gender = $new_prefix = $new_seven =$new_email = "";
	$new_firstErr = $new_middleErr = $new_lastErr = $new_genderErr = $new_prefixErr = $new_sevenErr = $new_emailErr = "";

	// validation
	if (isset($_POST["btnUpdate"])) {

		if (empty($_POST["new_first"])) {
			$new_firstErr = "This field must not be empty";
		} else {
			$new_first = $_POST["new_first"];
			$db_first = $new_first;
		}		

		if (empty($_POST["new_middle"])) {
			$new_middleErr = "This field must not be empty";
		} else {
			$new_middle = $_POST["new_middle"];
			$db_middle = $new_middle;
		}

		if (empty($_POST["new_last"])) {
			$new_lastErr = "This field must not be empty";
		} else {
			$new_last = $_POST["new_last"];
			$db_last = $new_last;
		}

		if (empty($_POST["new_seven"])) {
			$new_sevenErr = "This field must not be empty";
		} else {
			$new_seven = $_POST["new_seven"];
			$db_seven = $new_seven;
		}

		if (empty($_POST["new_email"])) {
			$new_emailErr = "This field must not be empty";
		} else {
			$new_email = $_POST["new_email"];
			$db_email= $new_email;
		}
		
		$db_gender = $_POST["new_gender"];
		$db_prefix = $_POST["new_prefix"];

		if($new_first && $new_middle && $new_last && $new_seven && $new_email){

			include("../connections.php");

			mysqli_query($connection, "UPDATE tbl_user SET 

					first_name = '$db_first',
					middle_name = '$db_middle',
					last_name = '$db_last',
					gender = '$db_gender',
					prefix = '$db_prefix',
					seven_digit = '$db_seven',
					email = '$db_email' WHERE id_user = '$id_user'

				");

			$encrypted = md5(rand(1,9));

			echo "<script>window.location.href='viewrecords?$encrypted&&notify=Record has been updated!';</script> ";

		}

		// if($new_first && $new_middle && $new_last && $new_seven && $new_email){

		// 	if (!preg_match("/^[a-zA-Z ]*$/", $new_first)) {
		// 		$new_firstErr = "Letters and spaces only.";
		// 	} else {
		// 		$count_first_name_string = strlen($new_first);

		// 		if ($count_first_name_string < 2) {
		// 			$new_firstErr = "First name is too short!";
		// 		} else {
		// 			$count_middle_name = strlen($new_middle);
					
		// 			if ($count_middle_name < 2) {
		// 				$new_middleErr = "Middle name is too short!";
		// 			}else{
		// 				$count_last_name = strlen($new_last);

		// 				if ($count_last_name < 2) {
		// 					$new_lastErr = "Last name is too short!";
		// 				}else{

		// 					if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
								
		// 						$new_emailErr = "Invalid email format";

		// 					}else{
		// 						$count_seven_digit = strlen($new_seven);

		// 						if ($count_seven_digit < 7) {
		// 							$new_sevenErr = "Please enter 7 digits.";
		// 						}else{

									// include("connections.php");

									// mysqli_query($connection, "UPDATE tbl_user SET 

									// 		first_name = '$db_first',
									// 		middle_name = '$db_middle',
									// 		last_name = '$db_last',
									// 		gender = '$db_gender',
									// 		prefix = '$db_prefix',
									// 		seven_digit = '$db_seven',
									// 		email = '$db_email' WHERE id_user = '$id_user'

									// 	");

									// $encrypted = md5(rand(1,9));

									// echo "<script>window.location.href='viewrecords?$encrypted&&notify=Record has been updated!';</script> ";


		// 						}
							
		// 					}

		// 				}

		// 			}

		// 		}
				
		// 	}

		// }
		
	}//end of isset


	

?>

<style>
	
	.error{
		color:red;
	}

</style>

<center>

	<br>
	<br>
	<br>

	<form action="" method="POST">
		
		<table border="0" width="50%">
			
			<tr>
				<td>
					<input type="text" name="new_first" value="<?php echo $db_first; ?>">
					<span class="error"><?php echo $new_firstErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="new_middle" value="<?php echo $db_middle; ?>">
					<span class="error"><?php echo $new_middleErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="new_last" value="<?php echo $db_last; ?>">
					<span class="error"><?php echo $new_lastErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<select name="new_gender">
						<option name="new_gender" value="Male" <?php if($db_gender == "Male"){echo "selected";} ?>>Male</option>
						<option name="new_gender" value="Female" <?php if($db_gender == "Female"){echo "selected";} ?>>Female</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<select name="new_prefix" id="">
						<option name="new_prefix" id="prefix" value="0183" <?php if($db_prefix == "0183"){echo "selected";} ?>>0183</option>
						<option name="new_prefix" id="prefix" value="0817" <?php if($db_prefix == "0817"){echo "selected";} ?>>0817</option>
						<option name="new_prefix" id="prefix" value="0905" <?php if($db_prefix == "0905"){echo "selected";} ?>>0905</option>
						<option name="new_prefix" id="prefix" value="0906" <?php if($db_prefix == "0906"){echo "selected";} ?>>0906</option>
						<option name="new_prefix" id="prefix" value="0907" <?php if($db_prefix == "0907"){echo "selected";} ?>>0907</option>
					</select>
					<span class="error"><?php echo $new_prefixErr; ?></span>

					&nbsp;
					
					<input type="text" name="new_seven" value="<?php echo $db_seven; ?>">
					<span class="error"><?php echo $new_sevenErr; ?></span>

				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="new_email" value="<?php echo $db_email; ?>">
					<span class="error"><?php echo $new_emailErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<hr>
				</td>
			</tr>

			<tr>
				<td>
					<input type="submit" name="btnUpdate" value="Update" class="btn-primary">
				</td>
			</tr>

		</table>

	</form>

</center>