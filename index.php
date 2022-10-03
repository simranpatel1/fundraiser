<?php
//declaring php file

/* Connect to database */

$dbcon = mysqli_connect("localhost", "simranpatel", "aWkf8Rw", "simranpatel_fundraiser");
if ($dbcon == NULL) {
	echo "Database is not connected.";
	exit();
}

$biggest_donation = mysqli_query($dbcon, "SELECT MAX(pledge_amount) AS largest FROM donor_details");

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
					<form action="search.php" method = "post">
						<input type="text" name='search' action="fundraiser.php">
						<?php
						if(isset($_POST['search'])){
							$search = $_POST['search'];

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
						<input type="submit" name="Search" value = "Search" action="search.php" >
					</form>
				</div>
			</header>
		<div class = "grid-container">
			<div class ="biggest_donation">
				<h1> Biggest Donation</h1>
				<?php
				$biggest_donation = mysqli_query($dbcon, "SELECT MAX(pledge_amount) AS largest FROM donor_details");
				if(!$biggest_donation){
					die(mysqli_error($dbcon));
				}
				if (mysqli_num_rows($biggest_donation) > 0) {
					while($rowData = mysqli_fetch_array($biggest_donation)){
						echo $rowData["largest"].'<br>';
					}
				}
				?>
			</div>
		</div>
        <footer>
				<p>Donate - Made by Simran Patel </p>
        </footer>
    </body>
</html>