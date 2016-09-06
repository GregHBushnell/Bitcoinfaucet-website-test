<?php
	function logout(){
		session_destroy();
		unset($_SESSION['username']);
		$_SESSION['message'] = "You are now logged out";
		header("location: index.php");
	}
	function login($link){
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($link,$sql);
		if(mysqli_num_rows($result) == 1){
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username']= $username;
			header("location: index.php");
		}else{
			$_SESSION['message'] = "Incorrect";
		}
	}
	function register($link){
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$password2 = mysqli_real_escape_string($link, $_POST['password2']);
		if($password == $password2){
			$password= md5($password);
			$sql = "INSERT INTO users(UserName,email,password)VALUES('$username','$email','$password')";
			mysqli_query($link,$sql);
			$_SESSION['message'] = "You are now registered";
			$_SESSION['username'] = $username;
			header("location: index.php");
		}else{
			$_SESSION['message'] = "Passwords do not match";
		}
	}
	function retrivePicture($link){
		
	}
?>