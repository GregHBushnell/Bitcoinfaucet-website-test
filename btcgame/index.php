<?php
	session_start();
	include 'loginlogoutregister.php';
	//connecting to database
	$link = mysqli_connect("localhost","root","","coingame");
	
	if(isset($_POST['Login_Btn'])){
		login($link);
	}
	if(isset($_POST['Register_Btn'])){
		register($link);
	}
	if(isset($_POST['Logout_Btn'])){
		logout($link);
	}
?>
<html>
<head>
	<Title>LogIn</Title>
	<link rel="stylesheet" type="text/css"  href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class = "headerContainer">
	<div class = "headerLeft">
		test
	</div>
	<div class="headerMiddle"> 
		<h1>Website</h1>
		<div><h4>
		<?php 
			if(isset($_SESSION['username']) ){
				echo "Welcome ".$_SESSION['username'];
				
			}else{
				echo "Logged Out ";
			}
		?>
		</h4></div>
	</div>
	<div class = "headerRight">
		<div class = "loginRegister">
			<button id="lrBtn">Login/Register</button>
			<form method = "post" action="index.php">
				<table>
					<ul>
						<li>
							<div>
								<input id = "LogOutBtn" type ="submit" name = "Logout_Btn" value ="LogOut">
							</div>
						</li>
					</ul>
				</table>
			</form>
		</div>
	</div>
</div>
<div class = "Content">
CONTENT
</div>
<div id = "PopUpLR">
	<div class = "PopUpLRContent">
		<span class="closeLR">x</span>
		<div class = "loginBoxContainer">
			<div class = "loginBox">
				<form method = "post" action="index.php">
				<table>
					<ul>
						<li><label for="usermail"></label>
							<input type="text" name="username" placeholder="username"  class = "TextInput"></li>
						<li><label for="password"></label>
							<input type="password" name="password" placeholder="password"  class = "TextInput"></li>
						<li>
							<div class = "Buttons">
							<input type ="submit" name = "Login_Btn" value ="Login">
							</div>
						</li>
					</ul>
				</table>
				</form>
			</div>
		</div>
		<div class = "registerBoxContainer">
			<div class = "registerBox">
				<form method = "post" action="index.php" enctype="multipart/form-data">
					<table>
						<ul>
							<li><label for="usermail"></label>
								<input type="text" name="username" placeholder="username"  class = "TextInput"></li>
							<li><label for="email"></label>
								<input type="email" name="email" placeholder="email"  class = "TextInput"></li>
							<li>
								<input type="password" name="password" placeholder="password"  class = "TextInput"></li>
							<li>
								<input type="password" name="password2" placeholder="Reenter Password"  class = "TextInput"></li>
							<li>
								<input type ="submit" name = "Register_Btn" value ="Register">
							</li>
						</ul>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<script>
		var modal = document.getElementById('PopUpLR');
		var btn = document.getElementById("lrBtn");
		var span = document.getElementsByClassName("closeLR")[0];
		btn.onclick = function() {
			modal.style.display = "block";
		}
		span.onclick = function() {
			modal.style.display = "none";
		}
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
</html>