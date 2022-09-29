<?php
//declaring php file

/* Connect to database */

$dbcon = mysqli_connect("localhost", "simranpatel", "aWkf8Rw", "simranpatel_fundraiser");
if ($dbcon == NULL) {
	echo "Database is not connected.";
	exit();
}

$biggest_donation = "SELECT pledge_amount FROM donor_details WHERE largest = MAX(pledge_amount)";
$biggest_donation_results = mysqli_query($dbcon, $biggest_donation);
echo $biggest_donation_results;

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
					<form action="fundraiser.php" method = "post">
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
						<input type="submit" name="Search" value = "Search" action="fundraiser.php" >
					</form>
				</div>
			</header>
		<div class = "grid-container">
			<div class ="biggest_donation">
				<h1> Biggest Donation</h1>
				<?php
					echo $biggest_donation_results;
				?>
			</div>
			<div class ="top_fundraiser_event">
				<h1> Top fundraiser</h1>
				<p>this will have the biggest fundraise and who made a pledge to it</p>
			</div>
		</div>
        <footer>
				<p>Donate - Made by Simran Patel <p>
        </footer>
    </body>
</html>