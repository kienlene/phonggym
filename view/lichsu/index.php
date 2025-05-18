<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2{
            font-size: 28px;
    font-weight: 700;
    background: linear-gradient(90deg, #007AFF, #00E0FF); /* Gradient xanh biển chuyên nghiệp */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
    letter-spacing: 1px;
        }
    </style>
</head>

<?php
    include_once("controller/c_dangnhap.php");
    $p = new GetDangNhap();
    $con = $p ->get_lichsu($_SESSION["matv"]);
    
?>
<body>
    <div id="lichsu">
    <h2>Lịch sử tập luyện</h2>
    <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày tập</th>
                        <th>Giờ vào</th>
                        <th>Giờ ra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        if($con){
                            while($r = $con -> fetch_assoc()){
                                echo '<tr>';
                                echo '<td>'.$i.'</td>';
                                echo '<td>'.$r["ngayVao"].'</td>';
                                echo '<td>'.$r["gioVao"].'</td>';
                                echo '<td>'.$r["gioRa"].'</td>';
                                echo '</tr>';
                                $i++;
                            }  
                        }
                        else{
                            echo "<script>alert('Không có lịch sử!');</script>";
                            echo '<script>window.location.href="thanhvien.php"</script>';
                        }
                    ?>
                </tbody>
            </table>
    </div>
</body>
</html>