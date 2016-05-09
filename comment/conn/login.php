<?php 
	include("conn.php");
	$username=$_POST["username"];
	$password=$_POST["password"];
	$flag;
	if(!$username){
		$flag="false";
	}else if(!$password){
		$flag="false";
	}
	$passwordmd5=md5($password);	

	$flag=1;
	$sql="select * from user where username='$username' and password='$passwordmd5'";
	$result=mysql_query($sql,$conn);
	if(!mysql_num_rows($result)){
		echo $flag=0;
		return;
	}
	$arr=mysql_fetch_assoc($result);
	session_start();
	$_SESSION["user_id"]=$arr["user_id"];
	$_SESSION["username"]=$username;
	echo $flag;


?>