<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>Report.php</title>
    <meta charset = "UTF-8" />
	<style>
		span{ color:red}
		th, td {padding: 30px; text-align: center }
                div{ height: 100%}
	</style>
  </head>
  <body>
	<h1><span>We</span>Care</h1>
	
        
     
<?php
$server = "localhost";
$user = "root";
$pw = "";
$db = "wecare";
$conn =mysqli_connect($server, $user, $pw, $db);

$NameQuery = "SELECT First_Name, Last_Name FROM wecare.report";
$result = mysqli_query($conn, $NameQuery);

$today = today.date;
while ($row = mysql_fetch_object($result))
	{
		//echo "<center><h2>Child Name: " . $row["First_Name"]. " " . $row["Last_Name"];
                //echo "<br> Date: $today";
                echo '<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF" valign="top">
   <div id="column1"style="float:left; margin:0; width:33%;  border-bottom: 1px solid black; border-top: 1px solid black;">
	<Center><b>Child Information</b></center>
	&nbsp;
    <p align="center">' .'Name: '. $NameQuery['First_Name'] . ' ' . $NameQuery['Last_Name'] . '  </p>
	 <p align="center">'. 'Date:'. $NameQuery[$today].'</p> 
	 
    </div>';
		
                        
		
		
	}
 

        
	
       
$connect =mysqli_connect($server, $user, $pw, $db);

$ChildQuery = "SELECT Child_ID, Timestamp, Report_Data FROM wecare.report";
$result = mysqli_query($connect, $ChildQuery);


while ($ChildQuery = mysql_fetch_assoc($result))
	{
		//echo "Child ID: " . $ChildQuery["Child_ID"]. " ". "<br>". "Timestamp: " . $ChildQuery["Timestamp"]. " ".
                       // "<br>". "Report Data: " . $ChildQuery["Report_Data"]. "<br>";
		echo '<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF" valign="top">
   <div id="column2"style="float:left; margin:0; width:33%;  border-bottom: 1px solid black; border-top: 1px solid black;">
	<Center><b>Child Information</b></center>
	&nbsp;
    <p align="center">' .'Name'. $ChildQuery['Child_ID'] . ' ' .'<br>'.''
                        . ' '.'Timestam: '. $ChildQuery['Timestamp'] . '  </p>
	 <p align="center">'. 'Report Data:'. $ChildQuery["Report_Data"].' </p> 
	 
    </div>';
		
	}
        
      

 
$cont =mysqli_connect($server, $user, $pw, $db);

$ReportQuery = "SELECT Nap_Time, Food_Eaten, Exercise, Progression, Milestone, Comments  FROM wecare.activity";
$result = mysqli_query($cont, $ReportQuery);

while ($ReportQuery = mysqli_fetch_assoc($result)) {
    //echo "Nap Time: " . $ReportQuery["Nap_Time"]. " ". "<br>". "Food Eaten: " . " ". $ReportQuery["Food_Eaten"].
           // " ". "<br>". "Exercise: ". " ". $ReportQuery["Exercise"]. " ". "<br>". "Progression: ". " ". $ReportQuery["Progression"].
           // " ". "<br>"."Milestone: ". " ". $ReportQuery["Milestone"]. " ". "<br>". "Comments: ". " ". $ReportQuery["Comments"];
    
echo '
    <div id="column3" style="float:left; margin:0;width:33%; border-bottom: 1px solid black; border-top: 1px solid black;">
     <Center><b>Parent Information</b></center>
	 &nbsp;
	 <p align="center">'.'Nap Time:'. $ReportQuery["Nap_Time"].' </p>
	 <p align="center">'.'Food Eaten:'. $ReportQuery["Food_Eaten"].' </p>
	 <p align="center">'.'Exercise:'. $ReportQuery["Exercise"].' </p>
    </div>
    <div id="column4" style="float:left; margin:0;width:33%; border-bottom: 1px solid black; border-top: 1px solid black; border-right: 1px solid black;">
     <Center><b>Additional Information</b></center>
	 &nbsp;
	  <p align="center">'.'Prograssion:'. $ReportQuery["Progression"].' </p>
	 <p align="center">'.'Milestone:'. $ReportQuery["Milestone"].' </p>
          <p align="center">'.'Comments:'. $ReportQuery["Comments"].' </p>
    </div>
</div>';
        
 
}?>
		<form>
	
		<a id="Save" style="float: left;" href="ChildDailyAct.php">Edit</a>
		
		<p>
		<a id="Save" style="float: right;"  href="Report.php">Send</a>
		</p>
		</form>
		</p>
        
	
	<center><img src="kidsrunning.jpeg" alt="kidrunning" style="width:304px;height:228px;"></center>

	</body>
</html>