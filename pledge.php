<?php
//declaring php file

/* Connect to database */

$dbcon = mysqli_connect("localhost", "simranpatel", "aWkf8Rw", "simranpatel_fundraiser");
if ($dbcon == NULL) {
	echo "Database is not connected.";
	exit();
}	

$all_catagory_query = "SELECT catagory, charity_id FROM fundraiser_event";
$all_catagory_result = mysqli_query($dbcon, $all_catagory_query);
	
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
					<form action="" method = "post">
						<input type="text" name='search'>
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
						<input type="submit" name="Search" value = "Search" >
					</form>
				</div>
            </header>
        </div>
		<div class = "grid-container">
			<div class ="all_fundraiser" id = "all_fundraiser">
				<h1>All Fundraisers</h1>
				<p>Sort by catagory of charities</p>
				<form name="catagory_form" method="get"> 
					<select name="catagory"> Sort by Catagory:<br/> 
						<option value="All"> All</option> 
						<option value="Medical"> Medical</option> 
						<option value="Family"> Family</option> 
						<option value="Multi Purpose"> Multi Purpose</option>
						<option value="Children"> Children</option>  
						<option value="Women"> Women</option> 
						<input type="submit" value="Sort ">
					</select> 
				</form> 
				<?php
				$selected = $_GET["catagory"];
				echo $selected;
				if ($selected == "All"){
					echo "all will print";
					$catagory_all = mysqli_query($dbcon,"SELECT charity_id, charity, goal, blurb FROM fundraiser_event ORDER BY charity ASC"); 
					if ($catagory_all->num_rows > 0){
						echo "<table><tr><th>Fundraisers</th><th>Goal</th><th>Blurb of Fundraiser</th></tr>";
						while($row = $catagory_all->fetch_assoc()) {
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
				}
				elseif ($selected == "Medical") {
					$catagory_medical = mysqli_query($dbcon,"SELECT charity_id, charity, goal, blurb FROM fundraiser_event WHERE catagory = 'Medical'"); 
					if ($catagory_medical->num_rows > 0){
						echo "<table><tr><th>Fundraisers</th><th>Goal</th><th>Blurb of Fundraiser</th></tr>";
						while($row = $catagory_medical->fetch_assoc()) {
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
				}
				elseif ($selected == "Family") {
					$catagory_family = mysqli_query($dbcon,"SELECT charity_id, charity, goal, blurb FROM fundraiser_event WHERE catagory = 'Family'"); 
					if ($catagory_family->num_rows > 0){
						echo "<table><tr><th>Fundraisers</th><th>Goal</th><th>Blurb of Fundraiser</th></tr>";
						while($row = $catagory_family->fetch_assoc()) {
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
				}
				elseif ($selected == "Multi Purpose") {
					$catagory_multi = mysqli_query($dbcon,"SELECT charity_id, charity, goal, blurb FROM fundraiser_event WHERE catagory = 'Multi'"); 
					if ($catagory_multi->num_rows > 0){
						echo "<table><tr><th>Fundraisers</th><th>Goal</th><th>Blurb of Fundraiser</th></tr>";
						while($row = $catagory_multi->fetch_assoc()) {
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
				}
				elseif ($selected == "Children") {
					$catagory_children = mysqli_query($dbcon,"SELECT charity_id, charity, goal, blurb FROM fundraiser_event WHERE catagory = 'Children'"); 
					if ($catagory_children->num_rows > 0){
						echo "<table><tr><th>Fundraisers</th><th>Goal</th><th>Blurb of Fundraiser</th></tr>";
						while($row = $catagory_children->fetch_assoc()) {
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
				}
				elseif ($selected == "Women"){
					$catagory_women = mysqli_query($dbcon,"SELECT charity_id, charity, goal, blurb FROM fundraiser_event WHERE catagory = 'Women'"); 
					if ($catagory_women->num_rows > 0){
						echo "<table><tr><th>Fundraisers</th><th>Goal</th><th>Blurb of Fundraiser</th></tr>";
						while($row = $catagory_women->fetch_assoc()) {
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
				}
				else{
				echo"there were no results found";
				}
				
				?>
			</div>
		</div>
        <footer>
				<p>Donate - Made by Simran Patel </p>
        </footer>
    </body>
</html>