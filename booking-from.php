<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มจองแผงค้า</title>
    <link rel="stylesheet" href="./css/applicant.css" type="text/css">

</head>

<?php

include "profilebar.php";
include "nav.php";
include "backend/1-connectDB.php";
include "backend/1-import-link.php";
?>

<body>
    <div class="applybox">
        <h1 id="headline">กรอกข้อมูลเพื่อสร้างคำร้องขอเป็นพาร์ทเนอร์</h1>
        <form id="applyform" method="POST" enctype="multipart/form-data" novalidate>
            <!-- แถบโปรเกสฟอร์ม -->
            <section class="step-wizard">
                <ul class="step-wizard-list">
                    <li id="Onestep" class="step-wizard-item">
                        <span class="progress-count">1</span>
                        <span class="progress-label">ข้อมูลส่วนตัว</span>
                    </li>
                    <li id="Twostep" class="step-wizard-item  current-item">
                        <span class="progress-count">2</span>
                        <span class="progress-label">ข้อมูลตลาด</span>
                    </li>
                    <li id="Threestep" class="step-wizard-item  current-item">
                        <span class="progress-count">3</span>
                        <span class="progress-label">ตรวจสอบข้อมูล</span>
                    </li>
                </ul>
            </section>

            <div class="form-outer form-group" style="overflow: visible;">
                <!-- form--1 -->
                <div id="stepOne" class="row">
                    <div class="des_input">ชื่อ</div>
                    <input class="form-control col-6" type="text" placeholder="ชื่อ" name="firstName" pattern="[^0-9]+" required autofocus>
                    <div class="des_input">นามสกุล</div>
                    <input class="form-control col-6" type="text" placeholder="นามสกุล" name="lastName" pattern="[^0-9]+" required>
                    <div class="des_input">อีเมล</div>
                    <input class="sqr-input col-12 form-control " type="email" placeholder="อีเมล" name="email" required>
                    <div class="des_input">เบอร์โทรศัพท์</div>
                    <input name="tel" class="sqr-input col-12 form-control" type="text" placeholder="เบอร์โทรศัพท์" name="name" pattern="[0-9]{10}" title="กรุณากรอกเบอร์โทรศัพท์ หมายเลข (0-9) จำนวน 10 ตัว" required>
                    <div class="des_input">สำเนาบัตรประจำตัวประชาชน</div>
                    <input class="sqr-input col-12 form-control" type="file" aria-label="อัปโหลดเอกสาร" name="cardIDcpy" required>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 20px;">
                        <button class="btn btn-primary w-25" type="button" onclick="nextbtn()" id="next">ถัดไป</button>
                    </div>
                </div>

                <!-- form--2-->
                <div id="stepThree" class="row">
                    <div class="des_input">ชื่อนะจ๊ะ</div>
                    <input class="form-control col-6" type="text" placeholder="ชื่อ" name="firstName" pattern="[^0-9]+" required autofocus>
                    <div class="des_input">นามสกุล</div>
                    <input class="form-control col-6" type="text" placeholder="นามสกุล" name="lastName" pattern="[^0-9]+" required>
                    <div class="des_input">อีเมล</div>
                    <input class="sqr-input col-12 form-control " type="email" placeholder="อีเมล" name="email" required>
                    <div class="des_input">เบอร์โทรศัพท์</div>
                    <input name="tel" class="sqr-input col-12 form-control" type="text" placeholder="เบอร์โทรศัพท์" name="name" pattern="[0-9]{10}" title="กรุณากรอกเบอร์โทรศัพท์ หมายเลข (0-9) จำนวน 10 ตัว" required>
                    <div class="des_input">สำเนาบัตรประจำตัวประชาชน</div>
                    <input class="sqr-input col-12 form-control" type="file" aria-label="อัปโหลดเอกสาร" name="cardIDcpy" required>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 20px;">
                        <button name="previous" class="btn btn-primary me-md-4 w-25" type="button" onclick="previousbtn()" id="back">ย้อนกลับ</button>
                        <button class="btn btn-primary w-25" type="button" onclick="nextbtn2()" id="next">ถัดไป</button>
                    </div>
                </div>

                <!-- form--3 -->
                <div id="stepTwo" class="row">
                    <div class="des_input">ชื่อตลาด</div>
                    <input class=" col-12 form-control" type="text" placeholder="ชื่อตลาด" name="mkrName" required>
                    <div class="row" id="dropdown">
                        <div class="col-6" id="mkrtype">
                            <div class="des_input">ประเภทตลาด</div>
                            <div class="search_select_box">
                                <select class="selectpicker " title="เลือกประเภท" name="mkrtype" data-width="100%" data-size="5" required>
                                    <?php while ($row1 = mysqli_fetch_array($result_mkrType)) :; ?>
                                        <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6" id="provincebox">
                            <div class="des_input">จังหวัด</div>
                            <div class="search_select_box">
                                <select name="province" id="province" class="selectpicker" data-live-search="true" title="เลือกจังหวัด" data-width="100%" data-size="5" required>
                                    <?php while ($row1 = mysqli_fetch_array($result_province)) :; ?>
                                        <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="des_input">สถานที่ตั้ง</div>
                    <div class="input-group hstack gap2">
                        <div class="first-des-address ">ที่อยู่ :</div>
                        <input class="form-control " type="text" placeholder="ที่อยู่" name="HouseNo" required>
                        <div class="des-address ">ซอย :</div>
                        <input class="form-control " type="text" placeholder="ซอย" name="Soi">
                        <div class="des-address ">หมู่ :</div>
                        <input class="form-control " type="text" placeholder="หมู่" name="Moo">
                        <div class="des-address ">ถนน :</div>
                        <input class="form-control " type="text" placeholder="ถนน" name="Road" required>
                    </div>
                    <div class="input-group hstack gap2">
                        <div class="first-des-address ">ตำบล/แขวง :</div>
                        <input class="form-control" type="text" placeholder="ตำบล/แขวง" name="Subdistrict" required>
                        <div class="des-address ">อำเภอ/เขต :</div>
                        <input class="form-control" type="text" placeholder="อำเภอ/เขต" name="District" required>
                        <div class="des-address ">จังหวัด :</div>
                        <input class="form-control" type="text" placeholder="จังหวัด" name="Province" required>
                        <div class="des-address ">รหัสไปรษณีย์ :</div>
                        <input class="form-control" type="text" placeholder="รหัสไปรษณีย์" name="PostalCode" required>
                    </div>

                    <div class="des_input">รายละเอียดตลาดโดยสังเขป</div>
                    <input class="form-control col-12" type="text" placeholder="กรอกข้อมูลตลาดโดยสังเขป" name="mkrDes" required>
                    <div class="des_input">อัปโหลดเอกสารหรือรูปภาพเพื่อยืนยันตลาด</div>
                    <input class="sqr-input col-12 form-control" type="file" placeholder="เช่น ตลาดขายปลีก ใจกลางเมือง ทำเลดี ติดถนนใหญ่" name="mkrFile" required>
                    <input type="button" name="previous" class="btn btn-primary action-button" value="ย้อนกลับ" onclick="previousbtn2()" id="back">
                    <input type="submit" name="submit-apply" class="btn btn-success submitBtn" id="submit" value="ยืนยันการส่งคำร้อง">

                </div>
            </div>
        </form>
    </div>

</body>
<script src="./backend/script.js"></script>

</html>