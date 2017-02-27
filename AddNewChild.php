<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>NewChild.html</title>
    <meta charset = "UTF-8" />
	<style>
	ul { list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333;}
	li {float: left;}
	li a {display: inline-block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;}
	li a:hover { background-color: #111;}
	span{ color:red}
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
	cursor: pointer;
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
    <form>
		<div style="width:300px;">
			
      
			<h3><center>Add/Remove/Edit Child</center> </h3>
			<p>
			<label for="name" style="float:left;">Child Name</label>
			<input type = "text" id = "myText" size="16" style="float:right;clear:right"
                 
			</p>
			&nbsp;
			<p>
			<label for="dob" style="float:left;clear:left">Birthday</label>
			<input type = "dob" id = "childBirth" size="16" style="float:right;clear:right"
                  
			</p>
			&nbsp;
			<p>
			<label for="allergies" style="float:left;">Allergies</label>
			<input type = "allergic" id = "childAllergy" size="16" style="float:right;clear:right"
                 
			</p>
			&nbsp;
			<p>
			<label for="ParentName" style="float:left;clear:left">Parent Name</label>
			<input type = "ParentName" id = "childParent" size="16" style="float:right;clear:right"
                  
			</p>
			&nbsp;
			<p>
			<label for="ParentContact" style="float:left;clear:left">Parent Email</label>
			<input type = "ParentEmail" id = "childParentEmail" size="16" style="float:right;clear:right"
                  
			</p>
			&nbsp;
			<p>
			<label for="ParentNum" style="float:left;clear:left">Parent Number</label>
			<input type = "ParentNumber" id = "childParentNum" size="16" style="float:right;clear:right"
                  
			</p>
			&nbsp;
			<p>
			<label for="Address" style="float:left;clear:left">Address</label>
			<input type = "address" id = "Childadress" size="16" style="float:right;clear:right"
                  
			</p>
		<form>
	
		<a id="Save" style="float: left;" href="ChildDailyAct.php">Save</a>
		
		<p>
		<a id="Save" style="float: right;"  href="ChildDailyAct.php">Back</a>
		</p>
		</form>
		</p>
        
      
    </form>
  </body>
</html>