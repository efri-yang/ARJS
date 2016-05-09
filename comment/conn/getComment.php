<?php









session_start();
include("conn.php");
$arr=[];
$flag=1;
$sessionId=$_SESSION["user_id"];
$sql="select * from comment inner join user on comment.user_id=user.user_id where comment.user_id='$sessionId'";
$result=mysql_query($sql,$conn);
if(!mysql_num_rows($result)){
	$flag=0;
}else{
	while($row=mysql_fetch_assoc($result)) {
		$arr[0][]=$row;
	}
}


$arr[1]=$flag;
echo json_encode($arr);



?>