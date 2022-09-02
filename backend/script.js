//profilebar--------------------------------------------------------------------------------------------------------------

// เปิดหน้าโปรไฟล์บาร์
function signIn() {
    document.getElementById("profilebar").style.right = "0";
    document.getElementById("signIn").style.display = "block";
    document.getElementById("forgotpsw").style.display = "none";
    document.getElementById("signUp").style.display = "none";
    document.getElementById("profilebar").style.transition = "0.5s ease";

}
// ปิดหน้าโปรไฟล์บาร์
function closeprofilebar() {
    document.getElementById("profilebar").style.right = "-450px";
}
// เปิดหน้าลืมรหัสผ่าน
function showforgotpsw() {
    document.getElementById("signIn").style.display = "none";
    document.getElementById("forgotpsw").style.display = "block";
    document.getElementById("signUp").style.display = "none";
}
// เปิดหน้าเข้าสู่ระบบ
function showsignIn() {
    document.getElementById("signIn").style.display = "block";
    document.getElementById("forgotpsw").style.display = "none";
    document.getElementById("signUp").style.display = "none";
}
// เปิดหน้าลงทะเบียน
function showsignup() {
    document.getElementById("signIn").style.display = "none";
    document.getElementById("forgotpsw").style.display = "none";
    document.getElementById("signUp").style.display = "block";
}

// เชครหัสตรงกัน
var password = document.getElementById("password"),
    confirm_password = document.getElementById("confirm_password");

function validatePassword() {
    if (password.value == confirm_password.value) {
        return true;
    } else {
        alert("กรุณากรอกรหัสผ่านให้ตรงกัน");
        return false;
    }
}
//applicant--------------------------------------------------------------------------------------------------------------

// nextbtn
function nextbtn() {
    document.getElementById("stepOne").style.display = "none";
    document.getElementById("stepTwo").style.display = "block";
    document.getElementById("stepThree").style.display = "none";
    
}
// previousbtn
function previousbtn() {
    document.getElementById("stepOne").style.display = "block";
    document.getElementById("stepTwo").style.display = "none";
    document.getElementById("stepThree").style.display = "none";

}
function gotostep3(){
    document.getElementById("stepOne").style.display = "none";
    document.getElementById("stepTwo").style.display = "none";
    document.getElementById("stepThree").style.display = "block";
}
function backtostep2(){
    document.getElementById("stepOne").style.display = "none";
    document.getElementById("stepTwo").style.display = "block";
    document.getElementById("stepThree").style.display = "none";
}

//banner--------------------------------------------------------------------------------------------------------------  
$(document).ready(function () {
    $("#myTable").DataTable({
        scrollY: '550px',
        scrollCollapse: true,
        paging: true,
        lengthChange: false,
        "language": {
            "search": "ค้นหา :",
            "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
            "info": "แสดงผลลัพธ์ _PAGE_ จาก _PAGES_ หน้า",
            "infoEmpty": "ไม่พบตารางที่ค้นหา",
            "infoFiltered": "(ค้นหาจากทั้งหมด _MAX_ ตาราง)",
            "paginate": {
                "previous": "ก่อนหน้า",
                "next": "หน้าถัดไป",

            }
        }
    });

});