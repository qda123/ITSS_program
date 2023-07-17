<?php
//nhan du lieu tu form
$tenvaccine = $_POST['tenvaccine'];
$soluong= $_POST['soluong'];
$ngaynhap= $_POST['ngaynhap'];
$idVaccine = $_POST['sid'];


//ket noi csdl
require_once '../connect.php';

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


$update_sql = "UPDATE Vaccine SET tenvaccine = '$tenvaccine', soluong = $soluong ,ngaynhap = '$ngaynhap' WHERE idVaccine = $idVaccine";



//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong
    header("Location: viewVaccineStaff.php");

};



?>