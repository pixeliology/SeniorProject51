<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การจองทั้งหมด</title>
    <!-- css  -->
    <link rel="stylesheet" href="../css/banner.css" type="text/css">
</head>
<?php
include "profilebar.php";
include "nav.php";
include "../backend/1-connectDB.php";
include "../backend/1-import-link.php";
require "../backend/add-news.php";
//qry
$count_n = 1;

$data2 = "SELECT * FROM news WHERE mkr_id = '$mkr_id'";
$result3 = mysqli_query($conn, $data2);
?>

<body>
    <h1 class="head_contact">จัดการข่าวสารตลาด</h1>

    <form method="POST" enctype="multipart/form-data" class="add-info p-4 mb-5 border rounded shadow-sm">

        <h4 class="mb-2">เพิ่มข่าวสารใหม่</h4>
        <hr>
        <div class="mt-4 mb-3 row">
            <label class="col-sm-2 col-form-label">หัวเรื่อง</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="n_sub">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">รายละเอียด</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none;" name="n_detail"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">ไฟล์ที่เกี่ยวข้อง</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile" name="n_file">
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary " style="width: 150px;" type="submit" name="add-news">เพิ่ม</button>
        </div>
    </form>


    <div id="table2" class="border p-3 shadow-sm rounded">
        <h4 class="mb-2">ข่าวสารทั้งหมด</h4>
        <hr>
        <table id="myTable" class="display " style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">วันที่เพิ่มข่าว</th>
                    <th scope="col">หัวเรื่อง</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row1 = $result3->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $count_n; ?></td>
                        <td><?php echo $row1['timestamp'] ?></td>
                        <td><?php echo $row1['n_sub']; ?></td>
                        <td><button name="view" type="button" class="modal_data1 btn btn-outline-primary w-50">ดูรายละเอียด</button></td>
                        <td>
                            <div>
                                <a href="../backend/add-news.php?del=<?php echo $row1['n_id']; ?>;" onclick="return confirm('คุณต้องการลบคำร้องนี้หรือไม่')"  class=" btn btn-outline-danger w-75">ลบ</a>
                            </div>
                        </td>
                    <?php $count_n++;
                endwhile ?>
            </tbody>
        </table>
    </div>

    <script src="../backend/script.js"></script>
</body>



</html>