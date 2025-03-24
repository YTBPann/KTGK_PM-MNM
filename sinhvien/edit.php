<?php
include("../connect.php");

$thongbao = "";

// Lấy mã sinh viên từ URL
if (isset($_GET["masv"])) {
    $masv = $_GET["masv"];

    // Lấy thông tin sinh viên hiện tại
    $sql = "SELECT * FROM SinhVien WHERE MaSV = '$masv'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Xử lý khi submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten = $_POST["hoten"];
    $gioitinh = $_POST["gioitinh"];
    $ngaysinh = $_POST["ngaysinh"];
    $hinh = $_POST["hinh"];
    $manganh = $_POST["manganh"];

    $sql_update = "UPDATE SinhVien 
                   SET HoTen = N'$hoten', GioiTinh = N'$gioitinh', NgaySinh = '$ngaysinh', Hinh = '$hinh', MaNganh = '$manganh'
                   WHERE MaSV = '$masv'";

    if ($conn->query($sql_update) === TRUE) {
        $thongbao = "Cập nhật thành công!";
    } else {
        $thongbao = "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sửa Sinh viên</title>
</head>
<body>
    <h2>SỬA THÔNG TIN SINH VIÊN</h2>

    <form method="post">
        Mã SV: <b><?php echo $masv; ?></b><br><br>
        Họ tên: <input type="text" name="hoten" value="<?php echo $row['HoTen']; ?>"><br><br>
        Giới tính:
        <select name="gioitinh">
            <option value="Nam" <?php if ($row['GioiTinh'] == "Nam") echo "selected"; ?>>Nam</option>
            <option value="Nữ" <?php if ($row['GioiTinh'] == "Nữ") echo "selected"; ?>>Nữ</option>
        </select><br><br>
        Ngày sinh: <input type="date" name="ngaysinh" value="<?php echo $row['NgaySinh']; ?>"><br><br>
        Ảnh: <input type="text" name="hinh" value="<?php echo $row['Hinh']; ?>"><br><br>
        Mã ngành:
        <select name="manganh">
            <option value="CNTT" <?php if ($row['MaNganh'] == "CNTT") echo "selected"; ?>>CNTT</option>
            <option value="QTKD" <?php if ($row['MaNganh'] == "QTKD") echo "selected"; ?>>QTKD</option>
        </select><br><br>

        <input type="submit" value="Cập nhật">
    </form>

    <p style="color:green;"><?php echo $thongbao; ?></p>
</body>
</html>
