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
        <title> Welly Donate</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <div id="welly_donate">
            <header>
                <h1>Welly </h1>
                <nav>
                    <ul>
                        <!--all the links in the nav bar are located below-->
                        <li><a href="log_in.php"></a>Log In</a>/li>
                        <li><a href="sign_up.php">Sign Up</a></li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="pledge.php">PLEDGE</a></li>
                    </ul>
                </nav>
            </header>
        </div>
		<div class = "grid-container">
			<div class ="biggest_donation">
				<h1> Log into your account</h1>
				<p>enter email adress</p>
			</div>
			<div class ="top_fundraiser_event">
				<h1> Top fundraiser</h1>
				<p>this will have the biggest fundraise and who made a pledge to it</p>
			</div>
		</div>
        <footer>
				<p>Welly donate - Made by Simran Patel <p>
        </footer>
    </body>
</html>