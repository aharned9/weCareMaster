<!DOCTYPE HTML>
<html lang = "en">
  <head>
    <title>WeCare.html</title>
    <meta charset = "UTF-8" />
	<style>
	ul { list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333;}
	li {float: left;}
	li a {display: inline-block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;}
	li a:hover { background-color: #111;}
	span{ color:red}
	#Next {
	display: block;
	font-size: 1.1em;
	font-weight: bold;	
	padding: 5px 15px;
	margin: 20px auto;
	width: 100px;
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
		<li><a href="EditDaycare.php">Add/Edit Daycare</a></li>
		<li><a href="PasswordReset.php">Password Reset</a></li>
	</ul>
    <form>
		<div style="width:300px;">
			
      
			
			<p>
			<label for="name" style="float:left;">UserName</label>
			<input type = "text" id = "myText" size="16" style="float:right;clear:right"
                 
			</p>
			&nbsp;
			<p>
			<label for="pass" style="float:left;clear:left">Current Password</label>
			<input type = "password" id = "myPwd" size="16" style="float:right;clear:right"
                  
			</p>
			&nbsp;
			<p>
			<label for="pass" style="float:left;clear:left">New Password</label>
			<input type = "password" id = "myPwd" size="16" style="float:right;clear:right"
                  
			</p>
			&nbsp;
			<p>
			<label for="pass" style="float:left;clear:left">Re-Enter Password</label>
			<input type = "password" id = "myPwd" size="16" style="float:right;clear:right"
                  
			</p>
			<p>
		<form>
		<a id="Next" style="float: left;" href="ChildDailyAct.php">Change</a>
		
		</form>
		</p>
        
      
    </form>
  </body>
</html>
