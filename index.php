<?php
	//Connect database
	include "database/connect.php";
	
	//Read session
	include 'session.php';

	//Read button script
	include "top_button.html";
?>

</!DOCTYPE html>
<html>
<head>
	<title>GUEST LECTURES MAINTANENCE</title>
	<style type="text/css">
		a:hover{
			font-size: 24px;
		}
		a{
			color: black;
		}
		.top{
			font-size: 34px;
			font-family: Helvetica;
			text-align: center;
		}
		form{
			margin-left: 60px;
			margin-top: 15px;
			margin-right: 60px;

		}
		input[type=submit]{
			padding: 12px;
			color: black;
			border: none;
			background-color:#8EEDEC ;
			font-weight: 900;
			font-family: Times New Roman;
			font-size: 16px;
			text-align: center;
			width: auto;
			border-radius: 12px;
		}
		input[type=submit]:hover{
			background-color: #2B65EC;
			border-radius: 12px;
		}
		table{
			margin-left:60px
			margin-right:60px;
			text-align:justify;
			border-bottom-style: solid;
			border-bottom-color: #FAEBD7;
			border-top-style: solid;
			border-top-color: #FAEBD7;
			border-right-style: solid;
			border-right-color: #FAEBD7;
			border-left-style: solid;
			border-left-color: #FAEBD7;
			background-color: #FFF5EE;
			border-radius: 12px;
			
		}
		.event_name{
			font-family: Times New Roman;
			border-style: none;
			font-size: 30px;
			margin-top: 10px;
			background-color: #FFF5EE;
			

		}
	</style>
</head>
<body background="image\wal.jpg" >
	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
	<hr width="auto" size="10" style="background: #C24641"> <!-- line under the title #101820FF-->
	<div class="top">
		<h2>GUEST LECTURES DETAIL MAINTENANCE</h2>
	</div>
	<hr width="auto" size="10" style="background:#C24641 ">

	<!--Search event form #66CDAA-->
	<div class="search" style="text-align: center">
		<form action="event_detail.php" method="POST" >
			<input type="text" size="40" name="searchevent" placeholder="Enter event name to search event" style="font-size: 16px;padding: 10px" />
			<input type="submit" name="search" value="Search"/>
		</form>
	</div>
	<hr width="auto" size="4" style="background: #C24641"> <!-- line under the title #808000-->

	<!--Display all event area-->
	<div class="content" align="center">
		<?php
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			//Read all event
			$read_DB = "SELECT * FROM event_details ORDER BY EventDate DESC";
			$result = mysqli_query($conn, $read_DB);
			
			//Display all result
			if($result){
    			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    				echo "<form action='event_detail.php' method='POST'><table>";
        			echo "<tr><td><input class ='event_name'  type='text' name='eventname' value='".$row['EventName']."' size=65 readonly></td></tr>";
        			echo "<tr><td><span  style='font-size:16px'><hr>". $row['EventDescription']."</td></tr>";
        			echo "<tr><td><br></td></tr>";
        			echo "<tr><td style='text-align:center'><input type='submit' name='more_detail' value='More Details'/></td></tr>";
        			echo "<tr><td><br></td></tr>";
        			echo "</table></form><br>";
    			}
			}
		?>
	</div>
</body>
</html>