
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MarketRental - จัดการการจอง</title>
    <link rel="shortcut icon" type="image/x-icon" href="../asset/contact/logo.png" />
    <link rel="stylesheet" href="../css/banner.css" type="text/css">
</head>
<?php
include "profilebar.php";
?>
<?php
include "nav.php";
include "../backend/1-connectDB.php";
include "../backend/1-import-link.php";

?>

<body>
    <div class="content">
        <h1 id="headline">จัดการการจอง</h1>
        <div>
            <div id="table" class="bannertb border p-3 shadow-sm rounded mt-3">
                <table id="myTable" class="display " style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">รหัสแผงค้า</th>
                            <th scope="col">วันเริ่มเช่า</th>
                            <th scope="col">วันสิ้นสุดการเช่า</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>A01</td>
                            <td>01/08/2022</td>
                            <td>01/09/2022</td>
                            <td><button name="view" type="button" class="view_data btn btn-outline-primary  " id="<?php echo $row['req_partner_id']; ?>">ดูรายละเอียด</button>
                            </td>
                            <td>
                                <div style="justify-content: center;">
                                    <a href="admin-req-pn-denied.php?req_partner_id=<?php echo $row['req_partner_id']; ?>" onclick="return confirm('คุณต้องการปฏิเสธคำร้องนี้หรือไม่')" class=" btn btn-outline-danger " style="margin-left: 2px;font-size:14px;">ยกเลิกการจอง</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="../backend/script.js"></script>

<script>
    // apply detail popup
    $(document).ready(function() {
        $('.view_data').click(function() {
            var mkrdid = $(this).attr("id");
            $.ajax({
                url: "admin-req-pn-select.php",
                method: "POST",
                data: {
                    mkrdid: mkrdid
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#dataModal').modal('show');
                }
            });

        })
    });
</script>

</html>