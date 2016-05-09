<?php









session_start();
include("conn.php");
$flag=1;
$arr=array();
$sessionId=$_SESSION["user_id"];
$sessionUsername=$_SESSION["username"];
$content=$_POST["content"];
$time=date("Y-m-d H:i:s");
$sql="insert into comment (user_id,content,time) values ('$sessionId','$content','$time')";
$result=mysql_query($sql,$conn);
if(mysql_affected_rows()==-1){
	$flag=0;
}else{
	$sql="select * from comment inner join user on comment.user_id=user.user_id where comment.user_id='$sessionId'";
	$result=mysql_query($sql,$conn);
	if(mysql_num_rows($result)){
		while($row=mysql_fetch_assoc($result)) {
			$arr[0][]=$row;
		}
	}
};
$arr[1]["flag"]=$flag;

echo json_encode($arr);



?>