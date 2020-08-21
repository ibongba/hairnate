<?php
	date_default_timezone_set("Asia/Bangkok");
    header('Content-type: text/html; charset=utf-8');
    require_once 'PDO.php';

    $db_host = 'localhost:8889';
    $db_name = 'hairnate';
    $db_user = 'root';
    $db_pass = '1';

    $conn = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
    $conn->exec("SET CHARACTER SET utf8");

    if(isset($_POST['action']) && $_POST['action'] == 'create'){
        $img = '';
        if(isset($_FILES['files'])){
            $total = count($_FILES['files']['name']);

            for( $i=0 ; $i < $total ; $i++ ) {
                $tmpFilePath = $_FILES['files']['tmp_name'][$i];
                if ($tmpFilePath != ""){
                    $newFilePath = "../upload/". time() . $_FILES['files']['name'][$i];
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $img = "upload/" .time() . $_FILES['files']['name'][$i];;
                    }
                }
            }
        }

        $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '".$_POST['user_id']."'";
        $rs = getpdo($conn,$sql);

        if($rs){
            $sql = "INSERT INTO `hairstyle`(`id_partner`, `name`, `description`, `price`, `image`) VALUES ('".$rs[0]['id']."','".$_POST['name']."','".$_POST['description']."','".$_POST['price']."','".$img."')";
            $rs = getpdo($conn,$sql);
            if($rs){
                if(isset($_POST['promotion'])){

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
    }else if(isset($_POST['action']) && $_POST['action'] == 'getservice'){

        $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '".$_POST['user_id']."'";
            // echo $sql;
        $rs = getpdo($conn,$sql);

        if($rs){
            $sql = "SELECT * FROM `hairstyle` WHERE `id_partner` = '".$rs[0]['id']."' and `type` = 1";
            $rs = getpdo($conn,$sql);
            if($rs){
                $res = array("code" => 200, "result" => $rs);
                echo json_encode($res);
                return ;
            }
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'edit'){

        $img = '';
        if(isset($_FILES['files'])){
            $total = count($_FILES['files']['name']);

            for( $i=0 ; $i < $total ; $i++ ) {
                $tmpFilePath = $_FILES['files']['tmp_name'][$i];
                if ($tmpFilePath != ""){
                    $newFilePath = "../upload/". time() . $_FILES['files']['name'][$i];
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $img = "upload/" .time() . $_FILES['files']['name'][$i];;
                    }
                }
            }
        }

        $sql = "UPDATE `hairstyle` SET `name`='".$_POST['name']."',`description`='".$_POST['description']."',`price`='".$_POST['price']."'";
        if(!empty($img)) {
            $sql .= ",`image` = '".$img."'";
        }
        $sql .= " WHERE `id_hairstyle` = '".$_POST['id_hairstyle']."'";

        $rs = getpdo($conn,$sql);
        if($rs){
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return ;
        }
    }

    $result = array("message" => "Error someting");
    $res = array("code" => 401, "result" => $result);
    echo json_encode($res);
?>