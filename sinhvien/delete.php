<?php
include("../connect.php");

if (isset($_GET["masv"])) {
    $masv = $_GET["masv"];

    // Thực hiện lệnh xóa
    $sql = "DELETE FROM SinhVien WHERE MaSV = '$masv'";

    if ($conn->query($sql) === TRUE) {
        // Quay lại danh sách sau khi xóa
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    echo "Không có mã sinh viên để xóa.";
}
?>
