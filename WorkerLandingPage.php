<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>WeCareWorkerLanding.html</title>
    <meta charset = "UTF-8" />
	<style>
		html, body{ height: 100%}
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
$pw = "";
$db = "wecare";

$conn = mysqli_connect($server,$user, $pw, $db);

$RosterQuery = "Select First_Name, Last_Name, Child_ID From wecare.child";
$result = mysqli_query($conn,$RosterQuery);
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

<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF" valign="top">



</div>

<div id="bottomPage" style="margin-left: 200px; background-color: #FFFFCC" valign="bottom" >


	
</div>
    
		

      
        
        
     
    
  </body>
</html>
