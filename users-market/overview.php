<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MarketRental - ภาพรวมตลาด</title>

    <!-- css  -->
    <link rel="stylesheet" href="../css/overview.css" type="text/css">

</head>
<?php
include "profilebar.php";
include "nav.php";
include "../backend/1-connectDB.php";
include "../backend/1-import-link.php";
include "../backend/qry-overview.php";
?>
<script src="../backend/script.js"></script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var options = {
            width: 347,
            height: 300,
            animation: {
                duration: 1000,
                easing: 'out'
            },
            backgroundColor: '',
            chartArea: {
                'left': 15,
                'top': 15,
                'right': 0,
                'bottom': 0
            },
            fontSize: '16',

        };
        var data = google.visualization.arrayToDataTable([
            ['ประเภทแผงค้า', 'จำนวนแผงค้า'],
            <?php
            $queryz = "SELECT zone.* , COUNT(stall.z_id) AS countZ  FROM stall JOIN zone ON (stall.z_id = zone.z_id) WHERE (market_id = '$mkr_id') GROUP BY stall.z_id ";
            $rsz = mysqli_query($conn, $queryz);
            foreach ($rsz as $rs_c) {
                echo "['" . $rs_c['z_name'] . "'," . $rs_c['countZ'] . "],";
            }
            ?>

        ]);
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
    // gg chart
    google.charts.load('current', {
        packages: ['corechart', 'line']
    });
    google.charts.setOnLoadCallback(drawBackgroundColor);

    function drawBackgroundColor() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'X');
        data.addColumn('number', 'ยอดการจอง');

        data.addRows([
            ['ม.ค.', 10],
            ['ก.พ.', 23],
            ['มี.ค.', 17],
            ['เม.ย.', 18],
            ['พ.ค.', 9],
            ['มิ.ย.', 11],
            ['ก.ค.', 27],
            ['ส.ค.', 33],
            ['ก.ย.', 40],
            ['ต.ค.', 32],
            ['พ.ย.', 35],
            ['ธ.ค.', 30],
        ]);

        var options = {
            height: 350,
            hAxis: {
                title: 'เดือน'
            },
            vAxis: {
                title: 'ยอดการจอง'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
    $(window).resize(function() {
        drawBackgroundColor();
        drawChart();
    });
</script>


<body>
    <nav aria-label="breadcrumb mb-3">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item fs-5 "><a href="./index.php" class="text-decoration-none">หน้าหลัก</a></li>
            <li class="breadcrumb-item active fs-5" aria-current="page">ภาพรวมตลาด <?php echo $row['mkr_name']; ?></li>
        </ol>
    </nav>

    <h1>ภาพรวมตลาด <?php echo $row['mkr_name']; ?></h1>
    <div class="border rounded shadow-sm mt-4 p-3 box">
        <img src="../<?php echo $row['mkr_pic'] ?>" class="rounded" alt="">
        <div class="ms-2">
            <div class="d-flex justify-content-between ">
                <h4 class="mt-2 mb-0"><?php echo $row['mkr_name']; ?></h4>
                <a href="edit-market-info.php?mkr_id=<?php echo $row['mkr_id'] ?>" type="button" class="btn btn-primary " style="height: fit-content;"><i class="bx bxs-edit-alt"></i> แก้ไขข้อมูลตลาด</a>
            </div>
            <hr class="my-2">
            <div class="box mt-4 pe-3">
                <div>
                    <p class="fs-5 mb-0">
                    <div class="fw-bold">ประเภทตลาด</div> <?php echo $row['market_type']; ?>
                    </p>
                    <p class="fs-5 mb-0">
                    <div class="fw-bold">เบอร์โทรศัพท์</div> <?php echo $row['tel']; ?>
                    </p>
                    <p class="fs-5 mb-0">
                    <div class="fw-bold">อีเมล</div>
                    <a href="mailto:<?php echo $row['email'] ?>">
                        <?php echo $row['email']; ?>
                    </a>
                    </p>

                    <p class="fs-5 mb-0">
                    <div class="fw-bold">วันเปิดทำการ</div>
                    <?php echo $row['opening']; ?>
                    </p>

                </div>
                <div>
                    <p class="fs-5 mb-0">
                    <div class="fw-bold">รายละเอียดโดยสังเขป</div> <?php echo $row['mkr_descrip']; ?>
                    </p>
                    <p class="fs-5 mb-0">
                    <div class="fw-bold">สถานที่ตั้ง</div> <?php echo $row['house_no']; ?> ซอย <?php echo $row['soi']; ?> หมู่ <?php echo $row['moo']; ?> ถนน <?php echo $row['road']; ?> ตำบล/แขวง <?php echo $row['district_name']; ?> อำเภอ/เขต <?php echo $row['amphure_name']; ?> จังหวัด <?php echo $row['province_name']; ?> รหัสไปรษณีย์ <?php echo $row['postalcode']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php echo $opening_period ?>

    <div class="box-3">
        <div class="border rounded shadow-sm mt-3 p-3 ">
            <h4 class="center">จำนวนคำร้องเรียนทั้งหมด</h4>
            <h1>
                <?php
                $queryz = "SELECT * FROM complain  WHERE (mkr_id = $mkr_id)";
                $rsz = mysqli_query($conn, $queryz);
                echo mysqli_num_rows($rsz);
                ?>
            </h1>
        </div>
        <div class="border rounded shadow-sm mt-3 p-3 ">
            <h4 class="center">คำร้องเรียนที่ยังไม่ได้ตอบกลับ</h4>
            <h1>
                <?php
                $queryz = "SELECT * FROM complain  WHERE (mkr_id = $mkr_id AND status = 1)";
                $rsz = mysqli_query($conn, $queryz);
                echo $countcomp = mysqli_num_rows($rsz);
                ?>
            </h1>
            <div class="text-end">
                <a href="complain.php?mkr_id=<?php echo $row['mkr_id'] ?>" type="button" class="btn btn-primary " style="height: fit-content;"><i class='bx bxs-send'></i> ตอบกลับ</a>
            </div>
        </div>
        <div class="border rounded shadow-sm mt-3 p-3 ">
            <h4 class="center">3 อันดับหัวข้อที่มีการร้องเรียนที่มากที่สุด</h4>
            <ul class="list-group list-group-flush">
                <?php
                $queryz = "SELECT toppic.toppic , COUNT(complain.comp_id) AS countZ  FROM complain JOIN toppic ON (complain.toppic_id = toppic.toppic_id) WHERE (mkr_id = $mkr_id) GROUP BY complain.toppic_id ORDER BY countZ DESC LIMIT 3";
                $rsz = mysqli_query($conn, $queryz);
                $count_n = 1;
                foreach ($rsz as $rs_c) {
                    echo ' <li class="list-group-item">
                    <div class=" row text-decoration-none">
                    <div class="col-2 ps-0">
                    ' . $count_n . '.
                    </div>
                    <div class="col-6">
                    ' . $rs_c['toppic'] . '
                    </div>
                    <div class="col-4 text-end pe-0">
                    จำนวน ' . $rs_c['countZ'] . ' ครั้ง
                    </div>
                    </ก>
                </li>';
                }
                $count_n++;
                ?>
            </ul>
        </div>
    </div>
    <div class="box-2-1">
        <div class="border rounded shadow-sm p-3 mt-3">
            <h3 class="center">จำนวนของแผงค้าในแต่ละประเภท</h3>
            <div class="chartcanvas center mt-5 ms-5" id="piechart"></div>
            <div class="text-end">
                <a href="edit-Stall.php?mkr_id=<?php echo $row['mkr_id'] ?>" type="button" class="btn btn-primary " style="height: fit-content;"><i class="bx bxs-edit-alt"></i> แก้ไขข้อมูลแผงค้า</a>
            </div>
        </div>
        <div class="border rounded shadow-sm p-3 mt-3">
            <h3 class="center">ยอดการจองแผงค้าในแต่ละเดือน</h3>
            <div class="chartcanvas" id="chart_div"> </div>
            <div class="text-end">
                <a href="booking.php?mkr_id=<?php echo $row['mkr_id'] ?>" type="button" class="btn btn-primary " style="height: fit-content;"><i class="bx bxs-edit-alt"></i> จัดการการจอง</a>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="border rounded shadow-sm p-3 mt-3">
            <h4 class="center">3 อันดับประเภทแผงค้าที่ถูกจองมากที่สุด</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class=" row text-decoration-none">
                        <div class="col-2 ps-0">
                            1.
                        </div>
                        <div class="col-6">
                            ประเภทเนื้อสัตว์
                        </div>
                        <div class="col-4 text-end pe-0">
                            จำนวน 5 ครั้ง
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class=" row text-decoration-none">
                        <div class="col-2 ps-0">
                            2.
                        </div>
                        <div class="col-6">
                            ประเภทเนื้อสัตว์
                        </div>
                        <div class="col-4 text-end pe-0">
                            จำนวน 5 ครั้ง
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class=" row text-decoration-none">
                        <div class="col-2 ps-0">
                            3.
                        </div>
                        <div class="col-6">
                            ประเภทเนื้อสัตว์
                        </div>
                        <div class="col-4 text-end pe-0">
                            จำนวน 5 ครั้ง
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="border rounded shadow-sm p-3 mt-3">
            <h4 class="center">3 อันดับผู้ใช้งานที่มีการจองมากที่สุด</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class=" row text-decoration-none">
                        <div class="col-2 ps-0">
                            1.
                        </div>
                        <div class="col-6">
                            สหัสทยา เทียนมงคล
                        </div>
                        <div class="col-4 text-end pe-0">
                            จำนวน 5 ครั้ง
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class=" row text-decoration-none">
                        <div class="col-2 ps-0">
                            2.
                        </div>
                        <div class="col-6">
                            สหัสทยา เทียนมงคล
                        </div>
                        <div class="col-4 text-end pe-0">
                            จำนวน 5 ครั้ง
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class=" row text-decoration-none">
                        <div class="col-2 ps-0">
                            3.
                        </div>
                        <div class="col-6">
                            สหัสทยา เทียนมงคล
                        </div>
                        <div class="col-4 text-end pe-0">
                            จำนวน 5 ครั้ง
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $("body").tooltip({
            selector: '[data-toggle=tooltip]',
            placement: 'right'
        });
    });

    // datepicker
    mobiscroll.setOptions({
        locale: mobiscroll.localeTh,
        theme: 'ios',
        themeVariant: 'light'
    });

    var now = new Date();
    var colorset = [
        '#abdee6',
        '#cbaacb',
        '#ffffb5',
        '#ffccb6',
        '#f3b0c3',
        '#c6dbda',
        '#fee1e8',
        '#fed7c3',
        '#f6eac2',
        '#ecd5e3',
        'ff968a'
    ];


    mobiscroll.datepicker('#demo-colored', {
        controls: ['calendar'],
        display: 'inline',
        colors: [
            <?php
            $countcolor = 0;
            while ($q = $qrycalendar->fetch_assoc()) : ?> {
                    start: new Date(<?php
                                    $start = strtotime(str_replace('-', '/', $q['start']));
                                    echo date("Y,m,d", strtotime("-1 month", $start))
                                    ?>),
                    end: new Date(<?php
                                    $end = strtotime(str_replace('-', '/', $q['end']));
                                    echo date("Y,m,d", strtotime("-1 month", $end))
                                    ?>),
                    background: colorset[<?php echo $countcolor; ?>]


                },
            <?php
                $countcolor++;
                if ($countcolor > 10) {
                    $countcolor = 0;
                }
            endwhile ?>
        ]

    });
</script>

</html>