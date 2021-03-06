<?php

	$first_name = $middle_name = $last_name = $gender = $prefix = $seven_digit = $email = "";

	$first_nameErr = $middle_nameErr = $last_nameErr = $genderErr = $prefixErr = $seven_digitErr = $emailErr = "";

	// basic validaton
	if (isset($_POST["btnRegister"])) {
		
		if (empty($_POST["first_name"])) {
			$first_nameErr = "First name is required!";
		} else {
			$first_name = $_POST["first_name"];
		}

		if (empty($_POST["middle_name"])) {
			$middle_nameErr = "Middle name is required!";
		} else {
			$middle_name = $_POST["middle_name"];
		}

		if (empty($_POST["last_name"])) {
			$last_nameErr = "First name is required!";
		} else {
			$last_name = $_POST["last_name"];
		}

		if (empty($_POST["gender"])) {
			$genderErr = "Gender is required!";
		} else {
			$gender = $_POST["gender"];
		}

		if (empty($_POST["seven_digit"])) {
			$seven_digitErr = "Seven digits are required!";
		} else {
			$seven_digit = $_POST["seven_digit"];
		}

		if (empty($_POST["prefix"])) {
			$prefixErr = "Prefix is required!";
		} else {
			$prefix = $_POST["prefix"];
		}

		if (empty($_POST["email"])) {
			$emailErr = "E-mail is required!";
		} else {
			$email = $_POST["email"];
		}
		// End of validation

		// If first_name, middle_name, last_name etc.. is not empty.
		// Upgraded validation
		if ($first_name && $middle_name && $last_name && $gender && $prefix && $seven_digit && $email) {

			if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
				$first_nameErr = "Letters and spaces only.";
			} else {
				$count_first_name_string = strlen($first_name);

				if ($count_first_name_string < 2) {
					$first_nameErr = "First name is too short!";
				} else {
					$count_middle_name = strlen($middle_name);
					
					if ($count_middle_name < 2) {
						$middle_nameErr = "Middle name is too short!";
					}else{
						$count_last_name = strlen($last_name);

						if ($count_last_name < 2) {
							$last_nameErr = "Last name is too short!";
						}else{

							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
								
								$emailErr = "Invalid email format";

							}else{
								$count_seven_digit = strlen($seven_digit);

								if ($count_seven_digit < 7) {
									$seven_digitErr = "Please enter 7 digits.";
								}else{

									// Random password generator
									function random_password( $length = 5 ){
										$str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
										$shuffled = substr( str_shuffle( $str ), 0, $length);
										return $shuffled;
									}

									$password = random_password(8);

									include("connections.php");

									mysqli_query($connection, "INSERT INTO tbl_user(first_name,middle_name,last_name,gender,prefix,seven_digit,email,password,account_type) VALUES('$first_name','$middle_name','$last_name','$gender','$prefix','$seven_digit','$email','$password','2') ");

									echo "<script>window.location.href='success.php';</script> ";


								}
							}

						}

					}

				}
				
			}
					
			
		}
		// end of upgraded validation

	} 

?>

<!-- Numbers only no letters allowed function -->
<script type="application/javascript">
	
	function isNumberKey(evt){

		var charCode = (evt.which) ? evt.which : event.keyCode

		if(charCode > 31 && (charCode < 48 || charCode > 57))

			return false;

		return true;

	}

</script>

<style>

	.error{
		color: red;
	}

</style>

<?php include("nav.php"); ?>

<form action="" method="POST">
	
	<center>
			
		<table border="0" withd="50%">
			
			<tr>
				<td>
					<input type="text" name="first_name" value="<?php echo $first_name; ?>" placeholder="First name">
					<span class="error"><?php echo $first_nameErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="middle_name" value="<?php echo $middle_name ?>" placeholder="Middle name">
					<span class="error"><?php echo $middle_nameErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="last_name" value="<?php echo $last_name; ?>" placeholder="Last name">
					<span class="error"><?php echo $last_nameErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<select name="gender">
						<option name="gender" value="">Select gender</option>
						<option name="gender" value="Male" <?php if($gender == "Male"){echo "selected";} ?>>Male</option>
						<option name="gender" value="Female" <?php if($gender == "Female"){echo "selected";} ?>>Female</option>
					</select>
					<span class="error"><?php echo $genderErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<select name="prefix" id="">
						<option name="prefix" id="prefix" value="">Network Provided (Globe, Smart, Sun, TNT, TM etc.)</option>
						<option name="prefix" id="prefix" value="0183" <?php if($prefix == "0183"){echo "selected";} ?>>0183</option>
						<option name="prefix" id="prefix" value="0817" <?php if($prefix == "0817"){echo "selected";} ?>>0817</option>
						<option name="prefix" id="prefix" value="0905" <?php if($prefix == "0905"){echo "selected";} ?>>0905</option>
						<option name="prefix" id="prefix" value="0906" <?php if($prefix == "0906"){echo "selected";} ?>>0906</option>
						<option name="prefix" id="prefix" value="0907" <?php if($prefix == "0907"){echo "selected";} ?>>0907</option>
					</select>
					<span class="error"><?php echo $prefixErr; ?></span>

					<input type="text" name="seven_digit" value="<?php echo $seven_digit; ?>" maxlength="7" placeholder="Seven other digit" onkeypress='return isNumberKey(event)'>
					<span class="error"><?php echo $seven_digitErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="email" value="<?php echo $email; ?>" placeholder="E-mail">
					<span class="error"><?php echo $emailErr; ?></span>
				</td>
			</tr>

			<tr>
				<td>
					<hr>
				</td>
			</tr>

			<tr>
				<td>
					<input type="submit" name="btnRegister" value="Register">
				</td>
			</tr>

		</table>

	</center>

</form>