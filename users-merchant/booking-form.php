<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MarketRental - กรอกข้อมูลเพื่อจองแผงค้า</title>
    <link rel="shortcut icon" type="image/x-icon" href="../asset/contact/logo.png" />
    <link rel="stylesheet" href="../css/applicant.css" type="text/css">
    <link rel="stylesheet" href="../css/payment.css" type="text/css">


</head>

<?php

include "profilebar.php";
include "nav.php";
include "../backend/1-connectDB.php";
include "../backend/1-import-link.php";
?>

<body>

    <form id="applyform" method="POST" enctype="multipart/form-data" novalidate>
        <div class="form-outer form-group " style="overflow: visible;">
            <h1 id="headline">กรอกข้อมูลเพื่อจองแผงค้า</h1>

            <!-- form--1 -->
            <div id="stepOne" class="row border shadow-sm p-5 mt-3 mb-3 rounded">
                <h4 class="p-0"><span class="text-secondary">ขั้นที่ 1</span> กรอกข้อมูลส่วนตัว</h4>
                <div class="progress p-0 my-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Basic example" style="width: 33.3%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">1/3 </div>
                </div>
                <div class="des_input">ชื่อ</div>
                <input class="form-control col-6" type="text" id="fristname" placeholder="ชื่อ" name="firstName" required autofocus>
                <div class="des_input">นามสกุล</div>
                <input class="form-control col-6" type="text" id="lastname" placeholder="นามสกุล" name="lastName" required>
                <div class="des_input">อีเมล</div>
                <input class="sqr-input col-12 form-control " id="myemail" type="email" placeholder="อีเมล" name="email" required>
                <div class="des_input">เบอร์โทรศัพท์</div>
                <input name="tel" id="mytel" class="sqr-input col-12 form-control" type="text" placeholder="เบอร์โทรศัพท์" name="name" pattern="[0-9]{10}" title="กรุณากรอกเบอร์โทรศัพท์ หมายเลข (0-9) จำนวน 10 ตัว" required>
                <div class="des_input">สำเนาบัตรประจำตัวประชาชน</div>
                <input class="sqr-input col-12 form-control" id="imgInp" type="file" aria-label="อัปโหลดเอกสาร" name="cardIDcpy" required>
                <input type="button" name="next" class=" btn btn-primary action-button" value="ถัดไป" onclick="nextbtn()" id="next">

            </div>
            <!-- form--2 -->
            <div id="stepTwo" class="row border shadow-sm p-5 mt-3 mb-3 rounded">
                <h4 class="p-0"><span class="text-secondary"> ขั้นที่ 2</span> กรอกข้อมูลร้านค้า</h4>
                <div class="progress p-0 my-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Basic example" style="width:  67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100">2/3 </div>
                </div>
                <div class="des_input">ชื่อร้านค้า</div>
                <input class=" col-12 form-control" id="stallName" type="text" placeholder="ชื่อร้านค้า" name="storeName" required>
                <div class="des_input">ระยะเวลาการเช่า</div>
                <select class="form-select" id="rentperiod" aria-label="Default select example">
                    <option selected>ระยะเวลาการเช่า</option>
                    <option value="1 เดือน">1 เดือน</option>
                    <option value="3 เดือน">3 เดือน</option>
                    <option value="1 ปี">1 ปี</option>
                </select>
                <div class="des_input">ประเภทสินค้า</div>
                <select class="form-select" id="productType" aria-label="Default select example">
                    <option selected>ประเภทสินค้า</option>
                    <option value="เสื้อผ้า">เสื้อผ้า</option>
                    <option value="ของกิน">ของกิน</option>
                    <option value="สตรีทฟู้ด">สตรีทฟู้ด</option>
                </select>
                <div class="des_input">วันที่เริ่มเช่า</div>
                <input class=" col-12 form-control" id="dateRent" type="date" name="storeName" required>
                <div class="des_input hstack gap-2">รายละเอียดตลาดโดยสังเขป
                    <div data-toggle="tooltip" title="เช่น ตลาดค้าส่ง ทำเลดี ติดถนนใหญ่ใกล้สี่แยกไฟแดง" class="mt-1">
                        <i class='bx bx-info-circle'></i>
                    </div>
                </div>
                <input class="form-control col-12" type="text" id="Infomrk" placeholder="กรอกข้อมูลตลาดโดยสังเขป" name="mkrDes" required>
                <input type="button" name="previous" class="btn btn-info action-button" style="color: white;" value="ย้อนกลับ" onclick="previousbtn()" id="back">
                <input type="button" name="next" class=" btn btn-primary action-button" value="ถัดไป" onclick="gotostep3(),checkInfo()" id="next">
            </div>

            <!-- form--3 -->
            <div id="stepThree" class="row border shadow-sm p-5 mt-3 mb-3 rounded">

                <h4 class="p-0"><span class="text-secondary"> ขั้นที่ 3</span> ตรวจสอบและยืนยันข้อมูล</h4>
                <div class="progress p-0 my-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Basic example" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">3/3 </div>
                </div>
                <div class="des_input">ชื่อ</div>
                <input class="form-control col-6" id="demofristname" disabled>
                <div class="des_input">นามสกุล</div>
                <input class="form-control col-6" id="demolastname" disabled>
                <div class="des_input">อีเมล</div>
                <input class="form-control col-6" id="demoemail" disabled>
                <div class="des_input">เบอร์โทรศัพท์</div>
                <input class="form-control col-6" id="demotel" disabled>
                <div class="des_input">สำเนาบัตรประจำตัวประชาชน</div>
                <img class="img-fluid" id="blah" src="#" />
                <div class="des_input">ชื่อร้านค้า</div>
                <input class="form-control col-6" id="demostallName" disabled>
                <div class="des_input">ระยะเวลาการเช่า</div>
                <input class="form-control col-6" id="demorentperiod" disabled>
                <div class="des_input">ประเภทสินค้า</div>
                <input class="form-control col-6" id="demoproductType" disabled>
                <div class="des_input">วันที่เริ่มเช่า</div>
                <input class="form-control col-6" id="demodateRent" disabled>
                <div class="des_input">รายละเอียดตลาดโดยสังเขป</div>
                <input class="form-control col-6" id="demoInfomrk" disabled>
                <input type="button" name="previous" class="btn btn-info" style="color: white;" value="ย้อนกลับ" onclick="backtostep2()" id="back">
                <input type="button" name="submit-apply" class="btn btn-success submitBtn" id="submit" value="ยืนยันการส่งคำร้อง" data-bs-toggle="modal" data-bs-target="#payment-rent">
            </div>

            <!-- Modal -->
            <div class="modal fade modal-payment" id="payment-rent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">ชำระค่าเช่าแผงค้า</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="content">
                            <div class="pay-rent-info">
                                <div class="hstack gap-3">
                                    <p class="des-pay">ชื่อผู้จอง</p>:<input type="date" class="form-control" value="01/08/2022" disabled>
                                </div>
                                <div class="hstack gap-3">
                                    <p class="des-pay">รหัสแผงค้า</p>:<input type="text" class="form-control" value="สหัสทยา เทียนมงคล" disabled>
                                </div>
                                <div class="hstack gap-3">
                                    <p class="des-pay">ราคามัดจำ</p>:<input type="text" class="form-control" value="A10" disabled>
                                </div>
                                <div class="hstack gap-3">
                                    <p class="des-pay">รวมทั้งสิ้น</p>:<input type="text" class="form-control" value="เปิดท้าย มข" disabled>
                                </div>
                            </div>

                            <div class="pay">
                                <h5 class="center">แสกน QRCode เพื่อชำระเงิน</h5>
                                <img id="qr-code" src="../asset/qrcode/qr.png" alt="">
                                <div class="hstack gap-3">
                                    <p class="des-pay">ใบเสร็จการโอน</p>:<input type="file" class="form-control">
                                </div>
                                <div class="hstack gap-3">
                                    <p class="des-pay">วันที่โอน</p>:<input type="date" class="form-control">
                                </div>
                                <div class="hstack gap-3">
                                    <p class="des-pay">เวลาที่โอน</p>:<input type="time" class="form-control">
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal">ยกเลิก</button>
                            <button id="confirm" type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">เสร็จสิ้น</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="script.js"></script>
</body>
<script>
    $(document).ready(function() {
        $("body").tooltip({
            selector: '[data-toggle=tooltip]',
            placement: 'right'
        });
    });
    $(":input").inputmask();

    $("#mytel").inputmask({
        "mask": "9999999999"
    });

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>



</html>