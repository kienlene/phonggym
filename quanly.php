<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
    <style>
        <style>
    /* Reset CSS */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Wrapper */
#khung {
    /* width: 1500px;
    height: 1000px; */
    font-family: Arial, sans-serif;
    border: 1px solid black;
}

.vung1 {
    width: 50%;
    height: 20%;
    float: left; 
    margin-top: 40px;
    padding: 20px;
    box-sizing: border-box;
}

.vung2 {
    width: 600px;
    height: 470px;
    margin-left:-20px;
    margin-top:10px;
}

.vung3 {
    width: 600px;
    height: 600px;
    margin-left:600px;
    margin-top: -650px;
}


/* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #1e88e5;
    color: #fff;
    padding: 15px;
}

#logo {
    width: 280px;
}

#logo img {
    height: 50px;
    border-radius: 50%;
}

.noidung {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    .noidung .user-info {
        display: flex;
        align-items: center;
    }

    .noidung .user-info img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-left: 15px;
    }

    .noidung .user-info span {
        font-size: 16px;
        font-weight: 500;
        color: #333;
    }

    .noidung .dropdown {
        position: relative;
    }

    .noidung .dropdown-toggle {
        cursor: pointer;
        font-size: 18px; /* Font size for the text */
        font-weight: bold; /* Make the text bold */
        color: white; /* Đặt màu chữ thành trắng */
        font-weight: 500;
        transition: color 0.3s;
    }

    .noidung .dropdown-toggle:hover {
        color: #f0f0f0; /* Thêm hiệu ứng hover nếu muốn */
    }

    .noidung .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        right: 0;
        min-width: 150px;
        z-index: 1;
        border-radius: 4px;
    }

    .noidung .dropdown-content a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #333;
        font-size: 14px;
        transition: background-color 0.3s, color 0.3s;
        border-bottom: 1px solid #f0f0f0;
    }

    .noidung .dropdown-content a:last-child {
        border-bottom: none;
    }

    .noidung .dropdown-content a:hover {
        background-color: #f1f1f1;
        color: #007BFF;
    }

    .noidung .dropdown:hover .dropdown-content {
        display: block;
    }

#avt img {
    height: 40px;
    border-radius: 50%;
    margin-left: 20px;
}

/* Section */
section {
    display: flex;
    height: 700px ;
    border-bottom: 1px solid #ddd;
}

/* Article 1 */
#a1 {
    width: 20%;
    background-color: #f1f1f1;
    padding: 20px;
    border-right: 1px solid #ddd;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

#a1 a {
    display: block;
    color: #333;
    text-decoration: none;
    font-size: 16px;
    padding: 10px 0;
    transition: color 0.3s ease;
}

#a1 a:hover {
    color: #007bff;
}

#a1 a:not(:last-child) {
    border-bottom: 1px solid #ddd;
}

/* Article 2 */
#a2 {
    width: 80%;
    padding: 10px;
    background-color: #fff;
    height: 660px;
}

#a3 {
    width: 100%;
    padding: 10px;
    background-color: #fff;
    height: 470px;
    overflow: auto;
}

/* Footer */
/* Footer */
footer {
                background-color: #333;
                color: white;
                padding: 40px 50px;
            }

            .footer-content {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap; /* Allow wrapping for smaller screens */
            }

            .footer-section {
                flex: 1; /* Allow sections to grow */
                min-width: 250px; /* Minimum width for responsiveness */
                margin-right: 20px; /* Space between sections */
            }

            .footer-section h4 {
                margin-bottom: 15px;
                font-size: 18px;
                border-bottom: 1px solid #ffffff; /* Underline effect */
                padding-bottom: 5px;
            }

            .footer-section p {
                margin: 5px 0;
            }

            .footer-section a {
                color: #ffffff;
                text-decoration: none;
            }

            .footer-section a:hover {
                text-decoration: underline; /* Underline on hover */
            }

            .footer-bottom {
                text-align: center;
                margin-top: 20px;
                font-size: 14px;
            }

            input[type="email"] {
                padding: 10px;
                margin-top: 10px;
                border: none;
                border-radius: 5px;
            }

            button {
                padding: 10px 15px;
                margin-top: 10px;
                border: none;
                border-radius: 5px;
                background-color: #007bff; /* Button color */
                color: white;
                cursor: pointer;
            }

            button:hover {
                background-color: #0056b3; /* Darker on hover */
            }

            .social-media a {
                margin-right: 15px;
                color: #ffffff;
            }
#a2 {
  width: 80%;
  padding: 20px;
  background-color: #fff;
}

.student-info {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.avatar img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-right: 20px;
}

.info p {
  margin-bottom: 5px;
}

.study-info {
  display: flex;
  justify-content: space-between;
}

.study-info .left-col,
.study-info .right-col {
  width: 48%;
  background-color: #f1f1f1;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

#logo {
    display: flex; /* Use flexbox for layout */
    align-items: center; /* Center items vertically */
    
    padding: 2px 4px; /* Padding around the logo */
    border-radius: 5px; /* Rounded corners */
    
}

#logo img {
    width: 60px; /* Set logo width */
    height: auto; /* Maintain aspect ratio */
    margin-right: 15px; /* Space between logo and text */
}

#logo p {
    margin: 0; /* Remove default margin */
}

#logo a {
    width: 100px;
    text-decoration: none; /* Remove underline */
    color: white; /* Primary color for the text */
    font-size: 24px; /* Font size for the text */
    font-weight: bold; /* Make the text bold */
    transition: color 0.3s; /* Smooth transition for hover effect */
}

#logo a:hover {
    color: red; /* Darker shade on hover */
}

#tieude{
    margin-left: -475px;
    width: 400px;
}
#revenueChart {
    
    width: 400px;       /* Đảm bảo chiều rộng sẽ tự động điều chỉnh */
         /* Đặt chiều cao cho biểu đồ */
    margin-bot:-20px;
}
#userCountChart{
     /* Đặt chiều rộng tối đa */
     width: 50%;  
         /* Đặt chiều cao cho biểu đồ */
    margin: 0 auto;    /* Căn giữa biểu đồ */
    float: left;
}

/* Container cho các box trong .vung1 */
.vung1 .chart-container {
    display: flex;
    justify-content: space-between;
    gap: 20px; /* Khoảng cách giữa các box */
    flex-wrap: wrap; /* Đảm bảo chúng có thể xuống dòng nếu không đủ không gian */
}

/* Cấu trúc mỗi box */
.vung1 .revenue-box {
    width: 40%; /* Đảm bảo 2 box trong 1 hàng */
    background-color: #f4f4f4;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    text-align: center;
}

/* Style cho tiêu đề trong các box */
.vung1 .revenue-box h3 {
    font-size: 16px;
    margin-bottom: 10px;
    color: #333;
}

/* Style cho nội dung trong các box */
.vung1 .revenue-box p {
    font-size: 18px;
    color: #007BFF;
    font-weight: bold;
}

    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>
<?php
    include_once("controller/getdangnhap.php");
    $p = new GetDangNhap();
    $con = $p->Lay1NV($_SESSION["manv"]);
    if($con)
        $r = $con->fetch_assoc();
?>

<body>
    <div id="khung">
        <header>
            <div id="logo">
                <a href="quanly.php"><img src="../GYM/image/logo.jpg" alt=""></a>
                <p><a href="quanly.php">GYM CR7</a></p>
            </div>
            <h1 id="tieude">
                <?php
                    if(isset($_REQUEST['dsnv'])) {
                        echo "Danh sách nhân viên";
                    }elseif (isset($_REQUEST["dstb"])) {
                        echo "Danh sách thiết bị";
                    }elseif (isset($_REQUEST["dsgt"])) {
                        echo "Danh sách Gói Tập";
                    }elseif (isset($_REQUEST["dsph"])) {
                        echo "Danh sách Phản Hồi";
                    }else {
                        echo "Trang Quản lý";
                    }
                ?>
            </h1>
            
            <div class="noidung">
                <div class="dropdown">
                    <span class="dropdown-toggle"><?php echo $r["TenNV"]?></span>
                    <div class="dropdown-content">
                        <a href="quanly.php?capnhattt">Cập nhật thông tin</a>
                        <a href="quanly.php?xemtt">Xem thông tin cá nhân</a>
                        <a href="quanly.php?doimk">Đổi mật khẩu</a>
                    </div>
                </div>
                <div class="user-info">
                    <img src="../GYM/image/avtnv/<?php echo $r['HinhAnhNV']; ?>" alt="User Avatar">
                </div>
            </div>

        </header>

        <section>
            <article id="a1">
                <a href="?dsnv">Quản lý nhân viên</a><br>
                <a href="?dstb">Quản lý thiết bị</a><br>
                <a href="?dsgt">Quản lý gói tập</a><br>
                <a href="?dsph">Quản lý phản hồi</a><br>
                <a href="nhanvien.php?dangxuat">Đăng xuất</a>
            </article>

            
            <article id="a2">
            <?php
                if(isset($_REQUEST["snv"])){
                    include_once("view/sua/suanhanvien.php");
                }elseif (isset($_REQUEST["stb"])){
                    include_once("view/sua/suathietbi.php");
                }elseif (isset($_REQUEST["sgt"])){
                    include_once("view/sua/suagoitap.php");
                }else if(isset($_REQUEST["themtb"])){
                    include_once("view/them/themthietbi.php");
                }else if(isset($_REQUEST["themnv"])){
                    include_once("view/them/themnhanvien.php");
                }else if(isset($_REQUEST["themgt"])){
                    include_once("view/them/themgoitap.php");
                }elseif (isset($_REQUEST["xoatb"])){
                    include_once("view/xoa/xoathietbi.php");
                }elseif (isset($_REQUEST["xoanv"])){
                    include_once("view/xoa/xoanhanvien.php");
                }elseif (isset($_REQUEST["xoagt"])){
                    include_once("view/xoa/xoagoitap.php");
                }elseif (isset($_REQUEST["xoaph"])){
                    include_once("view/xoa/xoaphanhoi.php");
                }elseif (isset($_REQUEST["kpnv"])){
                    include_once("view/khoiphuc/khoiphucnhanvien.php");
                }elseif (isset($_REQUEST["kptb"])){
                    include_once("view/khoiphuc/khoiphucthietbi.php");
                }elseif (isset($_REQUEST["kpgt"])){
                    include_once("view/khoiphuc/khoiphucgoitap.php");
                }elseif (isset($_REQUEST["kpph"])){
                    include_once("view/khoiphuc/khoiphucphanhoi.php");
                }elseif (isset($_REQUEST["dsnv"])){
                    include_once("view/nhanvien/table.php");
                }elseif (isset($_REQUEST["dstb"])){
                    include_once("view/thietbi/table.php");
                }elseif(isset($_REQUEST["dstbsua"])){
                    include_once("view/duyet_phieu_choql/index.php");
                }elseif (isset($_REQUEST["dsgt"])){
                    include_once("view/goitap/table.php");
                }elseif (isset($_REQUEST["dsph"])){
                    include_once("view/phanhoiql/table.php");
                }elseif (isset($_REQUEST["dsxoanv"])){
                    include_once("view/nhanvien/tablexoa.php");
                }elseif (isset($_REQUEST["dsxoatb"])){
                    include_once("view/thietbi/tablexoa.php");
                }elseif (isset($_REQUEST["dsxoagt"])){
                    include_once("view/goitap/tablexoa.php");
                }elseif (isset($_REQUEST["dsxoaph"])){
                    include_once("view/phanhoiql/tablexoa.php");
                }elseif (isset($_REQUEST["xemtt"])){
                    include_once("view/nhanvien/ctql.php");
                }elseif (isset($_REQUEST["capnhattt"])){
                    include_once("view/sua/suathongtinquanly.php");
                }elseif(isset($_REQUEST["doimk"])){
                    include_once("view/doimatkhauNV.php");
                }
                else {
                    include_once("controller/cketoan.php");
                    $p = new Cketoan();

                    // Bộ lọc thời gian
                    $start_date = $_GET['start_date'] ?? null;
                    $end_date = $_GET['end_date'] ?? null;

                    if ($start_date && $end_date) {
                        $con = $p->loctheothoigian($start_date, $end_date);
                    } else {
                        $limit = 1000;
                        $offset = 0;
                        $con = $p->selectdanhsachhoadon($limit, $offset);
                    }

                    // Tính toán doanh thu theo gói tập
                    $doanhThu = [];
                    foreach ($con as $hd) {
                        $goiTap = $hd['TenGT'];
                        $tongTien = $hd['TongTien'];

                        if (!isset($doanhThu[$goiTap])) {
                            $doanhThu[$goiTap] = 0;
                        }
                        $doanhThu[$goiTap] += $tongTien;
                    }
                

                    // Dữ liệu cho biểu đồ doanh thu
                    $chartLabels = json_encode(array_keys($doanhThu));
                    $chartData = json_encode(array_values($doanhThu));

                    // Tính toán số lượng người theo gói tập
                    $soLuongNguoi = [];
                    foreach ($con as $hd) {
                        $goiTap = $hd['TenGT'];

                        if (!isset($soLuongNguoi[$goiTap])) {
                            $soLuongNguoi[$goiTap] = 0;
                        }
                        $soLuongNguoi[$goiTap]++;
                    }

                    // Dữ liệu cho biểu đồ số lượng người
                    $barChartLabels = json_encode(array_keys($soLuongNguoi));
                    $barChartData = json_encode(array_values($soLuongNguoi));
                ?>
                
                <form method="GET" id="timeFilter">
                    <label for="start_date">Từ ngày:</label>
                    <input type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>">
                    
                    <label for="end_date">Đến ngày:</label>
                    <input type="date" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
                    
                    <button type="submit">Lọc</button>
                    <button type="button" onclick="resetForm()">Hủy</button> <!-- Nút Hủy gọi hàm resetForm() -->
                </form>

                <script>
                    // Hàm resetForm được gọi khi nhấn nút Hủy
                    function resetForm() {
                        // Reset các giá trị trong các input fields về mặc định nếu có giá trị mặc định
                        document.getElementById("start_date").value = "<?php echo isset($start_date) ? $start_date : ''; ?>";
                        document.getElementById("end_date").value = "<?php echo isset($end_date) ? $end_date : ''; ?>";
                    }
                </script>


                <div class="vung1">

                <div class="chart-container">

                    <?php
                        $tongDoanhThu = array_sum($doanhThu);
                        $tongSoLuongNguoi = array_sum($soLuongNguoi); // Tính tổng số lượng người
                    ?>

                    <!-- Hiển thị tổng doanh thu trong box -->
                    <div class="revenue-box">
                        <h3>Tổng Doanh Thu</h3>
                        <p>
                            <?php echo number_format($tongDoanhThu, 0, ',', '.'); ?> VND
                        </p>
                    </div>

                    <!-- Hiển thị tổng số lượng người trong box -->
                    <div class="revenue-box">
                        <h3>Tổng Số Lượng Người</h3>
                        <p>
                            <?php echo number_format($tongSoLuongNguoi, 0, ',', '.'); ?> người
                        </p>
                    </div>

                </div>
                <div class="vung2">

                <canvas id="userCountChart" style="height:200px"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const ctxBar = document.getElementById('userCountChart').getContext('2d');
                            const barLabels = <?php echo $barChartLabels; ?>;
                            const barData = <?php echo $barChartData; ?>;

                            new Chart(ctxBar, {
                                type: 'bar',
                                data: {
                                    labels: barLabels,
                                    datasets: [{
                                        label: 'Số lượng người',
                                        data: barData,
                                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: { display: false },
                                        title: { display: true, text: 'Số lượng người đăng ký từng gói tập' }
                                    },
                                    scales: {
                                        y: { beginAtZero: true }
                                    }
                                }
                            });
                        });
                    </script>

                </div>
                <div class="vung3">
                    
                <canvas id="revenueChart" style="width:200px"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const ctxPie = document.getElementById('revenueChart').getContext('2d');
                            const pieLabels = <?php echo $chartLabels; ?>;
                            const pieData = <?php echo $chartData; ?>;

                            new Chart(ctxPie, {
                                type: 'pie',
                                data: {
                                    labels: pieLabels,
                                    datasets: [{
                                        label: 'Doanh thu (VND)',
                                        data: pieData,
                                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
                                    }]
                                },
                                options: {
                                    plugins: {
                                        title: { display: true, text: 'Doanh thu các gói tập' }
                                    }
                                }
                            });
                        });
                    </script>

                </div>
            </article>
            <?php
                }
            ?>

        </section>
        <footer>
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Công ty</h4>
                    <p>Công ty Cổ phần Lifestyle Việt Nam</p>
                    <p>Địa chỉ: 51 Đội Quyết, Xuân Diệu, Tây Hồ, Hà Nội</p>
                    <p>Mã số thuế: 10000901</p>
                    <p>Email: <a href="mailto:info@lifefitness.com.vn">info@lifefitness.com.vn</a></p>
                </div>
                <div class="footer-section">
                    <h4>Liên kết nhanh</h4>
                    <p><a href="#">Điều khoản & điều kiện</a></p>
                    <p><a href="#">Quy định bảo mật</a></p>
                    <p><a href="#">Tin tức</a></p>
                    <p><a href="#">Liên hệ</a></p>
                    <p><a href="#">Dịch vụ</a></p>
                </div>
                <div class="footer-section">
                    <h4>Liên hệ chúng tôi</h4>
                    <p>Đăng ký nhận bản tin:</p>
                    <input type="email" placeholder="Nhập email của bạn" />
                    <button>Đăng ký</button>
                    <p>Follow us:</p>
                    <div class="social-media">
                        <a href="#">Facebook</a>
                        <a href="#">Instagram</a>
                        <a href="#">YouTube</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Công ty Cổ phần Lifestyle Việt Nam. Bảo lưu mọi quyền.</p>
            </div>
        </footer>
    </div>
</body>
</html>
