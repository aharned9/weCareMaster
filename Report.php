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
$childKey = $_GET['id'];
$tsKey = $_GET['ts'];
$ReportQuery = "SELECT * FROM wecare.report where report.timestamp ='$tsKey' AND report.child_ID='$childKey'";
$result = mysqli_query($conn,$ReportQuery);



if (!$result) 
{
	die("Could not successfully run query ($ReportQuery) from $db: " .	
		mysqli_error($conn) );
}
else
{	
$ChildReport = mysqli_fetch_assoc($result);

print $ChildReport['Report_Data'];

 

}

?>
		<?php echo'
		<form>
		<a id="back" style="text-align: center" href="PastReports.php?id='.$_GET['id'].'">Back</a>
				
		</form>';
		?>
		</body>
</html>