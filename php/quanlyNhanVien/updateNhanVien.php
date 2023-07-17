<?php
//nhan du lieu tu form
$hoten = $_POST['hoten'];
$sdt = $_POST['sdt'];
$gioitinh = $_POST['gioitinh'];
$ngaysinh = $_POST['ngaysinh'];
$diachi = $_POST['diachi'];
$vitri = $_POST['vitri'];
$nvid = $_POST['sid'];

//ket noi csdl
require_once '../connect.php';



$update_sql = "UPDATE NhanVien SET hoten = '$hoten', sdt = '$sdt', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh', diachi = '$diachi',  vitri = '$vitri' WHERE idNhanVien = $nvid";



//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong
    header("Location: viewNhanVien.php");

};



?>