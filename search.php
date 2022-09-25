<?php
//declaring php file

/* Connect to database */

$dbcon = mysqli_connect("localhost", "simranpatel", "aWkf8Rw", "simranpatel_fundraiser");
if ($dbcon == NULL) {
	echo "Database is not connected.";
	exit();
}
    /* Get from the drink id from index page else set default */
    if(isset($_GET['drink_sel'])) {
        $drinks_id = $_GET['drink_sel'];
    } else {
        $drinks_id = 1;
    }

	/* Create the SQL query */
    $this_drink_query = "SELECT * FROM drinks WHERE drinks.drinks_id = '" .$drinks_id . "'";

    /* Perform the query against the database */
    $this_drink_result = mysqli_query($dbcon, $this_drink_query);

    /* Fetch the result into an associative array */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title> Donate</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <div id="welly_donate">
            <header>
                <h1>Donate</h1>
                <nav>
                    <ul>
                        <!--all the links in the nav bar are located below-->
                        <li><a href="log_in.php">Log In</a></li>
                        <li><a href="sign_up.php">Sign Up</a></li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="pledge.php">PLEDGE</a></li>
                    </ul>
                </nav>
				<div class = "search-bar">
					<form method = "post" action="search.php">
						<input type="text" name='search'>
						<?php
						if(isset($_POST['search_id'])){
							$search = $_POST['search_id'];

							$query1 = "SELECT * FROM fundraiser_event WHERE fundraiser_event.charity LIKE '%$search%'";
							$query = mysqli_query($dbcon, $query1);
							$count = mysqli_num_rows($query);

							if($count == 0){
								echo "There was no search results!";
							}else{

								while($row = mysqli_fetch_array($query)) {
									echo "<br>";
									echo $row['charity'];
									echo "<br>";
								}
							}
						}
						?>
						<input type="submit" name="Search" value = "Search">
					</form>
				</div>
			</header>
		</div>
		
			<div class = "grid-container">
				<div class ="biggest_donation">
					<h1> Results relating to '%charity%' </h1>
				</div>
			</div>
				
		</div>
	</body>
</html>
		