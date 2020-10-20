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

                    $sql = "UPDATE `hairstyle` SET `type` = 2  WHERE `id_hairstyle` = '".$lastid."'";
                    $rs = getpdo($conn,$sql);

                    $sql ="INSERT INTO `promotion`(`start_date`, `end_date`, `promotion_price`, `fk_hairstyle_id`) VALUES ('".$_POST['start_date']."','".$_POST['end_date']."','".$_POST['promotion_price']."','".$lastid."')";
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
        
        if(isset($_POST['promotion'])){
            $sql = "UPDATE `promotion` SET `start_date`='".$_POST['start_date']."',`end_date`='".$_POST['end_date']."',`promotion_price`='".$_POST['promotion_price']."' WHERE `id_promotion` = '".$_POST['id_promotion']."'";
            $rs = getpdo($conn,$sql);
        }

        if($rs){
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return ;
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'getpromotion'){

        $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '".$_POST['user_id']."'";
            // echo $sql;
        $rs = getpdo($conn,$sql);

        if($rs){
            $sql = "SELECT * FROM `hairstyle` JOIN `promotion` ON `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `id_partner` = '".$rs[0]['id']."' and `type` = 2";
            $rs = getpdo($conn,$sql);
            if($rs){
                $res = array("code" => 200, "result" => $rs);
                echo json_encode($res);
                return ;
            }
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'create_barber'){
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
            $sql = "INSERT INTO `barber`(`id_partner`, `name`, `description`, `image`) VALUES ('".$rs[0]['id']."','".$_POST['name']."','".$_POST['description']."','".$img."')";
            $rs = getpdo($conn,$sql);
            if($rs){
                $res = array("code" => 200, "result" => $rs);
                echo json_encode($res);
                return ;
            }
        }

    }else if(isset($_POST['action']) && $_POST['action'] == 'getbarber'){

        $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '".$_POST['user_id']."'";

        $rs = getpdo($conn,$sql);

        if($rs){
            $sql = "SELECT * FROM `barber` WHERE `id_partner` = '".$rs[0]['id']."'";
            $rs = getpdo($conn,$sql);
            if($rs){
                $res = array("code" => 200, "result" => $rs);
                echo json_encode($res);
                return ;
            }
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'getbarber_with_id'){

        $sql = "SELECT * FROM `barber` inner join `partner` on `barber`.`id_partner` = `partner`.`id`  WHERE `id_barber` = '".$_POST['barber_id']."'";

        $rs = getpdo($conn,$sql);

        if($rs){
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return ;
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'remove_barber'){

        $sql = "DELETE FROM `barber`  WHERE `id_barber` = '".$_POST['barber_id']."'";

        $rs = getpdo($conn,$sql);

        if($rs){
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return ;
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'remove_promotion'){

        $sql = "DELETE FROM `promotion`  WHERE `id_promotion` = '".$_POST['id_promotion']."'";

        $rs = getpdo($conn,$sql);


        $sql = "DELETE FROM `hairstyle`  WHERE `id_hairstyle` = '".$_POST['id_hairstyle']."'";

        $rs = getpdo($conn,$sql);
        
        if($rs){
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return ;
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'get_all_partner'){

        $sql = "SELECT `partner`.* ,`users`.`address` FROM `partner` join  `users` on `partner`.`fk_user_id` = `users`.`id` WHERE `biz_type` = '".$_POST['biz_type']."'";

        $rs = getpdo($conn,$sql);

        if($rs){
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return ;
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'get_partner_with_id'){
        $sql = "SELECT `partner`.* FROM `partner` WHERE `id` = '".$_POST['id']."'";
        $rs = getpdo($conn,$sql);

        if($rs){

            $sql = "SELECT *  FROM `hairstyle` left join `promotion` on  `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `id_partner` = '".$rs[0]['id']."'";
            $hairstyle = getpdo($conn,$sql);


            $sql = "SELECT * FROM `barber` WHERE `id_partner` = '".$rs[0]['id']."'";
            $barber = getpdo($conn,$sql);


            $res = array("code" => 200, "result" => json_encode(array('hairstyle' => $hairstyle, 'partner'=>$rs[0] , 'barber' => $barber,'sql'=>"SELECT *  FROM `hairstyle` left join `promotion` on  `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `id_partner` = '".$rs[0]['id']."'")));
            echo json_encode($res);
            return ;
        }
    }else if(isset($_POST['action']) && $_POST['action'] == 'add_calendar'){

        $sql = "INSERT INTO `service_detail`(`service_date`, `service_time`, `service_location`, `service_phone`,`email`, `id_barber`, `id_users`, `id_hairstyle`) VALUES ('".$_POST['service_date']."','".$_POST['service_time']."','".$_POST['service_location']."','".$_POST['service_phone']."','".$_POST['email']."','".$_POST['id_barber']."','".$_POST['id_users']."','".$_POST['id_hairstyle']."')";

        $rs = getpdo($conn,$sql);

        if($rs){

            $lastid = $conn->lastInsertId();

            $img = '';
            if(isset($_FILES['files'])){
                $total = count($_FILES['files']['name']);
                for( $i=0 ; $i < $total ; $i++ ) {
                    $tmpFilePath = $_FILES['files']['tmp_name'][$i];
                    if ($tmpFilePath != ""){
                        $newFilePath = "../upload/". time() . $_FILES['files']['name'][$i];
                        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $img = "upload/" .time() . $_FILES['files']['name'][$i];
                            $sql = "INSERT INTO `service_images`(`path`, `fk_sd_id`) VALUES ('".$img."',".$lastid.")";
                            getpdo($conn,$sql);
                        }
                    }
                }
            }

            
            $res = array("code" => 200, "result" => array(
                "lastid" => $lastid
            ));
            echo json_encode($res);
            return ;
        }
    }else if (isset($_POST['action']) && $_POST['action'] == 'add_payment'){
        $sql = "INSERT INTO `payment`( `fk_sd_id`, `card_name`, `card_no`, `month`, `year`, `cvc`, `notification`) VALUES (".$_POST['lastid'].",'".$_POST['card_name']."','".$_POST['card_no']."','".$_POST['month']."','".$_POST['year']."','".$_POST['cvc']."','".$_POST['notification']."')";
        $rs = getpdo($conn,$sql);

        if($rs){
            $sql = "UPDATE `service_detail` SET `status` = 2  WHERE `id_service_detail` = '".$_POST['lastid']."'";
            $rs = getpdo($conn,$sql);

            if($rs){
                $res = array("code" => 200, "result" => $rs);
                echo json_encode($res);
                return ;
            }
        }
    }else if (isset($_POST['action']) && $_POST['action'] == 'get_order_by_customer'){
        $sql = "SELECT `service_detail`.*,`barber`.`name` as `barber_name`, `hairstyle`.*, `promotion`.*, `partner`.*  FROM `service_detail` JOIN `barber` ON `service_detail`.`id_barber` = `barber`.`id_barber` JOIN `partner` ON `barber`.`id_partner` = `partner`.`id` JOIN `hairstyle` ON `service_detail`.`id_hairstyle` = `hairstyle`.`id_hairstyle` LEFT JOIN `promotion` ON `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `id_users` = '".$_POST['id']."' and `status` != 1";
        $rs = getpdo($conn,$sql);

        if($rs){
            $sql = "SELECT * FROM `service_images` WHERE `fk_sd_id` in (SELECT `id_service_detail` FROM `service_detail` WHERE `id_users` = '".$_POST['id']."' and `status` != 1)"; 
            $rs2 = getpdo($conn,$sql);

            $res = array("code" => 200, "result" => array("sd" => $rs, "images" => $rs2));
            echo json_encode($res);
            return ;
        }
    }

    $result = array("message" => "Error someting");
    $res = array("code" => 401, "result" => $result);
    echo json_encode($res);
?>