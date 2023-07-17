
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
            <li class="active"><a href="../../html/admin/quanlyNhanVien.html">Quản lý nhân viên</a></li>
            <li><a href="../../html/admin/quanlyNguoiBenh.html">Quản lý người bệnh</a></li>
            <li><a href="../../html/admin/quanlyLichKham.html">Quản lý lịch khám</a></li>
            <li><a href="../../html/admin/quanlyLichTiem.html">Quản lý lịch tiêm</a></li>
            <li><a href="../../html/admin/quanlyThuoc.html">Quản lý thuốc</a></li>
            <li><a href="../../html/admin/quanlyVaccine.html">Quản lý vaccine</a></li>
            <li>
            <a style="text-align: right; background-color: rgb(48, 85, 219);color: white;margin-left: 1350px;" onclick="return confirm('Bạn có muốn đăng xuất không?')" href="../html/dangnhap.html"  >Đăng xuất</a>
            </li>
          </ul>
        </div>
      </nav>
    
      
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li><a href="../../html/admin/quanLyNhanVien/createTKNhanVien.html">Tạo tài khoản nhân viên</a></li>
            <li><a href="../../html/admin/quanLyNhanVien/addNhanVien.html">Thêm nhân viên</a></li>
            <li><a href="viewNhanVien.php">Xem danh sách nhân viên</a></li>
            <li class="active"><a href="../../html/admin/quanLyNhanVien/searchNhanVien.html">Tìm kiếm nhân viên</a></li>

          </ul>
        </div>
      </nav>

            <div class="container">
            <h1>Tìm kiếm nhân viên</h1> 
            <form action="../../../php/quanLyNhanVien/searchNhanVien.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Nhập họ tên hoặc số điện thoại, giới tính, ngày sinh, địa chỉ, vị trí" id ="key" class="form-control" name="key">
                </div>

                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>      
                <table class="table table-striped">
                    <thead class="thead-style">
                        <tr>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>Vị trí</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //nhan du lieu tu form
                        $key = $_POST['key'];


                        //ket noi csdl
                        require_once '../connect.php';



                        $search_sql = "SELECT * FROM NhanVien WHERE 
                        (hoten LIKE '%$key%')
                        OR (sdt LIKE '%$key%')
                        OR (gioitinh LIKE '%$key%')
                        OR (ngaysinh LIKE '%$key%')
                        OR (diachi LIKE '%$key%')
                        OR (vitri LIKE '%$key%')
                        ";



                        $result = mysqli_query($conn, $search_sql);

                        while ($r = mysqli_fetch_assoc($result))
                        {
                        ?>
                            <tr>
                                <td><?php echo $r['hoten'] ?></td>
                                <td><?php echo $r['sdt'] ?></td>
                                <td><?php echo $r['gioitinh'] ?></td>
                                <td><?php echo $r['ngaysinh'] ?></td>
                                <td><?php echo $r['diachi'] ?></td>
                                <td><?php echo $r['vitri'] ?></td>
                                <td><a href="editNhanVien.php?sid=<?php echo $r['idNhanVien'] ?>" class="btn btn-info">Sửa</a>
                                <a onclick="return confirm('Bạn có muốn xóa nhân viên này không?')" href="deleteNhanVien.php?sid=<?php echo $r['idNhanVien'] ?>" class="btn btn-danger">Xóa</a></td>
                            </tr>
                        <?php
                    }
                ?>

                </tbody>
            </table>

</body>
</html>