<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>Report.html</title>
    <meta charset = "UTF-8" />
	<style>

h1 {
    color: black;
    text-align: left;
}
h2 {
    color: black;
    text-align: center;
}
h3 {
    color: black;
    text-align: center;
}

p {
    font-family: verdana;
    font-size: 20px;
	padding: 5px 5px 7px 100px;
}
#name{
	background-color: lightyellow;
}
#info{
	background-color: lightblue;
}
span{ color:red;
	float: left;
 }
 header{
	 background-color: white;
 }
 #back {
		display: block;	font-size: 1.1em; font-weight: bold; padding: 10px 15px;
		margin: 20px auto; margin-bottom: 2cm; width: 100px; background-color: #555;
		color: #ccc; background: -webkit-linear-gradient(#888, #555); background: linear-gradient(#888, #555);
		text-shadow: 0 -1px 0 #000;	box-shadow: 0 1px 0 #666, 0 5px 0 #444, 0 6px 6px rgba(0,0,0,0.6);
		cursor: pointer; position: absolute; bottom: -90px; left: 40px; 
}
 
	</style>
  </head>
  <header>
  <h1><span>We</span>Care</h1>
  <header>
  <body>

<?php
$server = "localhost";
$user = "root";
$pw = "";
$db = "wecare";

$conn = mysqli_connect($server,$user, $pw, $db);
$ReportQuery = "SELECT * FROM wecare.child INNER JOIN wecare.activity ON child.child_id = activity.child_id AND child.child_id =" . $_GET['id'];
$result = mysqli_query($conn,$ReportQuery);

while ($ChildReport = mysqli_fetch_assoc($result))
{
	

 $report = "<div id = 'name'><h2>Child Daily Report<h2> " . $ChildReport["First_Name"] . " " . $ChildReport["Last_Name"]. "</h1><h3> Date: " . date("m/d/Y") . "</h3></div>";
 
 $report .= "<div id = 'info'><p>Today, " . $ChildReport["First_Name"] . " ate " . $ChildReport["Food_Eaten"] . "</p>";
 
 $report .= "<p>Took a nap from: " . $ChildReport["Nap_Time"] . "</p>";
 $report .= "<p>Exercise Activities : " . $ChildReport["Exercise"] . "</p>";
 if ($ChildReport["Milestones"] != NULL)
  $report .= "<p> Milestones: " . $ChildReport["Milestones"] . "</p>";
 if ($ChildReport["Progression"] != NULL)
  $report .= "<p> Notable Progressions: " . $ChildReport["Progression"] . "</p>";
 if ($ChildReport["Comments"] != NULL)
  $report .= "<p> Comments: " . $ChildReport["Comments"] . "</p></div>";
 
 
 echo $report;
}

?>
		<form>
		<a id="back" style="text-align: center;" href="ChildDailyAct.php?id">Back</a>
				
		</form>
</body>
</html>