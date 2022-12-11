<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
include "../backend/1-connectDB.php";
$sqllg = "SELECT * FROM contact ";
$resultlg = mysqli_query($conn, $sqllg);
$lg = mysqli_fetch_array($resultlg);
extract($lg);
?>
<head>
    <meta charset="UTF-8">
    <title> MarketRental -  sidebar menu</title>
    
    <link rel="stylesheet" href="../css/nav.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?
include "../backend/1-import-link.php";
?>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img class="img-menu" src="../<?php echo $lg['ct_logo'] ?>" alt="logo">
            <span class="logo_name">Market Rental</span>
        </div>
        <ul class="nav-links">
            <li class="navlink">
                <a href="../users-merchant/index.php">
                    <i class='bx bxs-home'></i>
                    <span class="link_name">หน้าหลัก</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../users-merchant/index.php">หน้าหลัก</a></li>
                </ul>
            </li>
            <li class="navlink">
                <a href="../users-merchant/all-market.php">
                    <i class='bx bxs-file-find' style='color:#ffffff'></i>
                    <span class="link_name">ตลาดทั้งหมด</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../users-merchant/all-market.php">ตลาดทั้งหมด</a></li>
                </ul>
            </li>
            <li class="navlink arrowdrop">
                <a class="iocn-link">
                    <i class='bx bxs-cog'></i>
                    <span class="link_name">การจัดการ</span><i class='bx bxs-chevron-down arrow'></i>
                </a>

                <ul class="sub-menu dropdown">
                    <li class="drop"><a href="../users-merchant/rent.php"><i class='bx bxs-edit-alt'></i>จัดการการจอง</a></li>
                    <li class="drop"><a href="../users-merchant/payment.php"><i class='bx bx-wallet'></i>ชำระค่าเช่า</a></li>
                    <li class="drop"><a href="../users-merchant/comp-status.php"><i class='bx bx-circle'></i>ติดตามคำร้องเรียน</a></li>
                </ul>
            </li>

            <li class="navlink">
                <a href="../users-merchant/contact.php">
                    <i class='bx bxs-contact'></i>
                    <span class="link_name">เกี่ยวกับเว็บไซต์</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../users-merchant/contact.php">เกี่ยวกับเว็บไซต์</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".img-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
        let arrow = document.querySelectorAll(".arrowdrop");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
    </script>
</body>

</html>