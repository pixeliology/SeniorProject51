<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
include "backend/1-connectDB.php";
$sqllg = "SELECT * FROM contact ";
$resultlg = mysqli_query($conn, $sqllg);
$lg = mysqli_fetch_array($resultlg);
extract($lg);
?>

<head>
    <meta charset="UTF-8">
    <title> MarketRental - user-profile</title>
    <link rel="stylesheet" href="./css/profilebar.css" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="./<?php echo $lg['ct_logo'] ?>" />
</head>
<?php
include "backend/1-import-link.php";
require "backend/auth-auth.php";
require "backend/auth-signup.php";
?>

<body>
    <div class="profileicon prevent-select" onclick="signIn()">
        <p>เข้าสู่ระบบ/สมัครสมาชิก</p>
        <i id="profileicon" class='bx bxs-user-circle bx-md'></i>
    </div>

    <div id="profilebar" class="profilebar">
        <i class='bx bxs-caret-right-circle' id="close-profile-btn" onclick="closeprofilebar()"></i>
        <!-- เข้าสู่ระบบ -->
        <div id="signIn">
            <i class='bx bxs-user-circle authicon'></i>
            <h1>เข้าสู่ระบบ</h1>
            <form method="POST">
                <div class="des_input">ชื่อบัญชีผู้ใช้
                </div>
                <input class="input inputcolor" type="text" name="username-login" placeholder="ชื่อบัญชีผู้ใช้" required>
                <br>
                <div class="des_input">รหัสผ่าน</div>
                <input class="input inputcolor" type="password" name="password-login" placeholder="รหัสผ่าน" required>
                <a href="#" onclick="showforgotpsw()" class="forgotpsw">ลืมรหัสผ่าน?</a>
                <br>
                <input class="input submit" type="submit" name="login-btn" value="เข้าสู่ระบบ">
            </form>
            <div class="center"><a href="#" onclick="showsignup()" class="link">ยังไม่ได้เป็นสมาชิก? สมัครสมาชิก</a> </div>
        </div>
        <!-- ลืมรหัสผ่าน -->
        <div id="forgotpsw">
            <i class='bx bxs-user-circle authicon'></i>

            <h1>ลืมรหัสผ่าน</h1>
            <form method="POST">
                <div class="des_input">ชื่อบัญชีผู้ใช้
                </div>
                <input class="input inputcolor" type="text" name="username-forgot" required>
                <br>
                <div class="des_input">อีเมล</div>
                <input class="input inputcolor" type="email" name="email-forgot" required>
                <br>
                <input class="input submit" type="submit" name="forgot-btn" value="ส่งรหัสผ่านไปยังอีเมล">
            </form>
            <div class="center"><a href="#" onclick="showsignIn()" class="link"> ย้อนกลับไปเข้าสู่ระบบ</a> </div>
        </div>
        <!-- สมัครสมาชิก -->
        <div id="signUp">
            <i class='bx bxs-user-circle authicon'></i>

            <h1>สมัครสมาชิก</h1>
            <form method="POST">
                <div class="des_input">ประเภทผู้ใช้</div>
                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    พ่อค้า/แม่ค้า
                </label>
                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="2">
                <label class="form-check-label" for="flexRadioDefault2">
                    เจ้าของตลาด
                </label>
                <div class="des_input mt-1">ชื่อบัญชีผู้ใช้</div>
                <input class="input inputcolor" placeholder="ชื่อบัญชีผู้ใช้" type="text" name="username-reg" required>
                <br>
                <div class="des_input">ชื่อ-นามสกุล</div>
                <div class="hstack gap-2">
                    <input class="input inputcolor" placeholder="ชื่อ" style="width: 48%;" type="text" name="firstName-reg" required>
                    <input class="input inputcolor" placeholder="ชื่อนามสกุล" style="width: 48%;" type="text" name="lastName-reg" required>
                </div>
                <div class="des_input">อีเมล</div>
                <input class="input inputcolor" id="email" type="email" name="email-reg" placeholder="อีเมล" required>
                <br>
                <div class="des_input">เบอร์โทรศัพท์</div>
                <input class="input inputcolor" id="tel" type="tel" name="tel-reg" placeholder="เบอร์โทรศัพท์" pattern="[0-9]{10}" title="กรุณากรอกเบอร์โทรศัพท์ หมายเลข (0-9) จำนวน 10 ตัว" required>
                <br>
                <div class="des_input">รหัสผ่าน</div>
                <input class="input inputcolor" type="password" id="password" name="password" placeholder="รหัสผ่าน" pattern=".{8,}" required>
                <span class="note">**กรุณาตั้งรหัสผ่านอย่างน้อย 8 ตัวอักษร</span>
                <br>
                <div class="des_input">ยืนยันรหัสผ่าน</div>
                <input class="input inputcolor" type="password" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" required>
                <br>
                <input class="input submit" type="submit" name="reg-btn" value="สมัครสมาชิก" onclick="validatePassword()">
            </form>
            <div class="center"><a href="#" onclick="showsignIn()" class="link">มีบัญชีอยู่แล้ว? เข้าสู่ระบบ</a> </div>
        </div>
    </div>
</body>


<script src="backend/script.js" type="text/javascript"></script>
<script>
    $(":input").inputmask();

    $("#tel").inputmask({
        "mask": "9999999999"
    });
</script>

</html>