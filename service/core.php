<?php
	date_default_timezone_set("Asia/Bangkok");
    header('Content-type: text/html; charset=utf-8');
    require_once 'PDO.php';

    $db_host = 'localhost';
    $db_name = 'hairnate';
    $db_user = 'root';
    $db_pass = '';

    $conn = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
    $conn->exec("SET CHARACTER SET utf8");

    if(isset($_POST['action']) && $_POST['action'] == 'create'){

        $sql = "INSERT INTO `users`(`username`, `password`, `phone`, `email`, `address`) VALUES ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['phone']."','".$_POST['email']."','".$_POST['address']."')";
        $rs = getpdo($conn,$sql);
        if($rs){
        	if(isset($_POST['partner'])){

        		$lastid = $conn->lastInsertId();

        		$sql = "UPDATE `users` SET `type` = 2 , `surname` = '".$_POST['surname']."' WHERE `id` = '".$lastid."'";
        		$rs = getpdo($conn,$sql);

        		$sql = "INSERT INTO `partner`(`name`, `biz_email`, `location`, `biz_type`, `fk_user_id`) VALUES ('".$_POST['name']."','".$_POST['biz_email']."','".$_POST['location']."','".$_POST['biz_type']."','".$lastid."')";
        		$rs = getpdo($conn,$sql);
        		if($rs){
					$res = array("code" => 200, "result" => $rs);
		        	echo json_encode($res);
		            return ;
				}
        	}
			else{
				$res = array("code" => 200, "result" => $rs);
	        	echo json_encode($res);
	            return ;
			}
        }
    }

    $result = array("message" => "Error someting");
    $res = array("code" => 401, "result" => $result);
    echo json_encode($res);
?>