<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>EditDaycare.html</title>
    <meta charset = "UTF-8" />
	<script>
	function deleteCheck()
	{
		return confirm('Are you sure you want to delete this daycare entry?');
	}
	</script>

	<style>
		label, input{margin-bottom: 20px;}
		html, body{position:relative; height: 100%}
		div{ height: 100%}
		#names{border: 1px solid black}
		th, td {padding: 10px}
		#topPage{ height: 100%; padding: 10px;}
		.left{ width: 20%; float: left; text-align: right:}
		.right{ width: 70%; margin-left: 10px; float:left;}
		
		ul { list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333;}
		li {float: left;}
		li a {display: inline-block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;}
		li a:hover { background-color: #111;}
		span{ color:red}
		#Save1 {
		display: block;
		font-size: 1.1em;
		font-weight: bold;
		text-align: center;		
		padding: 5px 0px;		
		width: 10%;
		background-color: #555;
		color: #ccc;
		background: -webkit-linear-gradient(#888, #555);
		background: linear-gradient(#888, #555);
		text-shadow: 0 -1px 0 #000;
		box-shadow: 0 1px 0 #666, 0 5px 0 #444, 0 6px 6px rgba(0,0,0,0.6);
		cursor: pointer;}
		#new {
		display: block;	font-size: 1.1em; font-weight: bold; padding: 5px 5px;
		margin: 20px auto; margin-top: .5cm; width: 100px; background-color: #555;
		color: #ccc; background: -webkit-linear-gradient(#888, #555); background: linear-gradient(#888, #555);
		text-shadow: 0 -1px 0 #000;	box-shadow: 0 1px 0 #666, 0 5px 0 #444, 0 6px 6px rgba(0,0,0,0.6);
		cursor: pointer; left: 40px; text-align: center;	}
		
		#trial {
		display: block;
		font-size: 1.1em;
		text-align: left;
		font-weight: bold;	
		padding: 5px 45px;		
		width: 5%;
		background-color: #555;
		color: #ccc;
		background: -webkit-linear-gradient(#888, #555);
		background: linear-gradient(#888, #555);
		text-shadow: 0 -1px 0 #000;
		box-shadow: 0 1px 0 #666, 0 5px 0 #444, 0 6px 6px rgba(0,0,0,0.6);
		cursor: pointer;
		}
} 
	</style>
  </head>
  <body>
    <h1><span>We</span>Care</h1>
	<ul>
		<li><a href="ChildDailyAct.php">Home</a></li>
		<li><a href="AddNewChild.php">Add Child</a></li>
		<li><a href="AddNewWorker.php">Add Employee</a></li>
		<li><a href="EditDaycare.php">Add/Edit Daycare</a></li>
		<li><a href="PasswordReset.php">Password Reset</a></li>
	</ul>
	<div id="names" style="width: 200px;background-color: #FFFFCC; float: left;">
	<form href="EditDaycare.php" method="get">
		<input type="submit" value="Add New" id="new">	
		
	</form>
		<table rules="rows" width="200px">
			<tr>
				<th><center>Name</center></th>
				
<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "wecare";

$connection = mysqli_connect($server,$user, $password, $database);

$DaycareQuery = "Select Daycare_Name, Daycare_ID From wecare.daycare";
$result = mysqli_query($connection,$DaycareQuery);
while ($DaycareList = mysqli_fetch_assoc($result))
{
	echo "<tr><td><center><a href='EditDaycare.php?id= " . $DaycareList['Daycare_ID'] . " '>" . $DaycareList["Daycare_Name"] . "</a></center></td></tr>";
}

?>
		</table>
	</div>

	
<?php

$connect = mysqli_connect($server, $user, $password, $database);
$DaycareKey = $_POST['id'];
$Daycare = "Select Daycare_Name, Phone_Num, Street, City, State, Zip From wecare.daycare where Daycare_ID=" . $_GET['id'];
$result = mysqli_query($connect, $Daycare);

 
if (empty($DaycareKey) && empty($result)){
	
	if (isset($_POST['save']))
	{
		$DaycareInfo = "INSERT INTO wecare.daycare (Daycare_Name, Phone_Num, Street, City, State, Zip)
				VALUES (".$_POST["dName"].",".$_POST["dPhone"].",".$_POST["dStreet"].",".$_POST["dCity"].",".$_POST["dState"].",".$_POST["dZip"].") ";
		
		$result = mysqli_query($connection, $DaycareInfo);
		echo "<meta http-equiv='refresh' content='0'>";
	}
?>
	<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF;" valign="top">
	<b>Please add a new Daycare, or select a Daycare to Edit/Delete</b>
	<p></p>

 <!-- columns divs, float left, no margin so there is no space between column, width=1/3 -->
    <form method="post">
			
			<div class="left">
				<label for="name">Daycare Name</label>
			</div>
			<div class="right">
				<input type = "text" size="16" name = "dName" value="">
			</div>
			
			<div class="left">
				<label for="street">Daycare Phone</label>
			</div> 
			<div class="right">
				<input type = "text" size="16" name = "dPhone" value="" >
			</div><
			     
			<div class="left">
				<label for="street">Daycare Street</label>
			</div> 
			<div class="right">
				<input type = "text" size="16" name = "dStreet" value="" >
			</div><
                  
			<div class="left">
				<label for="city">Daycare City</label> 
			</div>
			<div class="right">
				<input type = "text" size="16" name = "dCity" value="">
			</div>
			
			<div class="left">
				<label for="state">Daycare State</label>
			</div><div class="right">
				<input type = "text" name = "dState" size="16" value="" >
			</div>
			
			<div class="left">
				<label for="zip">Daycare Zip</label>
			</div><div class="right">
				<input type = "text" name = "dZip" size="16" value="">
			</div>
		
		<div class="left">
			<button type="submit" name="save">Save</button>
	</form>
	<form action="ChildDailyAct.php">
		</div> <div class="right">
			<button type="submit" name="back">Back</button>
			</div></div>
	</form>
		
<?php
}
else{

while($DaycareInfo = mysqli_fetch_assoc($result))
	
{
	if (isset($_POST['update']))
		{
			$Name=$_POST['dName'];
			$DaycareKey=$_GET['id'];
			$Phone=$_POST['dPhone'];
			$Street=$_POST['dStreet'];
			$City=$_POST['dCity'];
			$State=$_POST['dState'];
			$Zip=$_POST['dZip'];
			$UpdateDaycare = ("UPDATE wecare.daycare SET Daycare_Name =" . $Name . ",Phone_Num =" . $Phone . ", Street=" . $Street . ", City=" . $City . ", State=" . $State . ", Zip=" . $Zip . " WHERE daycare.daycare_ID=" . $DaycareKey);
				
			$result = mysqli_query($connection, $UpdateDaycare);
			echo "<meta http-equiv='refresh' content='0'>";
		}
		
	if (isset($_POST['delete']))
		{
			$DaycareKey=$_GET['id'];
			
						
			$DeleteDaycare = "DELETE FROM wecare.daycare WHERE daycare.Daycare_ID=" . $DaycareKey;
		
			$result = mysqli_query($connection, $DeleteDaycare);
			echo "<meta http-equiv='refresh' content='0'>";
		}
?>

<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF;" valign="top">


 <!-- columns divs, float left, no margin so there is no space between column, width=1/3 -->
    <form method="post">
			
			<div class="left">
				<label for="name">Daycare Name</label>
			</div>
			<div class="right">
				<?php echo '<input type = "text" size="16" name = "dName" value="' . $DaycareInfo['Daycare_Name'] . '">'?>
			</div>
			
				<div class="left">
				<label for="ParentNum" >Daycare Number</label>
			</div><div class="right">
				<?php echo '<input type = "text" name = "dPhone" size="16" value="' . $DaycareInfo['Phone_Num'] . '" >' ?>
			</div>
            
			<div class="left">
				<label for="street">Daycare Street</label>
			</div> 
			<div class="right">
				<?php echo '<input type = "text" size="16" name = "dStreet" value="' . $DaycareInfo['Street'] . '" >'?>
			</div>
                  
			<div class="left">
				<label for="city">Daycare City</label> 
			</div>
			<div class="right">
				<?php echo '<input type = "text" size="16" name = "dCity" value="' . $DaycareInfo['City'] . '">' ?>
			</div>
			
			<div class="left">
				<label for="state">Daycare State</label>
			</div><div class="right">
				<?php echo '<input type = "text" name = "dState" size="16" value="' . $DaycareInfo['State'] . '" >' ?>
			</div>
			
			<div class="left">
				<label for="zip">Daycare Zip</label>
			</div><div class="right">
				<?php echo '<input type = "text" name = "dZip" size="16" value="' . $DaycareInfo['Zip'] . ' ">' ?>
			</div>

		<div class="left">
		
		<button type="submit" name="update">Update</button>
		
		</div> <div class="right">
		<button type="submit" name="delete" onclick="return deleteCheck()" >Delete</button>
		
		</form>
	<?php ;}
}
?>


  </body>
</html>