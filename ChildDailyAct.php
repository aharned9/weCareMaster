<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>WeCareWorkerLanding.html</title>
    <meta charset = "UTF-8" />
	<script>
	function deleteCheck(){
		return confirm('Are you sure you want to delete this entry?');
			
	}
	</script>
	<style>
		html, body{position:relative; height: 100%}
		div{ height: 100%}
		#names{border: 1px solid black}
		th, td {padding: 10px}
		span{ color:red}
		#topPage{ height: 25%}
		#bottomPage{height:75%}
		#pastReports {
		display: block;	font-size: 1.1em; font-weight: bold; padding: 10px 15px;
		margin: 20px auto; margin-bottom: 2cm; width: 150px; background-color: #555;
		color: #ccc; background: -webkit-linear-gradient(#888, #555); background: linear-gradient(#888, #555);
		text-shadow: 0 -1px 0 #000;	box-shadow: 0 1px 0 #666, 0 5px 0 #444, 0 6px 6px rgba(0,0,0,0.6);
		cursor: pointer;
		}
		#sendReports {
		display: block;	font-size: 1.1em; font-weight: bold; padding: 10px 15px;
		margin: 20px auto; margin-bottom: 2cm; width: 100px; background-color: #555;
		color: #ccc; background: -webkit-linear-gradient(#888, #555); background: linear-gradient(#888, #555);
		text-shadow: 0 -1px 0 #000;	box-shadow: 0 1px 0 #666, 0 5px 0 #444, 0 6px 6px rgba(0,0,0,0.6);
		cursor: pointer;
		}
		#edit {
		display: block;	font-size: 1.1em; font-weight: bold; padding: 10px 15px;
		margin: 20px auto; margin-bottom: 2cm; width: 100px; background-color: #555;
		color: #ccc; background: -webkit-linear-gradient(#888, #555); background: linear-gradient(#888, #555);
		text-shadow: 0 -1px 0 #000;	box-shadow: 0 1px 0 #666, 0 5px 0 #444, 0 6px 6px rgba(0,0,0,0.6);
		cursor: pointer; position: absolute; bottom: -90px; left: 40px; 
}
		}
		
		}
	
	#pastBtn{float: left; width: 150px } 

} 
	</style>
  </head>
  <body>
    <h1><span>We</span>Care</h1>
	<div id="names" style="width: 200px;background-color: #FFFFCC; float: left;">
		<table rules="rows" width="200px">
			<tr>
				<th><center>Name</center></th>
<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "wecare";

$connection = mysqli_connect($server,$user, $password, $database);

$RosterQuery = "Select First_Name, Last_Name, Child_ID From wecare.child";
$result = mysqli_query($connection,$RosterQuery);
while ($ChildRoster = mysqli_fetch_assoc($result))
{
	echo "<tr><td><center><a href='ChildDailyAct.php?id= ". $ChildRoster['Child_ID'] . " '>" . $ChildRoster["First_Name"] . " " . $ChildRoster["Last_Name"] . "</a></center></td></tr>";
}

?>
		</table>

	</div>
<!-- columns divs, float left, no margin so there is no space between column, width=1/3 -->
<?php

$connect = mysqli_connect($server, $user, $password, $database);
$ChildKey = $_POST['id'];
$ChildQuery = "Select First_Name, Last_Name, Allergies, Parent_Name, Parent_Email, Parent_Phone_Num, Street, City, State, Zip, Special_Instructions From wecare.child where Child_ID=" . $_GET['id'];
$result = mysqli_query($connect, $ChildQuery);

while($ChildInfo = mysqli_fetch_assoc($result))
{?>
    <div id="topPage" style="margin-left: 200px; background-color: #CCFFFF" valign="top">

   <div id="column1"style="float:left; margin:0; width:33%;  border-bottom: 1px solid black; border-top: 1px solid black;">
	<Center><b>Child Information</b></center>
	&nbsp;
    <?php echo '<p align="center">' . $ChildInfo['First_Name'] . ' ' . $ChildInfo['Last_Name'] . '  </p>'?>
	 <p align="center"> 2/16/2012 </p> 
	 <?php echo '<p align="center">' . $ChildInfo['Allergies'] . ' </p>'?>
    </div>

    <div id="column2" style="float:left; margin:0;width:33%; border-bottom: 1px solid black; border-top: 1px solid black;">
     <Center><b>Parent Information</b></center>
	 &nbsp;
	 <?php echo '<p align="center">' . $ChildInfo['Parent_Name'] . ' </p>'?>
	<?php echo ' <p align="center">' . $ChildInfo['Parent_Email'] . ' </p>'?>
	<?php echo ' <p align="center">' . $ChildInfo['Parent_Phone_Num'] . ' </p>'?>
    </div>

    <div id="column3" style="float:left; margin:0;width:33%; border-bottom: 1px solid black; border-top: 1px solid black; border-right: 1px solid black;">
     <Center><b>Additional Information</b></center>
	 &nbsp;
	 <?php echo ' <p align="center">' . $ChildInfo['Street'] . " " . $ChildInfo['City'] . " " . $ChildInfo['State'] . " " . $ChildInfo['Zip'] . ' </p>'?>
	 <?php echo '<p align="center">' .  $ChildInfo['Special_Instructions'] . ' </p>'?>
    </div>
</div><?php
}?>
<?php
$conn = mysqli_connect($server, $user, $password, $database);
$ActivityQuery = "Select * From wecare.activity Where DATE(activity.Timestamp)=CURDATE() AND Child_ID=" . $_GET['id'];
$result = mysqli_query($conn, $ActivityQuery);

if(mysqli_num_rows($result)==0){
	if (isset($_POST['save']))
	{
		$sql = "INSERT INTO wecare.activity (Child_ID,Nap_Time,Food_Eaten, Exercise, Progression, Milestones, Comments)
				VALUES ('".$_GET["id"]."','".$_POST["napTime"]."','".$_POST["foodEaten"]."','".$_POST["exercise"]."','".$_POST["progressions"]."','".$_POST["majorMile"]."','".$_POST["comments"]."') ";
		
		$result = mysqli_query($connection, $sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}
	
	
	
	?>
	<div id="bottomPage" style="margin-left: 200px; background-color: #FFFFCC" valign="bottom" >
<form method="post">
	<table width="80%" height="80%" cellspacing="35">
		
		<tr>
			<td><form><a id="pastReports" style="float: left" href="PastReports.php">View Past Reports</a></form></td>
			<?php echo '<td><form><a id="pastReports" style="float: left" href="Report.php?id= '. $ActInfo['Child_ID'] . '"> Preview Report</a></form></td>'?>
			<td> </td>
		</tr>
		<tr>
			<td><center>Nap Time: <input type = "text" size="16" name = "napTime" value=""></center></td>
			<td>Major Milestones: <input type = "text" size="16" name = "majorMile" value=""><td>
		</tr>
		<tr>
			<td><center>Food Eaten: <input type = "text" size="16" name = "foodEaten" value=""></center></td>
			<td>Exercise: <input type = "text" size="16" name = "exercise" value=""></td>
					
		</tr>
		<tr>
			<td><center>Progressions: <input type = "text" size="16" name = "progressions" value=""></center></td>
			<td>Comments: <input type = "text" size="16" name = "comments" value=""></td>	
		</tr>
		<tr>
			<td><center>Photos:</center></td>
			<td><form action=""> <button type="submit" name="sendReport">Send Report</button></form> </td>		
		</tr>
		<tr>
			<td><button type="submit" name="save">Save</button> </td>
			<td> </td>		
		</tr>	
	</table>
		
	</form>	
	</form>	
</div><?php
}
else{			

while($ActInfo = mysqli_fetch_assoc($result))
{
	if (isset($_POST['update']))
		{
			$napTime=$_POST['napTime'];
			$childKey=$_GET['id'];
			$majorMile=$_POST['majorMile'];
			$foodEaten=$_POST['foodEaten'];
			$exercise=$_POST['exercise'];
			$progressions=$_POST['progressions'];
			$comments=$_POST['comments'];

			$sql = ("UPDATE wecare.activity SET Nap_Time='$napTime', Food_Eaten='$foodEaten', 
			Exercise='$exercise', Progression='$progressions', Milestones='$majorMile', Comments='$comments'
			WHERE DATE(activity.Timestamp)=CURDATE() AND activity.Child_ID='$childKey'");
				
				
		
			$result = mysqli_query($connection, $sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
		
	if (isset($_POST['delete']))
		{
			$childKey=$_GET['id'];
			
						
			$sql = "DELETE FROM wecare.activity WHERE  DATE(activity.Timestamp)=CURDATE() AND activity.Child_ID='$childKey'";
		
			$result = mysqli_query($connection, $sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
	
	
	
	
	
	?>
	
    <div id="bottomPage" style="margin-left: 200px; background-color: #FFFFCC" valign="bottom" >
<form method="post">
	<table width="80%" height="80%" cellspacing="35">
		
		<tr>
			<td><form><a id="pastReports" style="float: left" href="PastReports.php">View Past Reports</a></form></td>
			<?php echo '<td><form><a id="pastReports" style="float: left" href="Report.php?id= '. $ActInfo['Child_ID'] . '"> Preview Report</a></form></td>'?>
			<td> </td>
		</tr>
		<tr>
			<td><center>Nap Time:<?php echo ' <input type = "text" size="16" name = "napTime" value="'. $ActInfo['Nap_Time'] . '"></center></td>'?>
			<td>Major Milestones:<?php echo '<input type = "text" size="16" name = "majorMile" value="' . $ActInfo['Milestones'] . '"><td>'?>
		</tr>
		<tr>
			<td><center>Food Eaten:<?php echo '<input type = "text" size="16" name = "foodEaten" value="'. $ActInfo['Food_Eaten'] . '"> </center></td>'?>
			<td>Exercise:<?php echo '<input type = "text" size="16" name = "exercise" value="'. $ActInfo['Exercise'] . '"> </td>'?>
					
		</tr>
		<tr>
			<td><center>Progressions:<?php echo '<input type = "text" size="16" name = "progressions" value="'. $ActInfo['Progression'] . '"> </center></td>'?>
			<td>Comments:<?php echo '<input type = "text" size="16" name = "comments" value="'. $ActInfo['Comments'] . '"> </td>'?>	
		</tr>
		<tr>
			<td><center>Photos:</center></td>
			<td><form action=""> <button type="submit" name="sendReport">Send Report</button></form> </td>		
		</tr>
		<tr>
			<td><button type="submit" name="update">Update</button> </td>
			<td> <button type="submit" name="delete" onclick="return deleteCheck()">Delete</button></td>		
		</tr><?php
}?>
					
	</table>
			

	
	</form>
	

	
</div>
<?php } ?>
    
		

      
        
        
     
    
  </body>
</html>