<?php
	/*declaring php file*/ 
	/* Connect to database */

	$dbcon = mysqli_connect("localhost", "simranpatel", "aWkf8Rw", "simranpatel_fundraiser");
	if ($dbcon == NULL) {
		echo "Database is not connected.";
		exit();
	}
	else{
		echo "Connected";
	}

	/* Insert into fundraiser_details table Query */
	$full_name = $_POST['full_name'];
	$birth_date = $_POST['birth_date'];
	$email = $_POST['email'];
	$password = $_POST['pasword'];

	$insert_sign_up = "INSERT INTO fundraiser_details (full_name, birth_date, email, password) VALUE ('$full_name','$birth_date','$email','$password')";

    /* Check the data has been inserted */
    if(!mysqli_query($dbcon, $insert_sign_up)) 
	{
        echo 'Inserted Failed!';
    } 
	else
	{
        echo 'Insert Successful!';
    }
	
    /* Refresh the page after 2 seconds and return to the add_drinks.php page */
   /* header("refresh:2; url=admin.php");*/

    ?>