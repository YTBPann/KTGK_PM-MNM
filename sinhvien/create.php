<?php
include("../connect.php");

$thongbao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masv = $_POST["masv"];
    $hoten = $_POST["hoten"];
    $gioitinh = $_POST["gioitinh"];
    $ngaysinh = $_POST["ngaysinh"];
    $hinh = $_POST["hinh"];
    $manganh = $_POST["manganh"];

    $sql_kt = "SELECT * FROM SinhVien WHERE MaSV = '$masv'";
    $kt = $conn->query($sql_kt);

    if ($kt->num_rows > 0) {
        $thongbao = "Mã sinh viên đã tồn tại!";
    } else {
        $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                VALUES ('$masv', N'$hoten', N'$gioitinh', '$ngaysinh', '$hinh', '$manganh')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            $thongbao = "Lỗi: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh viên</title>
</head>
<body>
    <h2>THÊM SINH VIÊN</h2>

    <form method="post">
        Mã SV: <input type="text" name="masv" required><br><br>
        Họ tên: <input type="text" name="hoten" required><br><br>
        Giới tính: 
        <select name="gioitinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br><br>
        Ngày sinh: <input type="date" name="ngaysinh"><br><br>
        Link ảnh: <input type="text" name="hinh" placeholder="/Content/images/sv1.jpg"><br><br>
        Mã ngành:
        <select name="manganh">
            <option value="CNTT">CNTT</option>
            <option value="QTKD">QTKD</option>
        </select><br><br>

        <input type="submit" value="Thêm sinh viên">
        <a href="index.php">← Quay lại danh sách</a>
    </form>

    <p style="color:red;"><?php echo $thongbao; ?></p>
</body>
</html>
