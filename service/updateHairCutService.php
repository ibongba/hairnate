<?php
require_once 'config.php';


if (isset($_POST['serviceNo']) &&  isset($_POST['userAccept'])) {
    $serviceid  = $_POST['serviceNo'];

    $sql = "UPDATE `service_detail` SET `status`= 4 WHERE `id_service_detail` = '" .$serviceid . "'";
    $res = getpdo($conn, $sql);

    if($res){
         if(isset($_FILES['file'])){
            $tmpFilePath = $_FILES['file']['tmp_name'];
            $newFilePath = "../upload/" . time() . $_FILES['file']['name'];
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $img = "upload/" . time() . $_FILES['file']['name'];
                $sql = "INSERT INTO `service_images`(`path`, `fk_sd_id`, `type`) VALUES ('" . $img . "','" .$serviceid. "','" .$_POST['type']. "')";
                 $resp = getpdo($conn, $sql);

               if($resp){
                header("Location: ../barber/index.html");
                        exit;
               }else{
                  $res = array("code" => 500, "result" => $resp);
                  echo json_encode($res);
                    return;
               }

            }
         }
    }
}else{
    $res = array("code" => 500, "result" => $resp);
    echo json_encode($res);
    return;
}



?>