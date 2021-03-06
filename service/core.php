<?php

require_once 'config.php';

if (isset($_POST['action']) && $_POST['action'] == 'create') {
    $img = '';
    if (isset($_FILES['files'])) {
        $total = count($_FILES['files']['name']);

        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES['files']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                $newFilePath = "../upload/" . time() . $_FILES['files']['name'][$i];
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $img = "upload/" . time() . $_FILES['files']['name'][$i];
                }
            }
        }
    }

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = "INSERT INTO `hairstyle`(`id_partner`, `name`, `description`, `price`, `image`) VALUES ('" . $rs[0]['id'] . "','" . $_POST['name'] . "','" . $_POST['description'] . "','" . $_POST['price'] . "','" . $img . "')";
        $rs = getpdo($conn, $sql);
        if ($rs) {
            if (isset($_POST['promotion'])) {

                $lastid = $conn->lastInsertId();

                $sql = "UPDATE `hairstyle` SET `type` = 2  WHERE `id_hairstyle` = '" . $lastid . "'";
                $rs = getpdo($conn, $sql);

                $sql = "INSERT INTO `promotion`(`start_date`, `end_date`, `promotion_price`, `fk_hairstyle_id`) VALUES ('" . $_POST['start_date'] . "','" . $_POST['end_date'] . "','" . $_POST['promotion_price'] . "','" . $lastid . "')";
                $rs = getpdo($conn, $sql);
                if ($rs) {
                    $res = array("code" => 200, "result" => $rs);
                    echo json_encode($res);
                    return;
                }
            } else {
                $res = array("code" => 200, "result" => $rs);
                echo json_encode($res);
                return;
            }
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'getservice') {

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";
    // echo $sql;
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = "SELECT * FROM `hairstyle` WHERE `id_partner` = '" . $rs[0]['id'] . "' and `type` = 1";
        $rs = getpdo($conn, $sql);
        if ($rs) {
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $img = '';
    if (isset($_FILES['files'])) {
        $total = count($_FILES['files']['name']);

        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES['files']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                $newFilePath = "../upload/" . time() . $_FILES['files']['name'][$i];
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $img = "upload/" . time() . $_FILES['files']['name'][$i];
                }
            }
        }
    }

    $sql = "UPDATE `hairstyle` SET `name`='" . $_POST['name'] . "',`description`='" . $_POST['description'] . "',`price`='" . $_POST['price'] . "'";
    if (!empty($img)) {
        $sql .= ",`image` = '" . $img . "'";
    }
    $sql .= " WHERE `id_hairstyle` = '" . $_POST['id_hairstyle'] . "'";
    $rs = getpdo($conn, $sql);

    if (isset($_POST['promotion'])) {
        $sql = "UPDATE `promotion` SET `start_date`='" . $_POST['start_date'] . "',`end_date`='" . $_POST['end_date'] . "',`promotion_price`='" . $_POST['promotion_price'] . "' WHERE `id_promotion` = '" . $_POST['id_promotion'] . "'";
        $rs = getpdo($conn, $sql);
    }

    if ($rs) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'getpromotion') {

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";
    // echo $sql;
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = "SELECT * FROM `hairstyle` JOIN `promotion` ON `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `id_partner` = '" . $rs[0]['id'] . "' and `type` = 2";
        $rs = getpdo($conn, $sql);
        if ($rs) {
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'create_barber') {
    $img = '';
    if (isset($_FILES['files'])) {
        $total = count($_FILES['files']['name']);
        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES['files']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                $newFilePath = "../upload/" . time() . $_FILES['files']['name'][$i];
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $img = "upload/" . time() . $_FILES['files']['name'][$i];
                }
            }
        }
    }

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = "INSERT INTO `barber`(`id_partner`, `name`, `description`, `image`,`phone`,`password`) VALUES ('" . $rs[0]['id'] . "','" . $_POST['name'] . "','" . $_POST['description'] . "','" . $img . "','" . $_POST['phone'] . "','" . md5($_POST['password']) . "')";
        $rs = getpdo($conn, $sql);
        if ($rs) {
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;
        }
    }

} else if (isset($_POST['action']) && $_POST['action'] == 'getbarber') {

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";

    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = "SELECT * FROM `barber` WHERE `id_partner` = '" . $rs[0]['id'] . "'";
        $rs = getpdo($conn, $sql);
        if ($rs) {
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'getbarber_with_id') {

    $sql = "SELECT * FROM `barber` inner join `partner` on `barber`.`id_partner` = `partner`.`id`  WHERE `id_barber` = '" . $_POST['barber_id'] . "'";

    $rs = getpdo($conn, $sql);

    if ($rs) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'remove_barber') {

    $sql = "DELETE FROM `barber`  WHERE `id_barber` = '" . $_POST['barber_id'] . "'";

    $rs = getpdo($conn, $sql);

    if ($rs) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'remove_promotion') {

    $sql = "DELETE FROM `promotion`  WHERE `id_promotion` = '" . $_POST['id_promotion'] . "'";

    $rs = getpdo($conn, $sql);

    $sql = "DELETE FROM `hairstyle`  WHERE `id_hairstyle` = '" . $_POST['id_hairstyle'] . "'";

    $rs = getpdo($conn, $sql);

    if ($rs) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_all_partner') {

    $sql = "SELECT `partner`.* ,`users`.* FROM `partner` join  `users` on `partner`.`fk_user_id` = `users`.`id` WHERE `biz_type` = '" . $_POST['biz_type'] . "'";

    $rs = getpdo($conn, $sql);

    if ($rs) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_partner_with_id') {
    $sql = "SELECT `partner`.* FROM `partner` WHERE `fk_user_id` = '" . $_POST['id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {

        $sql = "SELECT *  FROM `hairstyle` left join `promotion` on  `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `id_partner` = '" . $rs[0]['id'] . "'";
        $hairstyle = getpdo($conn, $sql);

        $sql = "SELECT * FROM `partner_closed` WHERE `fk_partner_id` =  '" . $rs[0]['id'] . "'";
        $closed = getpdo($conn, $sql);

        $sql = "SELECT * FROM `barber` WHERE `id_partner` = '" . $rs[0]['id'] . "'";
        $barber = getpdo($conn, $sql);

        $sql="SELECT *, `review`.`create_at`AS `review_date` ,`barber`.`image` AS barber_img
        FROM `review` 
        JOIN `service_detail` on `service_detail`.`id_service_detail` = `review`.`fk_sd_id` 
        -- JOIN `service_images` on `service_detail`.`id_service_detail` = `service_images`.`fk_sd_id` 
        JOIN `users` ON `users`.`id` = `service_detail`.`id_users` 
        JOIN `barber` ON `barber`.`id_barber` = `service_detail`.`id_barber` 
        JOIN `hairstyle` on `hairstyle`.`id_hairstyle` = `service_detail`.`id_hairstyle` 
        WHERE `hairstyle`.`id_partner` = '" . $rs[0]['id'] . "' 
        GROUP BY `service_detail`.`id_service_detail`
        ORDER BY `review_date` DESC LIMIT 5";
        // echo $sql;
        $review = getpdo($conn, $sql);

        if(gettype($review) == 'array'){

            $sql = "SELECT * FROM `service_images`";
            $pic = getpdo($conn,$sql);

            $res = array("code" => 200, "result" => json_encode(array('closed' => $closed, 'hairstyle' => $hairstyle, 'partner' => $rs[0], 'barber' => $barber, 'review' => $review, 'picture' => $pic)));
            echo json_encode($res);
            return;
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_partner_with_user') {
    $sql = "SELECT `partner`.* FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {

        $sql = "SELECT *  FROM `hairstyle` left join `promotion` on  `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `id_partner` = '" . $rs[0]['id'] . "'";
        $hairstyle = getpdo($conn, $sql);

        $sql = "SELECT * FROM `partner_closed` WHERE `fk_partner_id` =  '" . $rs[0]['id'] . "'";
        $closed = getpdo($conn, $sql);

        $sql = "SELECT * FROM `barber` WHERE `id_partner` = '" . $rs[0]['id'] . "'";
        $barber = getpdo($conn, $sql);

        $res = array("code" => 200, "result" => array('closed' => $closed, 'hairstyle' => $hairstyle, 'partner' => $rs[0], 'barber' => $barber, 'sql' => "SELECT *  FROM `hairstyle` left join `promotion` on  `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `id_partner` = '" . $rs[0]['id'] . "'"));
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'add_calendar') {
    $sql_lastid = "SELECT * FROM `service_detail` order by `id_service_detail` desc limit 1";

    $rs = getpdo($conn, $sql_lastid);

    if (count($rs) > 0) {
        $lastid = substr($rs[0]['id_service_detail'], -6, 6);
    } else {
        $lastid = 0;
    }

    $lastid = intval($lastid) + 1;

    $nextid = "DN";
    if ($_POST['type'] == 1) {
        $nextid = "FS";
    }

    $nextid .= substr(getdate()["year"], -2, 2);
    $nextid .= getdate()["mon"];
    $nextid .= getdate()["mday"];
    $nextid .= substr("000000" . $lastid, -6, 6);

    $sql = "INSERT INTO `service_detail`(`id_service_detail`,`service_date`, `service_time`, `service_location`, `price`, `service_phone`,`email`, `id_barber`, `id_users`, `id_hairstyle`, `lat`, `lon`) VALUES ('" . $nextid . "','" . $_POST['service_date'] . "','" . $_POST['service_time'] . "','" . $_POST['service_location'] . "','" . $_POST['price'] . "','" . $_POST['service_phone'] . "','" . $_POST['email'] . "','" . $_POST['id_barber'] . "','" . $_POST['id_users'] . "','" . $_POST['id_hairstyle'] . "','" . $_POST['lat'] . "','" . $_POST['lon'] . "')";
// echo $sql;

    $rs = getpdo($conn, $sql);

    if ($rs) {

        $img = '';
        if (isset($_FILES['files'])) {
            $total = count($_FILES['files']['name']);
            for ($i = 0; $i < $total; $i++) {
                $tmpFilePath = $_FILES['files']['tmp_name'][$i];
                if ($tmpFilePath != "") {
                    $newFilePath = "../upload/" . time() . $_FILES['files']['name'][$i];
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $img = "upload/" . time() . $_FILES['files']['name'][$i];
                        $sql = "INSERT INTO `service_images`(`path`, `fk_sd_id`) VALUES ('" . $img . "','" . $nextid . "')";
                        // echo $sql;
                        getpdo($conn, $sql);
                    }
                }
            }
        }

        $res = array("code" => 200, "result" => array(
            "lastid" => $nextid,
        ));
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'add_payment') {
    $sql = "INSERT INTO `payment`( `fk_sd_id`, `card_name`, `card_no`, `month`, `year`, `cvc`, `notification`) VALUES ('" . $_POST['lastid'] . "','" . $_POST['card_name'] . "','" . $_POST['card_no'] . "','" . $_POST['month'] . "','" . $_POST['year'] . "','" . $_POST['cvc'] . "','" . $_POST['notification'] . "')";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = "UPDATE `service_detail` SET `status` = 2  WHERE `id_service_detail` = '" . $_POST['lastid'] . "'";
        $rs = getpdo($conn, $sql);

        if ($rs) {
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_order_by_customer') {
    $sql = "SELECT `tracking`.*,`service_detail`.*,`barber`.`name` as `barber_name`, `hairstyle`.*, `promotion`.*, `partner`.*  
    FROM `service_detail` 
    JOIN `barber` ON `service_detail`.`id_barber` = `barber`.`id_barber` 
    JOIN `partner` ON `barber`.`id_partner` = `partner`.`id` 
    JOIN `hairstyle` ON `service_detail`.`id_hairstyle` = `hairstyle`.`id_hairstyle` 
    LEFT JOIN `promotion` ON `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` 
    left join `tracking` on `service_detail`.`id_service_detail` = `tracking`.`fk_sd_id` 
    WHERE `id_users` = '" . $_POST['id'] . "' and `status` != 1 
    order by `service_date` desc,`service_time` desc";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = "SELECT * FROM `service_images` WHERE `fk_sd_id` in (SELECT `id_service_detail` FROM `service_detail` WHERE `id_users` = '" . $_POST['id'] . "' and `status` != 1)";
        $rs2 = getpdo($conn, $sql);

        $res = array("code" => 200, "result" => array("sd" => $rs, "images" => $rs2));
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_order_detail') {
    $sql = "SELECT `service_detail`.*,`barber`.`name` as `barber_name`, `hairstyle`.*, `promotion`.*, `partner`.*  FROM `service_detail` JOIN `barber` ON `service_detail`.`id_barber` = `barber`.`id_barber` JOIN `partner` ON `barber`.`id_partner` = `partner`.`id` JOIN `hairstyle` ON `service_detail`.`id_hairstyle` = `hairstyle`.`id_hairstyle` LEFT JOIN `promotion` ON `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `id_service_detail` = '" . $_POST['id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql2 = "SELECT * FROM `service_images` WHERE `fk_sd_id` in (SELECT `id_service_detail` FROM `service_detail` WHERE `id_users` = '" . $_POST['id'] . "' and `status` != 1)";
        $rs2 = getpdo($conn, $sql2);

        $res = array("code" => 200, "result" => array("sd" => $rs[0], "images" => $rs2, "sql" => $sql));
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'change_status_order') {

    $sql = "UPDATE `service_detail` SET `status` = '" . $_POST['status'] . "'  WHERE `id_service_detail` = '" . $_POST['id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_detail_order_by_customer') {

    $sql = "SELECT `partner`.* FROM `partner` WHERE `fk_user_id` = '" . $_POST['id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = "SELECT `tracking`.*,`service_detail`.*,`barber`.`name` as `barber_name`, `hairstyle`.*, `promotion`.*, `partner`.*, `users`.`username` as `customer_name`, CONCAT(`users`.`house_no`,' ', `users`.`village_no`,' ',`users`.`sub_area`,' ',`users`.`area`,' ',`users`.`province`,' ',`users`.`postal_code`) as `address`,`users`.`phone` as `phone`, `hairstyle`.`name` as `service_type` FROM `service_detail` JOIN `barber` ON `service_detail`.`id_barber` = `barber`.`id_barber` JOIN `partner` ON `barber`.`id_partner` = `partner`.`id` JOIN `hairstyle` ON `service_detail`.`id_hairstyle` = `hairstyle`.`id_hairstyle` JOIN `users` ON `service_detail`.`id_users` = `users`.`id`  LEFT JOIN `promotion` ON `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` left join `tracking` on `service_detail`.`id_service_detail` = `tracking`.`fk_sd_id` WHERE `service_date` = '" . $_POST['service_date'] . "' and `partner`.`id` = '" . $rs[0]['id'] . "' and `status` != '1' ";

        if (!empty($_POST['id_barber'])) {
            $sql .= " AND `barber`.`id_barber` = '" . $_POST['id_barber'] . "'";
        }
        $sql .= " order by `service_date` desc,`service_time` desc";
        $rs = getpdo($conn, $sql);

        $res = array("code" => 200, "result" => $rs, "sql" => $sql);
        echo json_encode($res);
        return;
    }

} else if (isset($_POST['action']) && $_POST['action'] == 'get_detail_order_by_barber') {
    $sql = "SELECT `tracking`.*,`service_detail`.*,`barber`.`name` as `barber_name`, `hairstyle`.*, `promotion`.*, `partner`.*, `users`.`username` as `customer_name`, CONCAT(`users`.`house_no`,' ', `users`.`village_no`,' ',`users`.`sub_area`,' ',`users`.`area`,' ',`users`.`province`,' ',`users`.`postal_code`) as `address`,`users`.`phone` as `phone`, `hairstyle`.`name` as `service_type` FROM `service_detail` JOIN `barber` ON `service_detail`.`id_barber` = `barber`.`id_barber` JOIN `partner` ON `barber`.`id_partner` = `partner`.`id` JOIN `hairstyle` ON `service_detail`.`id_hairstyle` = `hairstyle`.`id_hairstyle` JOIN `users` ON `service_detail`.`id_users` = `users`.`id`  LEFT JOIN `promotion` ON `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` left join `tracking` on `service_detail`.`id_service_detail` = `tracking`.`fk_sd_id` WHERE `service_date` = '" . $_POST['service_date'] . "' and `partner`.`id` = '" . $_POST['id_partner'] . "' and `status` != '1' ";

    if (!empty($_POST['id_barber'])) {
        $sql .= " AND `barber`.`id_barber` = '" . $_POST['id_barber'] . "'";
    }
    $sql .= " order by `service_date` desc,`service_time` desc";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $res = array("code" => 200, "result" => $rs, "sql" => $sql);
        echo json_encode($res);
        return;
    }

} else if (isset($_POST['action']) && $_POST['action'] == 'get_order_by_barber') {
    $sql = "SELECT `service_detail`.*,`barber`.`name` as `barber_name`, `hairstyle`.*, `promotion`.*, `partner`.*  FROM `service_detail` JOIN `barber` ON `service_detail`.`id_barber` = `barber`.`id_barber` JOIN `partner` ON `barber`.`id_partner` = `partner`.`id` JOIN `hairstyle` ON `service_detail`.`id_hairstyle` = `hairstyle`.`id_hairstyle` LEFT JOIN `promotion` ON `hairstyle`.`id_hairstyle` = `promotion`.`fk_hairstyle_id` WHERE `service_detail`.`id_barber` = '" . $_POST['id_barber'] . "' and `status` = 2";
    if (isset($_POST['service_date'])) {
        $sql .= " and `service_date` = '" . $_POST['service_date'] . "'";
    }

    $sql .= " order by `service_date` desc,`service_time` desc";
    $rs = getpdo($conn, $sql);
    $res = array("code" => 200, "result" => $rs);
    echo json_encode($res);
    return;
} else if (isset($_POST['action']) && $_POST['action'] == 'get_filter') {
    $sql = "SELECT * FROM `barber` join `partner` on `barber`.`id_partner` = `partner`.`id` WHERE `fk_user_id`= '" . $_POST['id'] . "'";
    $rs = getpdo($conn, $sql);
    $res = array("code" => 200, "result" => $rs);
    echo json_encode($res);
    return;
} else if (isset($_POST['action']) && $_POST['action'] == 'remove_closed') {
    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = " DELETE FROM `partner_closed` WHERE `date` = '" . $_POST['date'] . "' and `time` = '" . $_POST['time'] . "' and `fk_partner_id` = '" . $rs[0]['id'] . "'";
        $rs = getpdo($conn, $sql);

        if ($rs) {
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;
        }
    }

} else if (isset($_POST['action']) && $_POST['action'] == 'add_closed') {

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $partner = $rs[0]['id'];

        $sql = "INSERT INTO `partner_closed`(`date`, `time`, `fk_partner_id`) VALUES ('" . $_POST['date'] . "','" . $_POST['time'] . "','" . $partner . "')";
        $rs = getpdo($conn, $sql);

        if ($rs) {

            $sql = "UPDATE `service_detail` SET `status` = 0 WHERE `service_date` = '" . $_POST['date'] . "' and `service_time` = '" . $_POST['time'] . "' and status = 2 and `id_barber` in (SELECT id_barber FROM barber WHERE barber.id_partner = '" . $partner . "')";
            $rs = getpdo($conn, $sql);

            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_closed') {

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $partner = $rs[0]['id'];

        $sql = "SELECT * FROM `partner_closed` WHERE `fk_partner_id` = '" . $partner . "' and `date` = '" . $_POST['date'] . "'";

        $rs = getpdo($conn, $sql);

        $res = array("code" => 200, "result" => $rs, 'sql' => $sql);
        echo json_encode($res);
        return;
    }

} else if (isset($_POST['action']) && $_POST['action'] == 'create_biz_shop') {
    $img = '';
    if (isset($_FILES['files'])) {
        $total = count($_FILES['files']['name']);
        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES['files']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                $newFilePath = "../upload/" . time() . $_FILES['files']['name'][$i];
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $img = "upload/" . time() . $_FILES['files']['name'][$i];
                }
            }
        }
    }

    // $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '".$_POST['user_id']."'";
    // echo $sql;
    // $rs = getpdo($conn,$sql);

    // if($rs){
    $sql = "UPDATE `partner` SET `biz_image`= '" . $img . "' WHERE `fk_user_id`= '" . $_POST['user_id'] . "'";
    $rs = getpdo($conn, $sql);
    if ($rs) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
    // }

} else if (isset($_POST['action']) && $_POST['action'] == 'get_notification_with_partner') {
    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['user_id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $partner = $rs[0]['id'];

        $sql = "SELECT *,`hairstyle`.`name` as `hairstyle_name`,`barber`.`name` as `barber_name` FROM `service_detail` JOIN `users` ON `users`.`id` = `service_detail`.`id_users` JOIN `hairstyle` ON `hairstyle`.`id_hairstyle` = `service_detail`.`id_hairstyle` JOIN `partner` ON `partner`.`id` = `hairstyle`.`id_partner`JOIN `barber` ON `barber`.`id_barber`= `service_detail`.`id_barber` WHERE `hairstyle`.`id_partner` = '" . $partner . "' and status != 1 order by `service_detail`.`update_at` limit 5";

        $rs = getpdo($conn, $sql);

        $res = array("code" => 200, "result" => $rs, 'sql' => $sql);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_notification_with_customer') {

    $sql = "SELECT *,`hairstyle`.`name` as `hairstyle_name`,`barber`.`name` as `barber_name` FROM `service_detail` JOIN `users` ON `users`.`id` = `service_detail`.`id_users` JOIN `hairstyle` ON `hairstyle`.`id_hairstyle` = `service_detail`.`id_hairstyle` JOIN `partner` ON `partner`.`id` = `hairstyle`.`id_partner`JOIN `barber` ON `barber`.`id_barber`= `service_detail`.`id_barber` WHERE `service_detail`.`id_users` = '" . $_POST['user_id'] . "' and status != 1 order by `service_detail`.`update_at` limit 5";

    $rs = getpdo($conn, $sql);

    $res = array("code" => 200, "result" => $rs, 'sql' => $sql);
    echo json_encode($res);
    return;

} else if (isset($_POST['action']) && $_POST['action'] == 'get_address_user') {
    $sql = "SELECT * FROM `users` WHERE `id`= '" . $_POST['id'] . "'";
    // echo $sql;
    $rs = getpdo($conn, $sql);
    if (isset($rs)) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'update_status') {
    $sql = "UPDATE `service_detail` SET `status` = 0 WHERE `id_service_detail` = '" . $_POST['id'] . "'";
    $rs = getpdo($conn, $sql);

    if (isset($rs)) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'create_review') {
    $sql = "INSERT INTO `review`( `rating`, `detail`, `fk_sd_id`) VALUES ('" . $_POST['rate'] . "','" . $_POST['detail'] . "','" . $_POST['id'] . "')";
    $rs = getpdo($conn, $sql);
// echo $sql;
    if (isset($rs)) {
        $sql = "UPDATE `service_detail` SET `status` = " . $_POST['status'] . " WHERE `id_service_detail` = '" . $_POST['id'] . "'";
        $rs = getpdo($conn, $sql);

        $res = array("code" => 200, "result" => $rs, "sql" => $sql);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'create_traking') {

    $sql = "INSERT INTO `tracking`(`tracking_on`, `tracking_type`, `fk_sd_id`) VALUES ('" . $_POST['tracking_on'] . "','" . $_POST['tracking_type'] . "','" . $_POST['fk_sd_id'] . "')";
    $rs = getpdo($conn, $sql);

    if (isset($rs)) {
        $res = array("code" => 200, "result" => $rs, "sql" => $sql);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_picture') {

    $sql = "SELECT `path`, `fk_sd_id`, `type` FROM `service_images` WHERE `fk_sd_id`= '" . $_POST['fk_sd_id'] . "'";

    $rs = getpdo($conn, $sql);

    if ($rs) {
        $res = array("code" => 200, "result" => $rs);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_appointment_name_barber') {

    $sql = "SELECT * FROM `barber` WHERE `id_barber` = '" . $_POST['barber_id'] . "'";
// echo $sql;
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $res = array("code" => 200, "result" => $rs[0]);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_appointment_name_barber') {

    $sql = "SELECT * FROM `barber` WHERE `id_barber` = '" . $_POST['barber_id'] . "'";
// echo $sql;
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $res = array("code" => 200, "result" => $rs[0]);
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_order_7_day') {

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['id'] . "'";
    $partner = getpdo($conn, $sql);

    if ($partner) {
        $partner_id = $partner[0]['id'];
        $lastmonth = mktime(0, 0, 0, date("m"), date("d") - $_POST['day'], date("Y"));
        $sql = "SELECT `service_date`, COUNT(`id_service_detail`) AS count FROM `service_detail` join `barber` on `barber`.`id_barber` = `service_detail`.`id_barber` WHERE `service_date` <= CURDATE() AND `service_date` > '" . date('Y-m-d', $lastmonth) . "' and `id_partner` = '" . $partner_id . "' GROUP BY `service_date`  ORDER BY`service_date` DESC";
        // echo $sql;

        $rs = getpdo($conn, $sql);

        if ($rs) {

            $res = array("code" => 200, "result" => array("service" => $rs, "partner" => $partner));
            echo json_encode($res);
            return;
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == 'get_money') {

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['id'] . "'";
    $partner = getpdo($conn, $sql);

    if ($partner) {
        $partner_id = $partner[0]['id'];
        // $mydate = getdate(date("U"));
        // $early_month = $mydate["year"] . "-" . $mydate["mon"] . "-01";
        $lastmonth = mktime(0, 0, 0, date("m"), date("d") - $_POST['day'], date("Y"));
//   WHERE  `service_date` between  '" . $early_month . "' AND last_day('" . $early_month . "') and `id_partner` = '" . $partner_id . "' 
        $sql = "SELECT `service_date`, SUM(`price`) AS total_price  
        FROM `service_detail` 
        join `barber` on `barber`.`id_barber` = `service_detail`.`id_barber` 
        WHERE `service_date` <= CURDATE() AND `service_date` > '" . date('Y-m-d', $lastmonth) . "' and `id_partner` = '" . $partner_id . "'
        GROUP BY `service_date`  
        ORDER BY`service_date` ";
        // echo $sql;

        $rs = getpdo($conn, $sql);

        if ($rs) {

            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;

        }}
}else if (isset($_POST['action']) && $_POST['action'] == 'get_review_barber_filter') {

    $sql = "SELECT `partner`.* FROM `partner` WHERE `fk_user_id` = '" . $_POST['id'] . "'";
    $rs = getpdo($conn, $sql);

    if ($rs) {
        $sql = "SELECT *, `review`.`create_at`AS `review_date` ,`barber`.`image` AS barber_img
        FROM `review` 
        JOIN `service_detail` on `service_detail`.`id_service_detail` = `review`.`fk_sd_id` 
        -- JOIN `service_images` on `service_detail`.`id_service_detail` = `service_images`.`fk_sd_id` 
        JOIN `users` ON `users`.`id` = `service_detail`.`id_users` 
        JOIN `hairstyle` on `hairstyle`.`id_hairstyle` = `service_detail`.`id_hairstyle` 
        JOIN `barber` ON `barber`.`id_barber` = `service_detail`.`id_barber`
        WHERE `hairstyle`.`id_partner` = '" . $rs[0]['id'] . "'";

        if (!empty($_POST['id_hairstyle'])) {
            $sql .= " AND `hairstyle`.`id_hairstyle` = '" . $_POST['id_hairstyle'] . "'";
        }
        if(!empty($_POST['id_barber'])){
            $sql .= " AND `barber`.`id_barber` = '" . $_POST['id_barber'] . "'";
        }
        $sql .= " GROUP BY `service_detail`.`id_service_detail` ORDER BY `review_date` DESC LIMIT 5";
        // echo $sql;
        $rs = getpdo($conn, $sql);

        if(gettype($rs) == 'array'){
            $sql = "SELECT * FROM `service_images`";
            $pic = getpdo($conn,$sql);
            $res = array("code" => 200, "result" => $rs,'picture' => $pic, "sql" => $sql);
            echo json_encode($res);
            return; 
        }
    }

}else if (isset($_POST['action']) && $_POST['action'] == 'get_filter_hairstyle') {
    $sql = "SELECT * FROM `partner` JOIN `hairstyle` ON `partner`.`id` = `hairstyle`.`id_partner` WHERE `fk_user_id`= '" . $_POST['id'] . "'";
    $rs = getpdo($conn, $sql);
    $res = array("code" => 200, "result" => $rs);
    echo json_encode($res);
    return;
}else if (isset($_POST['action']) && $_POST['action'] == 'get_hairstyle_detail') {
        $sql = "SELECT `hairstyle`.`name` AS hairstyle_name,`service_detail`.`id_hairstyle`, COUNT(`service_detail`.`id_hairstyle`) AS total_hair 
        FROM service_detail 
        JOIN hairstyle ON `hairstyle`.`id_hairstyle` = `service_detail`.`id_hairstyle` 
        JOIN partner ON `partner`.`id` = `hairstyle`.`id_partner` 
        WHERE `partner`.`fk_user_id`= '" . $_POST['id'] . "' 
        GROUP BY `service_detail`.`id_hairstyle` 
        ORDER BY total_hair DESC";
        $rs = getpdo($conn, $sql);
      
        $res = array("code" => 200, "result" => $rs, "sql" => $sql);
        echo json_encode($res);
        return;
    

}else if (isset($_POST['action']) && $_POST['action'] == 'get_total_book') {
    $sql = "SELECT *, `barber`.`name` AS barber_name, `hairstyle`.`name` AS hair_name FROM `service_detail` 
    JOIN `barber` ON `barber`.`id_barber` = `service_detail`.`id_barber`
    JOIN `partner` ON `partner`.`id` = `barber`.`id_partner`
    JOIN `users` ON  `users`.`id` = `service_detail`.`id_users`
    JOIN `hairstyle` ON `hairstyle`.`id_hairstyle` = `service_detail`.`id_hairstyle`
    WHERE  `partner`.`fk_user_id` = '" . $_POST['id'] . "'
    ORDER BY `service_date` DESC LIMIT 5";
    $rs = getpdo($conn, $sql);
  
    $res = array("code" => 200, "result" => $rs, "sql" => $sql);
    echo json_encode($res);
    return;

}else if (isset($_POST['action']) && $_POST['action'] == 'get_ten_percent') {

    $sql = "SELECT * FROM `partner` WHERE `fk_user_id` = '" . $_POST['id'] . "'";
    $partner = getpdo($conn, $sql);

    if ($partner) {
        $partner_id = $partner[0]['id'];
        $lastmonth = mktime(0, 0, 0, date("m"), date("d") - $_POST['day'], date("Y"));
        // $mydate = getdate(date("U"));
        // $early_month = $mydate["year"] . "-" . $mydate["mon"] . "-01";
//  WHERE  `service_date` between  '" . $early_month . "' AND last_day('" . $early_month . "') and `id_partner` = '" . $partner_id . "' 
        $sql = "SELECT SUM(`service_detail`.`price`) AS sum_price FROM `service_detail` 
        join `barber` on `barber`.`id_barber` = `service_detail`.`id_barber` 
        WHERE `service_date` <= CURDATE() AND `service_date` > '" . date('Y-m-d', $lastmonth) . "' and `id_partner` = '" . $partner_id . "'
        GROUP BY  `barber`.`id_partner` ";
        // echo $sql;

        $rs = getpdo($conn, $sql);

        if ($rs) {

            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;

        }}
}else if (isset($_POST['action']) && $_POST['action'] == 'get_price_admin_fashion') {
    $lastmonth = mktime(0, 0, 0, date("m"), date("d") - $_POST['day'], date("Y"));
    $sql = "SELECT `service_detail`.`service_date`,`partner`.`biz_type`,SUM(`service_detail`.`price`) AS fa_sum 
    FROM `service_detail` 
    join `barber` on `barber`.`id_barber` = `service_detail`.`id_barber` 
    join `partner` on `partner`.`id` = `barber`.`id_partner` 
    WHERE `service_date` <= CURDATE() AND `service_date` > '" . date('Y-m-d', $lastmonth) . "' 
    GROUP BY `service_detail`.`service_date`,`partner`.`biz_type`";
//    echo $sql;
    // echo  date('Y-m-d', $lastmonth);
    $rs = getpdo($conn, $sql);
        if ($rs) {
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;
    }
}else if (isset($_POST['action']) && $_POST['action'] == 'show_partner_admin') {
   
    $sql = "SELECT  `service_detail`.`service_date`,`partner`.`biz_name`,SUM(`service_detail`.`price`) AS  total_partner
    FROM `service_detail` 
    JOIN `barber` ON `barber`.`id_barber` = `service_detail`.`id_barber`
    JOIN `partner` ON `partner`.`id` = `barber`.`id_partner`
    WHERE MONTH(`service_detail`.`service_date`) = '". $_POST['month']."' AND YEAR(`service_detail`.`service_date`) = '". $_POST['year']."' 
    GROUP BY  `partner`.`biz_name`";
//    echo $sql;
    // echo  date('Y-m-d', $lastmonth);
    $rs = getpdo($conn, $sql);
        if ($rs) {
            $res = array("code" => 200, "result" => $rs);
            echo json_encode($res);
            return;
    }
}

$result = array("message" => "Error someting");
$res = array("code" => 401, "result" => $result, "sql" => $sql);
echo json_encode($res);
