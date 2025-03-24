<?php
include("../connect.php");

$sql = "SELECT * FROM SinhVien";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách Sinh viên</title>
    <style>
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid gray;
            padding: 8px;
            text-align: center;
        }
        h2 {
            text-align: center;
        }
        a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>
    <h2>DANH SÁCH SINH VIÊN</h2>
    <table>
        <tr>
            <th>Mã SV</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Hình</th>
            <th>Mã Ngành</th>
            <th>Hành động</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["MaSV"] . "</td>";
                echo "<td>" . $row["HoTen"] . "</td>";
                echo "<td>" . $row["GioiTinh"] . "</td>";
                echo "<td>" . $row["NgaySinh"] . "</td>";
                echo "<td><img src='" . $row["Hinh"] . "' width='60'></td>";
                echo "<td>" . $row["MaNganh"] . "</td>";
                echo "<td>
                    <a href='edit.php?masv=" . $row["MaSV"] . "'>Sửa</a> |
                    <a href='delete.php?masv=" . $row["MaSV"] . "' onclick=\"return confirm('Bạn có chắc muốn xóa?');\">Xóa</a> |
                    <a href='detail.php?masv=" . $row["MaSV"] . "'>Chi tiết</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không có sinh viên nào.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
