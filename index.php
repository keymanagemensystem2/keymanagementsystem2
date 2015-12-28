<html>
<?php
ini_set('display_errors', 'On');
include 'header.php';
?>
		<?php 
		if(isset( $_SESSION['UserName'])){
			if($_SESSION['UserName']=='w_u_p'){
				echo "<script>";
				echo "alert('SORRY... YOU ENTERED WRONG ID AND PASSWORD... PLEASE RETRY...')";
				echo "</script>";
				include 'footer.php';
			}
		}
		?>
	<body>
        <h1 style="padding:1% 20%;">Key Management System</h1>
            <fieldset style="width:12%; position:absolute; left:70%;">
                <legend style="width:100%" ><h2  style="font-size: 24px;">User Login</h2></legend>
                <form id="login" method="POST" onsubmit="UserChecker(document)";>
                    <div class="form-group">
                        <label for="UserId"><h4>UserId:</h4></label>
                        <input type="number" name="UserId" class="form-control" id="uid">
                    </div>
                    <div class="form-group">
                        <label for="pin"><h4>Pin:</h4></label>
                        <input type="password" name="Pin"class="form-control" id="pwd">
                    </div>
                    <button type="submit" name="submit" class= "form-control btn-primary" >Login</button>

                </form>
            </fieldset>
		<div class="adminButton" style="position:absolute; top:70%;">
            <button style="margin:10px 10px 10px 10px;" class="form-control btn-success"onclick="window.location.assign('Admin_login.php');">Admin login</button>
        </div>
        <div class="footer" style="float:bottom;">
            <h4>A project of Computer Science and Engineering department,
                University of Moratuwa.</h4>
        </div>
    </body>
</html>