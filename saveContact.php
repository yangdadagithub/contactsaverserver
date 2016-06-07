<?php
header("Content-type:text/html;charset=utf-8");
$conn=@mysql_connect('localhost','root','');

if($conn){
	//echo "connected!";	
	if(isset($_POST["flag"])&&$_POST["flag"]=="yes"){
		$name=$_POST['contactname'];
		$number=$_POST['number'];
		$account=$_POST['Uaccount'];
		mysql_select_db('contactsaver',$conn);
		mysql_query("set names utf8",$conn);
		$sql="select Uid from user where Uaccount='$account'";
		$uid=mysql_fetch_array(mysql_query($sql));
		
			$sql2="INSERT INTO contact3(contactname,number,Uid) VALUES ('$name','$number','$uid[0]')";
				
			$result=mysql_query($sql2);
			if($result){
				echo "yes";
			}else{
				echo "no";
			}
			
		
		
		
// 		echo $uid[0];
// 		echo $name;
// 		echo $number;
// 		echo $account;
// 		echo "yes";
	}
	
	
}else {
	echo "fail !";
}

?>