<?php
include("../connect.php");

if (isset($_GET["masv"])) {
    $masv = $_GET["masv"];
    $sql = "SELECT * FROM SinhVien WHERE MaSV = '$masv'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chi tiết Sinh viên</title>
</head>
<body>
    <h2>CHI TIẾT SINH VIÊN</h2>
    <p><b>Mã SV:</b> <?php echo $row["MaSV"]; ?></p>
    <p><b>Họ Tên:</b> <?php echo $row["HoTen"]; ?></p>
    <p><b>Giới Tính:</b> <?php echo $row["GioiTinh"]; ?></p>
    <p><b>Ngày Sinh:</b> <?php echo $row["NgaySinh"]; ?></p>
    <p><b>Ảnh:</b><br> <img src="<?php echo $row["Hinh"]; ?>" width="120"></p>
    <p><b>Mã Ngành:</b> <?php echo $row["MaNganh"]; ?></p>
    <p><a href="index.php">← Quay lại danh sách</a></p>
</body>
</html>
