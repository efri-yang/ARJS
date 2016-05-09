<?php









session_start();
include("conn.php");
$flag=1;
$arr=array();
$sessionId=$arr[0]["user_id"]=$_SESSION["user_id"];
$sessionUsername=$arr[0]["username"]=$_SESSION["username"];
$content=$arr[0]["content"]=$_POST["content"];
$time=$arr[0]["time"]=date("Y-m-d H:i:s");
$sql="insert into comment (user_id,content,time) values ('$sessionId','$content','$time')";
$result=mysql_query($sql,$conn);
if(mysql_affected_rows()==-1){
	$flag=0;
};
$arr[1]["flag"]=$flag;

echo json_encode($arr);



?>