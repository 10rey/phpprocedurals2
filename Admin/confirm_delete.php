<?php 

	$id_user = $_GET["id_user"];

	$query_name = mysqli_query($connection,"SELECT * FROM tbl_user WHERE id_user = '$id_user' ");

	$row = mysqli_fetch_assoc($query_name);

	$db_first = $row["first_name"];
	$db_middle = $row["middle_name"];
	$db_last = $row["last_name"];
	$db_gender = $row["gender"];
	
	$gender_prefix = "";
	if ($db_gender == "Male") {
		$gender_prefix = "Mr.";
	} else {
		$gender_prefix = "Ms.";
	}

	$fullname = $gender_prefix. " " . ucfirst($db_first) . " " . ucfirst($db_middle[0]) . ". " . ucfirst($db_last);

	if(isset($_POST["btnDelete"])){

		mysqli_query($connection, "DELETE FROM tbl_user WHERE id_user='$id_user' ");

		echo "<script>window.location.href='viewrecords?notify=$fullname has been successfully deleted!';</script>";

	}

?>

<br>
<br>
<hr>

<center>

	<form method="POST">
		
		<h4>You are about to delete this user: <font color="red"><?php echo $fullname; ?></font></h4>	

		<input type="submit" class="btn-primary" name="btnDelete" value="Confirm">&nbsp; &nbsp; <a href="?" class="btn-delete">Cancel</a>

	</form>

</center>

<hr>