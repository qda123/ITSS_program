<?php
//nhan du lieu tu form

$tenvaccine = $_POST['tenvaccine'];
$soluong= $_POST['soluong'];
$ngaynhap= $_POST['ngaynhap'];

//ket noi csdl
require_once '../connect.php';

if (!$tenvaccine || !$soluong || !$ngaynhap)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    $search = "SELECT * FROM Vaccine WHERE (ngaynhap = '$ngaynhap') ";

    $query = mysqli_query($conn, $search);
    $q=0;
    while ($r0 = mysqli_fetch_assoc($query))
    {
        if($r0['tenvaccine'] != $tenvaccine)
        {
            $q = 1;
        }
        
    };
    if($q == 1)
    {
        echo "Tên vaccine đã tồn tại <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
$addsql = "INSERT INTO Vaccine
(tenvaccine,soluong,ngaynhap) VALUES ('$tenvaccine','$soluong',$ngaynhap)";



//thuc thi cau lenh them
if(mysqli_query($conn, $addsql)){
    
    //header("Location: viewPhongTap.php");
    echo "<h1>Thêm thành công</h1>";

};



?>