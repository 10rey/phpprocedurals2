<?php 
	
	$connection = mysqli_connect("localhost","root","","season2DB");

	if(mysqli_connect_errno()){

		echo "Failed to connect to database!";

	}

?>

<style>
		
	.btn-primary{

		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		border-radius: 0px;
		font-family: Georgia;
		color: #fff;
		font-size: 16px;
		background-color: #34d9bd;
		padding: 6px 20px 8px 20px;
		text-decoration: none;

	}

	.btn-primary:hover{

		background: #4ccfb3;
		text-decoration: none;

	}

	.btn-update{

		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		border-radius: 0px;
		font-family: Georgia;
		color: #fff;
		font-size: 16px;
		background-color: #005eff;
		padding: 6px 20px 8px 20px;
		text-decoration: none;

	}

	.btn-update:hover{

		background: #076dad;
		text-decoration: none;

	}

	.btn-delete{

		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		border-radius: 0px;
		font-family: Georgia;
		color: #fff;
		font-size: 16px;
		background-color: #d93434;
		padding: 6px 20px 8px 20px;
		text-decoration: none;

	}

	.btn-delete:hover{

		background: #fc3c3c;
		text-decoration: none;

	}

</style>