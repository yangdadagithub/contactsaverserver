<?php
if(isset($_POST["flag"])&&$_POST["flag"]=="yes"){
	$account=$_POST["Uaccount"];
	$password=$_POST["Upassword"];
	$flag=$_POST["flag"];
	$conn=@mysql_connect('localhost','root','');
	mysql_select_db('contactsaver',$conn);
	$sql="INSERT INTO user(Uaccount,Upassword) VALUES ('$account','$password')";
	$result = mysql_query($sql);
	if($result){
		echo "yes";
		//return;
	}
	else{
		echo "no";
		//return;
	}
}
?>