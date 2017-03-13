<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>WeCareWorkerLanding.html</title>
    <meta charset = "UTF-8" />
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
		<form>
		<a id="edit" style="float: bottomPage;" href="AddNewChild.php">Edit</a>
		
		</form>
	</div>
<!-- columns divs, float left, no margin so there is no space between column, width=1/3 -->
<?php

$connect = mysqli_connect($server, $user, $password, $database);
$ChildKey = $_POST['id'];
$ChildQuery = "Select First_Name, Last_Name, Allergies, Parent_Name, Parent_Email, Parent_Phone_Num, Street, City, State, Zip, Special_Instructions From wecare.child where Child_ID=" . $_GET['id'];
$result = mysqli_query($connect, $ChildQuery);

while($ChildInfo = mysqli_fetch_assoc($result))
{
echo '<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF" valign="top">

   <div id="column1"style="float:left; margin:0; width:33%;  border-bottom: 1px solid black; border-top: 1px solid black;">
	<Center><b>Child Information</b></center>
	&nbsp;
    <p align="center">' . $ChildInfo['First_Name'] . ' ' . $ChildInfo['Last_Name'] . '  </p>
	 <p align="center"> 2/16/2012 </p> 
	 <p align="center">' . $ChildInfo['Allergies'] . ' </p>
    </div>

    <div id="column2" style="float:left; margin:0;width:33%; border-bottom: 1px solid black; border-top: 1px solid black;">
     <Center><b>Parent Information</b></center>
	 &nbsp;
	 <p align="center">' . $ChildInfo['Parent_Name'] . ' </p>
	 <p align="center">' . $ChildInfo['Parent_Email'] . ' </p>
	 <p align="center">' . $ChildInfo['Parent_Phone_Num'] . ' </p>
    </div>

    <div id="column3" style="float:left; margin:0;width:33%; border-bottom: 1px solid black; border-top: 1px solid black; border-right: 1px solid black;">
     <Center><b>Additional Information</b></center>
	 &nbsp;
	  <p align="center">' . $ChildInfo['Street'] . " " . $ChildInfo['City'] . " " . $ChildInfo['State'] . " " . $ChildInfo['Zip'] . ' </p>
	 <p align="center">' .  $ChildInfo['Special_Instructions'] . ' </p>
    </div>
</div>';
}

$conn = mysqli_connect($server, $user, $password, $database);
$ActivityQuery = "Select * From wecare.activity Where Child_ID=" . $_GET['id'];
$result = mysqli_query($conn, $ActivityQuery);

while($ActInfo = mysqli_fetch_assoc($result))
{
	
 echo '<div id="bottomPage" style="margin-left: 200px; background-color: #FFFFCC" valign="bottom" >
<form>
	<table width="80%" height="80%" cellspacing="35">
		
		<tr>
			<td><form><a id="pastReports" style="float: left" href="PastReports.php">View Past Reports</a></form></td>
			<td><form><a id="pastReports" style="float: left" href="Report.php?id= '. $ActInfo['Child_ID'] . '"> Preview Report</a></form></td>
			<td> </td>
		</tr>
		<tr>
			<td><center>Nap Time: '. $ActInfo['Nap_Time'] . '</center></td>
			<td>Major Milestones: ' . $ActInfo['Milestones'] . '<td>
		</tr>
		<tr>
			<td><center>Food Eaten: '. $ActInfo['Food_Eaten'] . '</center></td>
			<td>Exercise: '. $ActInfo['Exercise'] . '</td>
					
		</tr>
		<tr>
			<td><center>Progressions: '. $ActInfo['Progression'] . '</center></td>
			<td>Comments: '. $ActInfo['Comments'] . '</td>		
		</tr>
		<tr>
			<td><center>Photos:</center></td>
			<td> </td>		
		</tr>
		<tr>
			<td></td>
			<td> </td>		
		</tr>';
}?>
					
	</table>
			

	
	</form>
	

	
</div>
    
		

      
        
        
     
    
  </body>
</html>
