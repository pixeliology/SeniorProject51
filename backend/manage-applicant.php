<?php
include "../backend/1-connectDB.php";
include "../backend/1-import-link.php";

$count_n = 1;
$data = "SELECT req_partner.*, 
    users.username ,
    provinces.province_name,
    amphures.amphure_name,
    districts.district_name , 
    market_type.market_type,
    req_status.req_status
    FROM req_partner 
        JOIN users ON (req_partner.users_id = users.users_id)
        JOIN provinces ON (req_partner.province_id = provinces.id)
        JOIN amphures ON (req_partner.	amphure_id = amphures.id)
        JOIN districts ON (req_partner.district_id = districts.id)
        JOIN market_type ON (req_partner.market_type_id = market_type.market_type_id)
        JOIN req_status ON (req_partner.req_status_id = req_status.req_status_id) WHERE (req_partner.req_status_id = '1')
        ORDER BY `timestamp` ASC";
$result = mysqli_query($conn, $data);
$data1 = "SELECT req_partner.*, 
    users.username ,
    provinces.province_name,
    amphures.amphure_name,
    districts.district_name , 
    market_type.market_type,
    req_status.*
    FROM req_partner 
        JOIN users ON (req_partner.users_id = users.users_id)
        JOIN provinces ON (req_partner.province_id = provinces.id)
        JOIN amphures ON (req_partner.	amphure_id = amphures.id)
        JOIN districts ON (req_partner.district_id = districts.id)
        JOIN market_type ON (req_partner.market_type_id = market_type.market_type_id)
        JOIN req_status ON (req_partner.req_status_id = req_status.req_status_id)
        ORDER BY `timestamp` ASC";
$result2 = mysqli_query($conn, $data1);


// อนุมัติตลาด

if (isset($_GET['approve'])) {
     $approveid = $_GET['approve'];
     $sqlqry = "SELECT * FROM req_partner WHERE (req_partner_id=$approveid) ";
     $qry = mysqli_query($conn, $sqlqry);
     $row = mysqli_fetch_array($qry);
     extract($row);

     $market_name = $row['market_name'];
     $market_descrip = $row['market_descrip'];
     $market_pic = $row['market_pic'];
     $market_type_id = $row['market_type_id'];
     $users_id = $row['users_id'];
     $email = $row['email'];
     $tel = $row['tel'];
     $opening = $row['opening'];
     $min_rent = $row['min_rent'];

     $house_no = $row['house_no'];
     $soi = $row['soi'];
     $moo = $row['moo'];
     $road = $row['road'];
     $district_id = $row['district_id'];
     $amphure_id = $row['amphure_id'];
     $province_id = $row['province_id'];
     $postalcode = $row['postalcode'];

     $approve = "UPDATE req_partner SET req_status_id = '2' WHERE (req_partner_id = $approveid)";
     $insert = "INSERT INTO `market_detail`( `mkr_name`, `mkr_descrip`, `mkr_pic`, `market_type_id`, `users_id`, `email`, `tel`, `house_no`, `soi`, `moo`, `road`, `district_id`, `amphure_id`, `province_id`, `postalcode`,`opening`,`min_rent`) 
     VALUES ('$market_name','$market_descrip','$market_pic','$market_type_id','$users_id','$email','$tel','$house_no','$soi','$moo','$road','$district_id','$amphure_id','$province_id','$postalcode','$opening','$min_rent')";

     $ql = mysqli_query($conn, $approve);
     $isql = mysqli_query($conn, $insert);
     $mkr_id =  mysqli_insert_id($conn);

     $InsertcostUnit = "INSERT INTO `cost/unit`(`cu_name`, `cu_price`, `mkr_id`) VALUES ('ค่าน้ำ','0','$mkr_id'),('ค่าไฟ','0','$mkr_id'),('ค่าขยะ','0','$mkr_id')";
     $sqlCU = mysqli_query($conn, $InsertcostUnit);

     $user_info = "SELECT * FROM `users` WHERE(users_id = $users_id)";
     $qryuser_info = mysqli_query($conn, $user_info);
     $rowus = mysqli_fetch_array($qryuser_info);
     $p_name = $rowus['firstName'];
     $p_surname = $rowus['lastName'];

     $Insertpayment = "INSERT INTO `payment_info`(`p_name`, `p_surname`, `p_promtpay`, `p_bank`, `p_account`, `mkr_id`) VALUES ('$p_name','$p_surname','-','ธนาคารไทยพาณิชย์ (SCB)','-','$mkr_id')";
     $sqlInsertpayment = mysqli_query($conn, $Insertpayment);


     if ($ql) {
          echo "<script>Approvesuccess();</script>";
     } else {
          echo "<script>error();</script>";
     }
}

// ไม่อนุมัติตลาด
if (isset($_GET['denied'])) {
     $deniedid = $_GET['denied'];
     $denied = "UPDATE req_partner SET req_status_id = '3' WHERE (req_partner_id = $deniedid)";
     if (mysqli_query($conn, $denied)) {
          echo "<script>Deninedsuccess();</script>";
     } else {
          echo "<script>error();</script>";
     }
}
mysqli_close($conn);
