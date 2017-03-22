<?php
header('Location: ChildDailyAct.php?id='.$_GET['id']); //reload back to the activity page
$server = "localhost";
$user = "root";
$pw = "";
$db = "wecare";

//connect to DB
$conn = mysqli_connect($server,$user, $pw, $db);

// perform JOIN retrieving neccessary information for the report

$ReportQuery = "SELECT * FROM wecare.child INNER JOIN wecare.activity ON DATE(activity.Timestamp)=CURDATE() AND child.child_id = activity.child_id AND child.child_id =" . $_GET['id'];
$result = mysqli_query($conn,$ReportQuery);
$ChildReport = mysqli_fetch_array($result);

//Build the report

$report = "<div id = 'name'><h2>Child Daily Report<h2> " . $ChildReport["First_Name"] . " " . $ChildReport["Last_Name"]. "</h1><h3> Date: " . date("m/d/Y") . "</h3></div>";
 
$report .= "<div id = 'info'><p>Today, " . $ChildReport["First_Name"] . " ate " . $ChildReport["Food_Eaten"] . "</p>";
 
$report .= "<p>Took a nap from: " . $ChildReport["Nap_Time"] . "</p>";
$report .= "<p>Exercise Activities : " . $ChildReport["Exercise"] . "</p>";
if ($ChildReport["Milestones"] != NULL)
	{
	$report .= "<p> Milestones: " . $ChildReport["Milestones"] . "</p>";
	}
if ($ChildReport["Progression"] != NULL)
	{
	$report .= "<p> Notable Progressions: " . $ChildReport["Progression"] . "</p>";
	}
if ($ChildReport["Comments"] != NULL)
	{
	$report .= "<p> Comments: " . $ChildReport["Comments"] . "</p></div>";
	}
 

 // Escapes special characters in a string for use in an SQL statement
 
$reportdata = mysqli_real_escape_string($conn, $report);
 
// perform insert - saving the report
$sql = "INSERT INTO wecare.report (`Child_ID`, `Report_Data`) VALUES ('".$_GET['id']."', '$reportdata')";
$result = mysqli_query($conn, $sql);
?>