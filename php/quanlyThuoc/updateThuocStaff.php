<?php
//nhan du lieu tu form
$tenthuoc = $_POST['tenthuoc'];
$soluong= $_POST['soluong'];
$ngaynhap= $_POST['ngaynhap'];
$idThuoc = $_POST['sid'];


//ket noi csdl
require_once '../connect.php';

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


$update_sql = "UPDATE Thuoc SET tenthuoc = '$tenthuoc', soluong = $soluong ,ngaynhap = '$ngaynhap' WHERE idThuoc = $idThuoc";



//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong
    header("Location: viewThuocStaff.php");

};



?>