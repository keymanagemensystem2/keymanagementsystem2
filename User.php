<?php
include 'header.php';
if (!isset($_SESSION['UserId']) && !isset($_SESSION['UserName'])){
	header("Location:index.php");
}
/*if($_SESSION['UserId']!=$_REQUEST['UID']){
	header("Location:index.php");
}*/
?>
<!DOCTYPE html>
<html>
<head>
	<Script>
        function Home(){
            <?php
                include 'connection.php';
                //$query = mysql_query("UPDATE currentuser SET UserId ='1' WHERE tracking =1") or die(mysql_error());
                session_destroy();
            ?>
            window.location = 'index.php';
        }
        var alertTimerId = 0;

        function alertTimerClickHandler ( )
        {
            if ( document.getElementById("alertTimerButton").value == "Click To Take Keys" )
            {
                // Start the timer
                <?php
                    include 'connection.php';
                    $query0 = mysql_query("SELECT * FROM currentuser");
                    if(mysql_num_rows($query0)==0 ){
                        $query = mysql_query("INSERT INTO currentuser (UserId,Time) VALUES ('-1111',CURRENT_TIMESTAMP )") or die(mysql_error());
                    }
                    if(mysql_fetch_array($query0)['UserId'] != -1111) {
                        $query = mysql_fetch_array($query0);
                        $user=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE UserId = '$query[UserId]'"));
                        echo"document.getElementById('TimeStamp').innerHTML=$user[UserName] +' is taking keys'";
                    }
                    else{
                        mysql_query("UPDATE currentuser SET UserId=$_SESSION[UserId] WHERE 1");
                    }

                ?>
                document.getElementById("alertTimerButton").value = "Take Keys Quickly";
                //alertTimerId = setTimeout ( "showAlert()", 30000 );
                //tick(30);
                CreateTimer("TimeStamp",30);
            }
            else
            {
                document.getElementById("TimeStamp").innerHTML="";
                document.getElementById("alertTimerButton").value = "Click To Take Keys";
                clearTimeout ( alertTimerId );
                <?php
                include 'connection.php';
                $query1 = mysql_query("SELECT * FROM currentuser");

                $Cuser=mysql_fetch_array($query1);
                if(strcmp("$Cuser[UserId]","$_SESSION[UserId]")==0){
                    mysql_query("UPDATE currentuser SET UserId=-1111 WHERE 1");
                }
                ?>
            }
        }
       /* function tick(time){
            document.getElementById("TimeStamp").innerHTML=time;
            if(time>0) {
                setTimeout("tick(time - 1)",1000);
            }
            else{
                showAlert();
            }
        }*/
        function showAlert ( )
        {
            alert ( "Time UP !!!" );
            document.getElementById("alertTimerButton").value = "Click To Take Keys";
            document.getElementById("TimeStamp").innerHTML="";
            <?php
                include 'connection.php';
                mysql_query("UPDATE currentuser SET UserId=-1111 WHERE 1");
            ?>
        }
        var TotalSeconds;
        function CreateTimer(TimerID, Time) {
            Timer = document.getElementById(TimerID);
            TotalSeconds = Time;

            UpdateTimer()
            alertTimerId = window.setTimeout("Tick()", 1000);
        }

        function Tick() {
            TotalSeconds -= 1;
            if(TotalSeconds==0){
                showAlert();
                return;
            }
            UpdateTimer()
            alertTimerId = window.setTimeout("Tick()", 1000);
        }

        function UpdateTimer() {
            Timer.innerHTML = TotalSeconds;
        }

    </script>


</head>
<body onload="TakenKeys()">
<h1 style="padding:1% 20%;">Key Management System</h1>
<div class="HomeButton" style="position:absolute; top:30%; left:85%;">
    <button style="margin:10px 10px 10px 10px;" class="form-control btn-success"onclick="Home()" > Home </button>

</div>
<div class="HomeButton" style="position:absolute; top:31.5%; left:75%;">
    <input type="button" name="clickMe" id="alertTimerButton" class="form-control btn-primary" value="Click To Take Keys" onclick="alertTimerClickHandler()"/>
    <p id="TimeStamp" style="color: #ffffff; font-size: large"></p>
</div>
<div>
<h3 style='left:80%;'>
    Welcome <?php echo $_SESSION['UserName']; ?>
	</h3>
</div>

<div style="margin-left:10%;top:25%;">
    <form action="#" method="get"><h2>Select the Table to Display: </h2>
        <h3><input type="radio" name="UserKey" value="Taken" style="display: inline; margin:0 5px 0 2px;" checked onclick="TakenKeys(document,window,<?php echo $_SESSION['UserId']; ?>)">Taken Keys
            <input value="Booked" type="radio" name="UserKey" style="margin:0 5px 0 10px; display:inline;" onclick="BookedKeys()">Booked Keys
        <input value="Available" type="radio" name="UserKey" style="margin:0 5px 0 10px; display:inline;" onclick="AvailableKeys()">Available Keys</h3>
    </form>
</div>

<div id="UKD">
    
</div>
<div class="footer" style="margin:0 0 0 0;">
    <h4 style="margin:0 0 0 0; font-size: 16px;">A project of Computer Science and Engineering department,
        University of Moratuwa.</h4>
</div>
</body>
</html>