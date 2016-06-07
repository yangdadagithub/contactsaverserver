<?php
session_start();
$conn=@mysql_connect('localhost','root','');
if($conn){
	//echo 'successful';
	if(isset($_POST["flag"])&&$_POST["flag"]=="yes"){
		$uaccount=$_POST["Uaccount"];
		$upassword=$_POST["Upassword"];
		$flag=$_POST["flag"];
// 		echo $uaccount;
// 		echo $upassword;
// 		echo $flag;
		mysql_select_db('contactsaver',$conn);
		$sql="select Uaccount,Upassword from user where Uaccount = '$uaccount' and Upassword = '$upassword'";
		$result=mysql_query($sql);
		
		if(mysql_fetch_array($result)){
			echo "yes";
			//return ;
		}else {
			echo "no";
			//return ;
		}
		
		$num = mysql_num_rows($result);
		//echo $num;
		//save user id to session
		if($num){
		//	echo "it works";
			$row = mysql_fetch_array(mysql_query($sql));  //将数据以索引方式储存在数组中
// 			echo $row;
			$uid= mysql_fetch_array(mysql_query("select Uid from user where Uaccount='$row[0]'"));
			$_SESSION['Uid']=$uid[0];
		//	echo $_SESSION['Uid'];
		}
		
		
		
		
	    
	}
}else {
	echo 'fail';
}
?>