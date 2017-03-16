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
		<li><a href="PasswordReset.php">Password Reset</a></li>
	</ul>
	<div id="names" style="width: 200px;background-color: #FFFFCC; float: left;">
	<form action="AddNewChild.php" method="get">
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

$RosterQuery = "Select First_Name, Last_Name, Child_ID From wecare.child";
$result = mysqli_query($connection,$RosterQuery);
while ($ChildRoster = mysqli_fetch_assoc($result))
{
	echo "<tr><td><center><a href='AddNewChild.php?id= ". $ChildRoster['Child_ID'] . " '>" . $ChildRoster["First_Name"] . " " . $ChildRoster["Last_Name"] . "</a></center></td></tr>";
}

?>
		</table>
	</div>

	
<?php

$connect = mysqli_connect($server, $user, $password, $database);
$ChildKey = $_POST['id'];
$ChildQuery = "Select First_Name, Last_Name, Street, City, State, Zip, Allergies, Parent_Name, Parent_Email, Parent_Phone_Num, Special_Instructions From wecare.child where Child_ID=" . $_GET['id'];
$result = mysqli_query($connect, $ChildQuery);

 
if (empty($ChildKey) && empty($result)){
	
	if (isset($_POST['save']))
	{
		$sql = "INSERT INTO wecare.child (First_Name, Last_Name, Street, City, State, Zip, Allergies, Parent_Name, Parent_Email, Parent_Phone_Num, Special_Instructions)
				VALUES ('".$_POST["fName"]."','".$_POST["lName"]."','".$_POST["childStreet"]."','".$_POST["childCity"]."','".$_POST["childState"]."','".$_POST["childZip"]."','".$_POST["childAllergies"]."','".$_POST["childParent"]."',
				'".$_POST["childParentEmail"]."','".$_POST["childParentNum"]."','".$_POST["specialInstruct"]."') ";
		
		$result = mysqli_query($connection, $sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}
?>
	<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF;" valign="top">
	<b>Please Add a new child, or select a child to Edit/Delete</b>
	<p></p>

 <!-- columns divs, float left, no margin so there is no space between column, width=1/3 -->
    <form method="post">
			
			<div class="left">
				<label for="name">Child First Name</label>
			</div>
			<div class="right">
				<input type = "text" size="16" name = "fName" value="">
			</div>
			
			
			<div class="left">
				<label for="name">Child Last Name</label>
			</div>
			<div class="right">
				<input type = "text" size="16" name = "lName" value="" >
			</div> 
			
            
			<div class="left">
				<label for="street">Street</label>
			</div> 
			<div class="right">
				<input type = "text" size="16" name = "childStreet" value="" >
			</div><
                  
			<div class="left">
				<label for="city">City</label> 
			</div>
			<div class="right">
				<input type = "text" size="16" name = "childCity" value="">
			</div>
			
			<div class="left">
				<label for="state">State</label>
			</div><div class="right">
				<input type = "text" name = "childState" size="16" value="" >
			</div>
			
			<div class="left">
				<label for="zip">Zip</label>
			</div><div class="right">
				<input type = "text" name = "childZip" size="16" value="">
			</div>
			
			<div class="left">
				<label for="Allergies" >Allergies</label>
			</div> <div class="right">
				<input type = "text" name = "childAllergies" size="16" value="" > 
			</div>
			
			
                 
			<div class="left">
				<label for="ParentName">Parent Name</label>
			</div><div class="right">
				<input type = "text" name = "childParent" size="16" value=""  >
			</div>
			
			<div class="left">           
				<label for="ParentContact">Parent Email</label>
			</div> <div class="right">
				<input type = "text" name = "childParentEmail" size="16" value="" >
			</div>
                  
			<div class="left">
				<label for="ParentNum" >Parent Number</label>
			</div><div class="right">
				<input type = "text" name = "childParentNum" size="16" value="" >
			</div>
			
			<div class="left">
				<label for="SpecialInstructions" >Special Instructions</label>
			</div><div class="right">
				<input type = "text" name = "specialInstruct" size="50" value="" >
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

while($ChildInfo = mysqli_fetch_assoc($result))
	
{
	if (isset($_POST['update']))
		{
			$fName=$_POST['fName'];
			$childKey=$_GET['id'];
			$lName=$_POST['lName'];
			$street=$_POST['childStreet'];
			$city=$_POST['childCity'];
			$state=$_POST['childState'];
			$zip=$_POST['childZip'];
			$allergies=$_POST['childAllergies'];
			$pName=$_POST['childParent'];
			$pEmail=$_POST['childParentEmail'];
			$pNum=$_POST['childParentNum'];
			$sInstructions=$_POST['specialInstruct'];
			$sql = ("UPDATE wecare.child SET First_Name ='$fName', Last_Name='$lName', Street='$street', 
			City='$city', State='$state', Zip='$zip', Allergies='$allergies',
			Parent_Name='$pName', Parent_Email='$pEmail', Parent_Phone_Num='$pNum',
			Special_Instructions='$sInstructions' WHERE child.Child_ID='$childKey'");
				
				
		
			$result = mysqli_query($connection, $sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
		
	if (isset($_POST['delete']))
		{
			$childKey=$_GET['id'];
			
						
			$sql = "DELETE FROM wecare.child WHERE child.Child_ID='$childKey'";
		
			$result = mysqli_query($connection, $sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
?>

<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF;" valign="top">


 <!-- columns divs, float left, no margin so there is no space between column, width=1/3 -->
    <form method="post">
			
			<div class="left">
				<label for="name">Child First Name</label>
			</div>
			<div class="right">
				<?php echo '<input type = "text" size="16" name = "fName" value="' . $ChildInfo['First_Name'] . '">'?>
			</div>
			
			
			<div class="left">
				<label for="name">Child Last Name</label>
			</div>
			<div class="right">
				<?php echo '<input type = "text" size="16" name = "lName" value="' . $ChildInfo['Last_Name'] . '" >'?>
			</div>
			
            
			<div class="left">
				<label for="street">Street</label>
			</div> 
			<div class="right">
				<?php echo '<input type = "text" size="16" name = "childStreet" value="' . $ChildInfo['Street'] . '" >'?>
			</div>
                  
			<div class="left">
				<label for="city">City</label> 
			</div>
			<div class="right">
				<?php echo '<input type = "text" size="16" name = "childCity" value="' . $ChildInfo['City'] . '">' ?>
			</div>
			
			<div class="left">
				<label for="state">State</label>
			</div><div class="right">
				<?php echo '<input type = "text" name = "childState" size="16" value="' . $ChildInfo['State'] . '" >' ?>
			</div>
			
			<div class="left">
				<label for="zip">Zip</label>
			</div><div class="right">
				<?php echo '<input type = "text" name = "childZip" size="16" value="' . $ChildInfo['Zip'] . ' ">' ?>
			</div>
			
			<div class="left">
				<label for="Allergies" >Allergies</label>
			</div> <div class="right">
				<?php echo '<input type = "text" name = "childAllergies" size="16" value="' . $ChildInfo['Allergies'] . '" > ' ?>
			</div>
			
			
                 
			<div class="left">
				<label for="ParentName">Parent Name</label>
			</div><div class="right">
				<?php echo '<input type = "text" name = "childParent" size="16" value="' . $ChildInfo['Parent_Name'] . '"  >' ?>
			</div>
			
			<div class="left">           
				<label for="ParentContact">Parent Email</label>
			</div> <div class="right">
				<?php echo '<input type = "text" name = "childParentEmail" size="16" value="' . $ChildInfo['Parent_Email'] . '" >' ?>
			</div>
                  
			<div class="left">
				<label for="ParentNum" >Parent Number</label>
			</div><div class="right">
				<?php echo '<input type = "text" name = "childParentNum" size="16" value="' . $ChildInfo['Parent_Phone_Num'] . '" >' ?>
			</div>
			
			<div class="left">
				<label for="SpecialInstructions" >Special Instructions</label>
			</div><div class="right">
				<?php echo '<input type = "text" name = "specialInstruct" size="50" value="' . $ChildInfo['Special_Instructions'] . '" >' ?>
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