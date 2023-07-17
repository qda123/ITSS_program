<?php
//nhan du lieu tu form
$hoten = $_POST['hoten'];
$sdt = $_POST['sdt'];
$gioitinh = $_POST['gioitinh'];
$ngaysinh = $_POST['ngaysinh'];
$diachi = $_POST['diachi'];
$vitri = $_POST['vitri'];

//ket noi csdl
require_once '../connect.php';

if (!$hoten || !$diachi || !$sdt || !$vitri || !$gioitinh || !$ngaysinh)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }


$addsql = "INSERT INTO NhanVien
(hoten, sdt, gioitinh, ngaysinh, diachi,vitri) VALUES ('$hoten','$sdt','$gioitinh','$ngaysinh','$diachi','$vitri')";



//thuc thi cau lenh them
if(mysqli_query($conn, $addsql)){
    
    header("Location: viewNhanVien.php");

};



?>