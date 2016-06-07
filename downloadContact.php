<?php
$conn=@mysql_connect('localhost','root','');
if($conn){
	if(isset($_POST["flag"])&&$_POST['flag']=="yes"){
		//echo 'yes';
		mysql_select_db('contactsaver',$conn);
		mysql_query("set names utf8",$conn);
		$account=$_POST['Uaccount'];
		$sql="select Uid from user where Uaccount='$account'";
		$uid=mysql_fetch_array(mysql_query($sql));
		$sql2="select distinct contactname,number from contact3 where Uid='$uid[0]'";
		$result=mysql_query($sql2);
		if($result){
		$num=mysql_num_rows($result);
		//echo $num;
		$contact=array();
		for($i=0;$i<$num;$i++){
			$result_arr=mysql_fetch_array($result);
			$name=$result_arr['contactname'];
			$number=$result_arr['number'];
			$people=array();
			$people['number']=$number;
			$people['contactname']=$name;
			$contact[$i]=$people;
		}
		echo json_encode($contact);
	}
	}else {
		echo "nothing";
	}
	
}else {
	echo "fail";
}

?>