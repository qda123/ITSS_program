<?php
//nhan du lieu tu form

$tenthuoc = $_POST['tenthuoc'];
$soluong= $_POST['soluong'];
$ngaynhap= $_POST['ngaynhap'];

//ket noi csdl
require_once '../connect.php';

if (!$tenthuoc || !$soluong || !$ngaynhap)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    $search = "SELECT * FROM Thuoc WHERE (ngaynhap = '$ngaynhap') ";

    $query = mysqli_query($conn, $search);
    $q=0;
    while ($r0 = mysqli_fetch_assoc($query))
    {
        if($r0['tenthuoc'] != $tenthuoc)
        {
            $q = 1;
        }
        
    };
    if($q == 1)
    {
        echo "Tên thuốc đã tồn tại <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
$addsql = "INSERT INTO Thuoc
(tenthuoc,soluong,ngaynhap) VALUES ('$tenthuoc','$soluong',$ngaynhap)";



//thuc thi cau lenh them
if(mysqli_query($conn, $addsql)){
    
    //header("Location: viewPhongTap.php");
    echo "<h1>Thêm thành công</h1>";

};



?>