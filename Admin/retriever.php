<br>
<br>
<br>
<br>
<center>

	<table border="0" width="80%">

		<tr>
			
			<th width="16%">Name</th>
			<th width="10%">Gender</th>
			<th width="10%">Contact</th>
			<th width="16%">Email</th>
			<th width="16%">Password</th>
			<th width="16%" colspan="2">
				Action
			</th>

		</tr>

		<tr>
			<td colspan="6"></td>
		</tr>

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

		$fullname = ucfirst($db_first) . " " . ucfirst($db_middle[0]) . ". " . ucfirst($db_last);
		$contact = $db_prefix . $db_seven;

		$jScript = md5(rand(1,9));
		$newScript = md5(rand(1,9));
		$getUpdate = md5(rand(1,9));
		$getDelete = md5(rand(1,9));

		echo "

			<tr>

				<td>$fullname</td>
				<td>$db_gender</td>
				<td>$contact</td>
				<td>$db_email</td>
				<td>$db_password</td>
				<td>
					
					<br>
					<center>
						<a href='?jScript=$jScript&&newScript=$newScript&&getUpdate=$getUpdate&&id_user=$id_user ' class='btn-update'>Update</a>
						<a href='?jScript=$jScript&&newScript=$newScript&&getDelete=$getDelete&&id_user=$id_user' class='btn-delete'>Delete</a>
					</center>
					<br>

				</td>

			</tr>

		";

		echo "
			
			<tr>
				
				<td colspan='6'> <hr> </td>
				
			</tr>

		";


	}

?>

</table>