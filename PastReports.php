<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>WeCare.html</title>
    <meta charset = "UTF-8" />
	<style>
	span{ color:red}
	#Next {
	display: block;
	font-size: 1.1em;
	font-weight: bold;	
	padding: 5px 15px;
	margin: 20px auto;
	width: 50px;
    background-color: #555;
	color: #ccc;
	background: -webkit-linear-gradient(#888, #555);
	background: linear-gradient(#888, #555);
	text-shadow: 0 -1px 0 #000;
	box-shadow: 0 1px 0 #666, 0 5px 0 #444, 0 6px 6px rgba(0,0,0,0.6);
	cursor: pointer;
}
	
	</style>
  </head>
  <body>
    <h1><span>We</span>Care</h1>
    
	<p>
	<h3><center>Previous Reports</center> </h3>
<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "wecare";

$connection = mysqli_connect($server,$user, $password, $database);

$reportQuery = "Select * From wecare.report where Child_ID=".$_GET['id'];
$result = mysqli_query($connection,$reportQuery);
while ($reportEntries = mysqli_fetch_assoc($result))
{
	echo "<tr><td><center><a href='Report.php?id= ". $reportEntries['Child_ID'] ."&ts=".$reportEntries['timestamp']." '>" . $reportEntries['timestamp'] . "</a></center></td></tr>";
}

?>
	
		<?php echo'
		<form>
		<a id="Next" style="text-align: center" href="ChildDailyAct.php?id='.$_GET['id'].'">Back</a>
				
		</form>';
		?>
		</p>
        
      
    </form>
  </body>
</html>