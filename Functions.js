function alertToMe(){
	alert("hellooooo world");
}
function UserChecker(document){
	usr=document.getElementById("uid").value;
	val= document.getElementById("pwd").value;
	if (val!="" && usr !="") {
		document.getElementById("login").action = "UserCheck.php";
	}else{
		alert("Fill the Blanks and Proceed!!!")
	}
}
function TakenKeys(document,window,UserId){
	var xmlhttp;
	if(window.XMLHttpRequest){
	xmlhttp = new XMLHttpRequest();
	}
	else{
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
	if(xmlhttp.readyState==4 && xmlhttp.status==200){
	document.getElementById("UKD").innerHTML=xmlhttp.responseText;
	}
	}
	UID=UserId;
	xmlhttp.open("GET","TakenKeys.php?UID="+UID,true);
	xmlhttp.send();

	}
/*function BookedKeys(document,window){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("UKD").innerHTML=xmlhttp.responseText;
		}
	}
	UID=<?php echo $_SESSION['UserId']; ?>;
	xmlhttp.open("GET","BookedKeys.php?UID="+UID,true);
	xmlhttp.send();
	}
function AvailableKeys(document,window){
	var xmlhttp;
	if(window.XMLHttpRequest){
	xmlhttp = new XMLHttpRequest();
	}
	else{
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
	if(xmlhttp.readyState==4 && xmlhttp.status==200){
	document.getElementById("UKD").innerHTML=xmlhttp.responseText;
	}
	}
	UID=<?php echo $_SESSION['UserId']; ?>;
	xmlhttp.open("GET","AvailableKeys.php?UID="+UID,true);
	xmlhttp.send();
}*/