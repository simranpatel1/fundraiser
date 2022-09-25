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

	/* Insert into drinks table Query */
	$drink = $_POST['drink'];
	$cost = $_POST['cost'];

	$insert_drink = "INSERT INTO drinks (drink, cost) VALUE ('$drink','$cost')";

    /* Check the data has been inserted */
    if(!mysqli_query($dbcon, $insert_drink)) 
	{
        echo 'Inserted Failed!';
    } 
	else
	{
        echo 'Insert Successful!';
    }
	
    /* Refresh the page after 2 seconds and return to the add_drinks.php page */
    header("refresh:2; url=drinks.php");

    ?>