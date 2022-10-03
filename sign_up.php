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
				<h1>Sign up to become a fundraiser</h1>
				<form action="insert.php" method="post">
				
				Full name : <input type ="text" name="full_name" placeholder="Your Full Name"><br>
				Birth Date : <input type = "text" name = "birth_date" placeholder="yyyy-mm-dd"><br>
				Email Address: <input type = "text" name = "email"><br>
				<input type ="submit" value ="Sign Up">
			
				</form>	
				<form action=log_in.php>
				<h2>Want to log in instead?</h2>
				<input type ="submit" value ="Log In">
				</form>	
			</div>
		</div>
        <footer>
				<p>Donate - Made by Simran Patel <p>
        </footer>
    </body>
</html>
		