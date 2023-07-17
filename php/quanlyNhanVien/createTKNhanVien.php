


<?php
//nhan du lieu tu form
$hoten = $_POST['hoten'];
$sdt = $_POST['sdt'];
$gioitinh = $_POST['gioitinh'];
$ngaysinh = $_POST['ngaysinh'];
$diachi = $_POST['diachi'];
$vitri = $_POST['vitri'];
$matkhau = $_POST['matkhau'];

//ket noi csdl
require_once '../connect.php';


if (!$hoten || !$diachi || !$sdt || !$vitri || !$gioitinh || !$ngaysinh || !$matkhau)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    if (!preg_match("/^[0-9]{10}$/", $sdt)) {
        echo "Số điện thoại không hợp lệ. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }


$search_sql = "SELECT * FROM NhanVien WHERE 
(sdt = '$sdt')
";


$result = mysqli_query($conn, $search_sql);
$q=0;


while ($r = mysqli_fetch_assoc($result))
{
    $key = $r['sdt'] ;
    if  ($sdt == $key)
    {
        $q++;
    }


};

if($q == 0)
{
    $addsql = "INSERT INTO NhanVien
    (hoten, sdt, gioitinh, ngaysinh, diachi, vitri, matkhau) VALUES ('$hoten','$sdt','$gioitinh','$ngaysinh','$diachi','$vitri','$matkhau')";
    //thuc thi cau lenh them
    if(mysqli_query($conn, $addsql)){
        
        echo "<h1>Tạo tài khoản thành công</h1>";

    };
}

else
{
    // $upsql = "UPDATE nhanvien SET matkhau = '$matkhau' WHERE sdt = $sdt";
    // if( mysqli_query($conn, $upsql)){
    
    //     echo "<h1>Tạo tài khoản thành công</h1>";
    
    // };

    echo "<h1>Số điện thoại đã tồn tại trong hệ thống</h1>";
}



 
    ?>


