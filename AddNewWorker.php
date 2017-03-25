<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>Admin - Edit Employee</title>
    <meta charset = "UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.css" rel="stylesheet">
	<script>
	function deleteCheck(){
		return confirm('Are you sure you want to delete this entry?');
	}
	</script>
	
	<style>
		label{color: white; margin-bottom: 20px;}
		input{color: black; margin-bottom: 20px;}
		html, body{position:relative; height: 100%}
		div{ height: 100%}
		h5 {color: #b3ffb3}
		#names{border: 1px solid black}
		th {color: white}
		td {padding: 10px}
		#topPage{ height: 100%; padding: 10px;}
		.left{ width: 20%; float: left; text-align: right:}
		.right{ width: 70%; margin-left: 10px; float:left;}
		.black(font-color: black)
		
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
    <h1><span><img src="img/wecare.png" class="img-rounded" alt="daycare-image" width="75" height="75">We</span>Care - Administrator: Edit Employee Database</h1>
	<ul class="nav nav-pills nav-justified">
		<li><a href="Workerlandingpage.php">Home</a></li>
		<li><a href="AddNewChild.php">Add Child</a></li>
		<li class="active"><a href="AddNewWorker.php">Add Employee</a></li>
		<li><a href="EditDaycare.php">Add/Edit Daycare</a></li>
		<li><a href="PasswordReset.php">Password Reset</a></li>
	</ul>
	<div class="table-responsive" id="names" style="width: 200px;background-color: #1a1a1a; float: left;">
			<table class="table" width="200px">
			<tr>
				<th><center>
				<h4>Employee Roster</h4>
				<a href="AddNewWorker.php" class="btn btn-primary" role="button">Add New</a>
				<br />
				</th>
			</tr>	
				
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
	<div class="table-responsive" id="topPage" style="margin-left: 200px; background-color: #006600;" valign="top">
	<h5><center>Please Add a new employee, or select one to Edit/Delete</center></h5>
	
	
	 <form method="post">
	 
			<div class="container-fluid">
			<div class="row table-responsive">
			<div class="col-xs-7">
			
			<div class="col-sm-4">
				<label for="name">First Name</label>
			</div>
			<div class="col-sm-8">
				<input type = "text" name= "fName" size="25" value="">
			</div>
			
			<div class="col-sm-4">
				<label for="name">Last Name</label>
			</div>
			<div class="col-sm-8">
				<input type = "text" name= "lName" size="25" value="">
			</div>
            
			<div class="col-sm-4">
				<label for="position">Position</label>
			</div>
			<div class="col-sm-8">
				<input type = "text" name= "position" size="25" value="">
			</div>
			<div class="col-sm-4">
				<label for="hireDate">Hire Date</label>
			</div>
			<div class="col-sm-8">
				<input type = "text" name= "hireDate" size="10" value="">
			</div>
			<div class="col-sm-4">
				<label for="phoneNum">Phone Number</label>
			</div>
			<div class="col-sm-8">
				<input type = "text" name= "empPhoneNum" size="16" value="">
			</div>
			
		</div>
			
		<div class="col-xs-5"><br /><br /><img src="img/wecare.png" class="img-rounded" alt="daycare-image" width="85%" height="auto"></div>
		</div>
			
			<div class="left">
				<button type="submit" class="btn btn-success" name="save">Save New Employee</button>
			</div>
		</form>
		</div>
		</div>
						
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
<div class="table-responsive" id="topPage" style="margin-left: 200px; background-color: #006600;" valign="top">	
	<form method="post">
		
		<div class="container-fluid">
			<div class="row table-responsive">
			<div class="col-xs-7">
			
			<div class="col-sm-4">
				<label for="name">First Name</label>
			</div>
			<div class="col-sm-8">
				<?php echo '<input type = "text" name= "fName" size="25" value="' . $EmpInfo['First_Name'] . '">'?>
			</div>
			
			<div class="col-sm-4">
				<label for="name">Last Name</label>
			</div>
			<div class="col-sm-8">
				<?php echo '<input type = "text" name= "lName" size="25" value="' . $EmpInfo['Last_Name'] . '">'?>
			</div>
            
			<div class="col-sm-4">
				<label for="position">Position</label>
			</div>
			<div class="col-sm-8">
				<?php echo '<input type = "text" name= "position" size="25" value="' . $EmpInfo['Position'] . '">'?>
			</div>
			<div class="col-sm-4">
				<label for="hireDate">Hire Date</label>
			</div>
			<div class="col-sm-8">
				<?php echo '<input type = "text" name= "hireDate" size="10" value="' . $EmpInfo['Hire_Date'] . '">'?>
			</div>
			<div class="col-sm-4">
				<label for="phoneNum">Phone Number</label>
			</div>
			<div class="col-sm-8">
				<?php echo '<input type = "text" name= "empPhoneNum" size="16" value="' . $EmpInfo['Phone_Num'] . '">'?>
			</div>		
		     
			 
		</div>
			
		<div class="col-xs-5"><br /><br /><img src="img/wecare.png" class="img-rounded" alt="daycare-image" width="85%" height="auto"></div>
		
		</div>
		
		<div class="left">
		<button type="submit" class="btn btn-success" name="update">Update</button>
		</div>
		
		
		 <div class="right">
		<button type="submit" class="btn btn-danger" name="delete" onclick="return deleteCheck()" >Delete</button>
	
		
		</div>
		
		
		</form>
		</div>
		</div>
<?php ;}
}
?>
    
  </body>
</html>
