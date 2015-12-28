<?php
include 'header.php';
if($_POST['Pin']==null ||$_POST['UserId']== null){
	include 'footer.php';
	header('Location:index.php');
}
function SignIn() {  //starting the session for user profile page
		if(!empty($_POST['UserId'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
		{ 
			$query = mysql_query("SELECT * FROM user where UserId = '$_POST[UserId]' AND Pin = '$_POST[Pin]'"); $row = mysql_fetch_array($query);
			if(!empty($row['UserId']) AND !empty($row['Pin'])) {
				$_SESSION["UserId"] = $_POST["UserId"];
				$_SESSION["UserName"] = $row['UserName'];
				header('Location:User.php');
			} else {
				$_SESSION["UserName"]="w_u_p";
				header('Location:index.php');
			} 
		} 
	}
if(isset($_POST['submit'])) { SignIn(); }
?>