<?php
//declaring php file

/* Connect to database */

$dbcon = mysqli_connect("localhost", "simranpatel", "aWkf8Rw", "simranpatel_fundraiser");
if ($dbcon == NULL) {
	echo "Database is not connected.";
	exit();
}

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
					<form action="search.php" method = "get">
						<input type="text" name='search' action="fundraiser.php">
						<?php
						if(isset($_GET['search'])){
							$search = $_GET['search'];

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
		</div>
		
		<div class = "grid-container">
			<div class ="biggest_donation">
				<h1><?php echo "Results relating to '$search'"; ?></h1>
				
				<?php
				if(isset($_GET['search'])){
					$search = $_GET['search'];
					$search_results = mysqli_query($dbcon,"SELECT charity_id, charity, goal, blurb FROM fundraiser_event WHERE charity_id LIKE '%" . $search  . "%'"); 
					if(!$search_results){
					die(mysqli_error($dbcon));
					echo $search_results;
					}
					echo $search_results;

					if ($search_results->num_rows > 0){
						echo "<table><tr><th>Fundraisers</th><th>Goal</th><th>Blurb of Fundraiser</th></tr>";
						while($row = $search_results->fetch_assoc()) {
							echo "<tr>"; 
								echo "<td>" .$row["charity"]. "</td>" ; 
								echo "<td>" .$row["goal"]. "</td>";
								echo "<td>" .$row["blurb"]. "</td>";	
								echo "<td><button type=\"submit\" name=\"pledge\" action=\"fundraiser.php\" value=\"Pledge\"</td></tr>";
						}
						echo "</table>";
					} else {
						echo "0 results";
					}
				}else{echo "no results";}
				?>
				
			</div>
		</div>
	        <footer>
				<p>Donate - Made by Simran Patel <p>
        </footer>
    </body>
</html>