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
    }

    $result = array("message" => "Error someting");
    $res = array("code" => 401, "result" => $result);
    echo json_encode($res);
?>