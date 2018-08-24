<?php 
	
	include("../connections.php");

	$retrieve_query = mysqli_query($connection,"SELECT * FROM tbl_user");

	while ($row_users = mysqli_fetch_assoc($retrieve_query)) {

		$id_user = $row_users["id_user"];

		$db_first = $row_users["first_name"];
		$db_middle = $row_users["middle_name"];
		$db_last = $row_users["last_name"];
		$db_gender = $row_users["gender"];
		$db_prefix = $row_users["prefix"];
		$db_seven = $row_users["seven_digit"];
		$db_email = $row_users["email"];
		$db_password = $row_users["password"];

		echo $db_first . "<br>";

	}

?>