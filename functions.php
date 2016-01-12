<?php
function myfeed($uid){

	require_once 'dbconfig.php';

	$sql = "SELECT * FROM `user_feed` WHERE `user_id`=$uid";
	$result = $conn->query($sql);
	
	
	if($result){
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
        	$res[] = $row;
		}
    	echo json_encode($res);
		
        //$encode = mysqli_free_result($result);    	
	}else{
		echo "no feed";
	}
	$conn->close();
}

function newsfeed($uid){
	require_once 'dbconfig.php';

	$sql = "SELECT * FROM `user_feed` WHERE user_id IN (SELECT fwuid FROM `followers` WHERE fuid = $uid);";
	$result = $conn->query($sql);

	if($result){

		while($row = $result->fetch_array(MYSQL_ASSOC)) {
        	$res[] = $row;
		}
    	echo json_encode($res);
	}else{
		echo "no feed";
	}
}

	function likecount($pid){
	require_once 'dbconfig.php';
	//$sql2 = "insert into like(uid,uname,pid)values($uid,$uname,$pid)";
	$sql = "SELECT count(*) FROM `like` WHERE pid = $pid";
	//$result2 = $conn->query($sql2);
	$result = $conn->query($sql);

	if($result){

		while($row = $result->fetch_array(MYSQL_ASSOC)) {
        	$res[] = $row;
		}
    	echo json_encode($res);
	}else{
		echo "0";
	}
}

	function like($pid,$uid,$uname){
	require_once 'dbconfig.php';
	$sql = "insert into like(uid,uname,pid)values($uid,$uname,$pid)";
	$result = $conn->query($sql
		);
}


	function displike($pid){
	require_once 'dbconfig.php';
	$sql = "select * from like where pid = $pid";
	$result = $conn->query($sql);

	if($result){

		while($row = $result->fetch_array(MYSQL_ASSOC)) {
        	$res[] = $row;
		}
    	echo json_encode($res);
	}else{
		echo "no like";
	}
}

