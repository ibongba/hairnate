<?php
    require_once 'config.php';

    if(isset($_POST['action']) && $_POST['action'] == 'login'){
        $sql = "SELECT `id`, `username`, `surname`, `phone`, `email`, `address`, `type` FROM `users` WHERE `email` = '".$_POST['email']."' and `password` = '".md5($_POST['password'])."'";

        $rs = getpdo($conn,$sql);

        if(isset($rs) && count($rs) > 0){
        	$res = array("code" => 200, "result" => $rs[0]);
        	echo json_encode($res);
            return ;
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'register'){
    	if(!isset($_POST['username']) && !isset($_POST['password'])){
    		$result = array("message" => "Error parameter");
		    $res = array("code" => 401, "result" => $result);
		    echo json_encode($res);
            return ;
    	}

        $sql = "INSERT INTO `users`(`username`, `password`, `phone`, `email`, `address`) VALUES ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['phone']."','".$_POST['email']."','".$_POST['address']."')";
        $rs = getpdo($conn,$sql);
        if($rs){
        	if(isset($_POST['partner'])){

        		$lastid = $conn->lastInsertId();

        		$sql = "UPDATE `users` SET `type` = 2 , `surname` = '".$_POST['surname']."' WHERE `id` = '".$lastid."'";
        		$rs = getpdo($conn,$sql);

        		$sql = "INSERT INTO `partner`(`biz_name`, `biz_email`, `location`, `biz_type`, `fk_user_id`) VALUES ('".$_POST['name']."','".$_POST['biz_email']."','".$_POST['location']."','".$_POST['biz_type']."','".$lastid."')";
        		$rs = getpdo($conn,$sql);
        		if($rs){
                    $lastid = $conn->lastInsertId();

                    $sql = "INSERT INTO `hairstyle`(`id_partner`, `name`, `description`, `price`, `image`, `type`) (SELECT ".$lastid.", `name`, `description`, `price`, `image`, `type` FROM `hairstyle` WHERE `id_partner` = 0)";
                    $rs2 = getpdo($conn,$sql);

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
    $res = array("code" => 401, "result" => $result,"sql" => $sql);
    echo json_encode($res);
?>