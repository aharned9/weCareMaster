<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>NewEmployee.html</title>
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
	#topPage{ height: 100%; padding: 10px;}
	.left{ width: 20%; float: left; text-align: right:}
	.right{ width: 70%; margin-left: 10px; float:left;}
	#Save {
	display: block;
	font-size: 1.1em;
	font-weight: bold;	
	padding: 5px 15px;
	margin: 20px auto;
	width: 75px;
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
	<form action="AddNewWorker.php" method="get">
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

$RosterQuery = "Select First_Name, Last_Name, Emp_ID From wecare.employee";
$result = mysqli_query($connection,$RosterQuery);
while ($EmployeeRoster = mysqli_fetch_assoc($result))
{
	echo "<tr><td><center><a href='AddNewWorker.php?id= ". $EmployeeRoster['Emp_ID'] . " '>" . $EmployeeRoster["First_Name"] . " " . $EmployeeRoster["Last_Name"] . "</a></center></td></tr>";
}

?>
		</table>
	</div>
<?php

$connect = mysqli_connect($server, $user, $password, $database);
$EmpKey = $_POST['id'];
$EmpQuery = "Select First_Name, Last_Name, Position, Hire_Date, Phone_Num From wecare.employee where Emp_ID=" . $_GET['id'];
$result = mysqli_query($connect, $EmpQuery);

 
if (empty($EmpKey) && empty($result)){
	
	if (isset($_POST['save']))
	{
		$sql = "INSERT INTO wecare.employee (First_Name, Last_Name, Position, Hire_Date, Phone_Num)
				VALUES ('".$_POST["fName"]."','".$_POST["lName"]."','".$_POST["position"]."','".$_POST["hireDate"]."','".$_POST["empPhoneNum"]."') ";
		
		$result = mysqli_query($connection, $sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}
?>
	<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF;" valign="top">
	<b>Please Add a new employee, or select a employee to Edit/Delete</b>
	<p></p>
	
	 <form method="post">
			
			<div class="left">
				<label for="name">Employee First Name</label>
			</div>
			<div class "right">
				<input type = "text" name= "fName" size="16" value="">
			</div>
			
			<div class="left">
				<label for="name">Employee Last Name</label>
			</div>
			<div class "right">
				<input type = "text" name= "lName" size="16" value="">
			</div>
            
			<div class="left">
				<label for="position">Employee Position</label>
			</div>
			<div class "right">
				<input type = "text" name= "position" size="16" value="">
			</div>
			<div class="left">
				<label for="hireDate">Employee Hire Date</label>
			</div>
			<div class "right">
				<input type = "text" name= "hireDate" size="16" value="">
			</div>
			<div class="left">
				<label for="phoneNum">Employee Phone Number</label>
			</div>
			<div class "right">
				<input type = "text" name= "empPhoneNum" size="16" value="">
			</div>
			
			<div class="left">
				<button type="submit" name="save">Save</button>
			</div>
		</form>
		<form action="ChildDailyAct.php">
			<div class="right">
				<button type="submit" name="back">Back</button>
			</div>
		</form>
<?php
}
else{

while($EmpInfo = mysqli_fetch_assoc($result))
	
{
	if (isset($_POST['update']))
		{
			$fName=$_POST['fName'];
			$EmpKey=$_GET['id'];
			$lName=$_POST['lName'];
			$position=$_POST['position'];
			$hireDate=$_POST['hireDate'];
			$empPhoneNum=$_POST['empPhoneNum'];
			$sql = ("UPDATE wecare.employee SET First_Name ='$fName', Last_Name='$lName', Position='$position', 
			Hire_Date='$hireDate', Phone_Num='$empPhoneNum' WHERE employee.Emp_ID='$EmpKey'");
					
			$result = mysqli_query($connection, $sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
		
	if (isset($_POST['delete']))
		{
			$EmpKey=$_GET['id'];
			
						
			$sql = "DELETE FROM wecare.employee WHERE employee.Emp_ID='$EmpKey'";
		
			$result = mysqli_query($connection, $sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
?>
<div id="topPage" style="margin-left: 200px; background-color: #CCFFFF;" valign="top">			
	<form method="post">
			
			<div class="left">
				<label for="name">Employee First Name</label>
			</div>
			<div class "right">
				<?php echo '<input type = "text" name= "fName" size="16" value="' . $EmpInfo['First_Name'] . '">'?>
			</div>
			
			<div class="left">
				<label for="name">Employee Last Name</label>
			</div>
			<div class "right">
				<?php echo '<input type = "text" name= "lName" size="16" value="' . $EmpInfo['Last_Name'] . '">'?>
			</div>
            
			<div class="left">
				<label for="position">Employee Position</label>
			</div>
			<div class "right">
				<?php echo '<input type = "text" name= "position" size="16" value="' . $EmpInfo['Position'] . '">'?>
			</div>
			<div class="left">
				<label for="hireDate">Employee Hire Date</label>
			</div>
			<div class "right">
				<?php echo '<input type = "text" name= "hireDate" size="16" value="' . $EmpInfo['Hire_Date'] . '">'?>
			</div>
			<div class="left">
				<label for="phoneNum">Employee Phone Number</label>
			</div>
			<div class "right">
				<?php echo '<input type = "text" name= "empPhoneNum" size="16" value="' . $EmpInfo['Phone_Num'] . '">'?>
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