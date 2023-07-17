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
            <li ><a href="../../html/admin/Home.html">Home</a></li>
            <li><a href="../../html/admin/quanlyNhanVien.html">Quản lý nhân viên</a></li>
            <li><a href="../../html/admin/quanlyNguoiBenh.html">Quản lý người bệnh</a></li>
            <li><a href="../../html/admin/quanlyLichKham.html">Quản lý lịch khám</a></li>
            <li><a href="../../html/admin/quanlyLichTiem.html">Quản lý lịch tiêm</a></li>
            <li><a href="../../html/admin/quanlyThuoc.html">Quản lý thuốc</a></li>
            <li class="active"><a href="../../html/admin/quanlyVaccine.html">Quản lý vaccine</a></li>
            <li>
            <a style="text-align: right; background-color: rgb(48, 85, 219);color: white;margin-left: 1350px;" onclick="return confirm('Bạn có muốn đăng xuất không?')" href="../html/dangnhap.html"  >Đăng xuất</a>
            </li>
          </ul>
        </div>
      </nav>
    
      
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li><a href="../../html/admin/quanLyVaccine/addVaccine.html">Thêm vaccine</a></li>
            <li class="active"><a href="viewVaccine.php">Xem danh sách vaccine</a></li>
            <li><a href="../../html/admin/quanLyVaccine/searchVaccine.html">Tìm kiếm vaccine</a></li>

          </ul>
        </div>
      </nav>


      <div class="container">
        <h1>Danh sách vaccine</h1>       
            <table class="table table-striped">
                <thead class="thead-style">
                <tr>
                    <th>Tên vaccine</th>
                    <th>Số lượng vaccine</th>
                    <th>Ngày nhập</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
      
                <?php

                    //ket noi csdl
                    require_once '../connect.php';


                    $view_sql="SELECT * FROM Vaccine";

                    $result = mysqli_query($conn, $view_sql);

                    while ($r = mysqli_fetch_assoc($result))
                    {
                        ?>

                        <tr>
                            <td><?php echo $r['tenvaccine'] ?></td>
                            <td><?php echo $r['soluong'] ?></td>
                            <td><?php echo $r['ngaynhap'] ?></td>
                            <td><a href="editVaccine.php?sid=<?php echo $r['idVaccine'] ?>" class="btn btn-info">Sửa</a>
                             <a onclick="return confirm('Bạn có muốn xóa vaccine này không?')" href="deleteVaccine.php?sid=<?php echo $r['idVaccine'] ?>" class="btn btn-danger">Xóa</a></td>
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


