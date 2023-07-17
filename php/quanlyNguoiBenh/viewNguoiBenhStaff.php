<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name ="viewport" content="width= device-width,initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      
    </head>
<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li ><a href="../../html/staff/Home.html">Home</a></li>
            <li class="active"><a href="../../html/staff/quanlyNguoiBenh.html">Quản lý người bệnh</a></li>
            <li><a href="../../html/staff/quanlyLichKham.html">Quản lý lịch khám</a></li>
            <li><a href="../../html/staff/quanlyLichTiem.html">Quản lý lịch tiêm</a></li>
            <li><a href="../../html/staff/quanlyThuoc.html">Quản lý thuốc</a></li>
            <li><a href="../../html/staff/quanlyVaccine.html">Quản lý vaccine</a></li>
            <li>
            <a style="text-align: right; background-color: rgb(48, 85, 219);color: white;margin-left: 1350px;" onclick="return confirm('Bạn có muốn đăng xuất không?')" href="../html/dangnhap.html"  >Đăng xuất</a>
            </li>
          </ul>
        </div>
      </nav>
    
      
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <ul class="nav navbar-nav">

            <li class="active"><a href="../../html/staff/quanLyNguoiBenh/addNguoiBenh.html">Thêm người bệnh</a></li>
            <li><a href="viewNguoiBenhStaff.php">Xem danh sách người bệnh </a></li>
            <li><a href="../../html/staff/quanLyNguoiBenh/searchNguoiBenh.html">Tìm kiếm người bệnh</a></li>
            <li><a href="viewDangKyLichKhamStaff.php">Duyệt đăng ký lịch khám</a></li>
            <li><a href="viewDangKyLichTiemStaff.php">Duyệt đăng ký lịch tiêm</a></li>

          </ul>
        </div>
      </nav>

      <div class="container">
        <h1>Danh sách người bệnh </h1>       
            <table class="table table-striped">
                <thead class="thead-style">
                <tr>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Cân nặng</th>
                    <th>Chiều cao</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
      
                <?php

                    //ket noi csdl
                    require_once '../connect.php';


                    $view_sql="SELECT * FROM NguoiBenh";

                    $result = mysqli_query($conn, $view_sql);

                    while ($r = mysqli_fetch_assoc($result))
                    {
                        ?>

                        <tr>
                            <td><?php echo $r['hoten'] ?></td>
                            <td><?php echo $r['sdt'] ?></td>
                            <td><?php echo $r['gioitinh'] ?></td>
                            <td><?php echo $r['ngaysinh'] ?></td>
                            <td><?php echo $r['diachi'] ?></td>
                            <td><?php echo $r['cannang'] ?></td>
                            <td><?php echo $r['chieucao'] ?></td>
                            <td><a href="editNguoiBenhStaff.php?sid=<?php echo $r['idNguoiBenh'] ?>" class="btn btn-info">Sửa</a>
                             <a onclick="return confirm('Bạn có muốn xóa người bệnh này không?')" href="deleteNguoiBenhStaff.php?sid=<?php echo $r['idNguoiBenh'] ?>" class="btn btn-danger">Xóa</a></td>
                        </tr>
                        <?php
                    }
                ?>

                </tbody>
            </table>


    </div>
    <style>
    .thead-style {
        background-color: black;
        color: white;
    }
    </style>

</body>
</html>
