<?php


$sdt = $_GET['user'];



?>

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

      <header>
        <div>
            <img style="width: 100%;" src="../../../images/logo.png">
        </div>
      </header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li><a href="../Home.php?user=<?php echo $sdt?>">Home</a></li>
            <li><a href="../LichKham.php?user=<?php echo $sdt?>">Lịch khám</a></li>
            <li class="active"><a href="../LichTiem.php?user=<?php echo $sdt?>">Lịch tiêm</a></li>
            <li><a href="../ThongTinCaNhan/viewThongTin.php?user=<?php echo $sdt?>">Thông tin cá nhân</a></li>
            <li>
            <a style="text-align: right; background-color: rgb(48, 85, 219);color: white;margin-left: 1350px;" onclick="return confirm('Bạn có muốn đăng xuất không?')" href="../html/dangnhap.html"  >Đăng xuất</a>
            </li>
          </ul>
        </div>
      </nav>

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li ><a href="viewLichTiem.php?user=<?php echo $sdt?>">Xem danh sách các lịch tiêm</a></li>
            <li class="active"><a href="searchLichTiem.php?user=<?php echo $sdt?>">Tìm kiếm lịch tiêm</a></li>
            <li><a href="viewCacLichTiemDaDangKy.php?user=<?php echo $sdt?>">Các lịch tiêm đã đăng ký</a></li>

          </ul>
        </div>
      </nav>
      <div class="container">
        <h1>Tìm kiếm lịch tiêm</h1>
        <form action="viewSearchLichTiem.php?user=<?php echo $sdt?>" method="post">
            <div class="form-group">
                <input type="text" placeholder="Nhập tên lịch tiêm, ngày tiêm, id vaccine" id ="key" class="form-control" name="key">
            </div>

            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <div class="container">
        <h1>Danh sách lịch tiêm</h1>       
            <table class="table table-striped">
                <thead class="thead-style">
                <tr>
                    <th>Nội dung tiêm</th>
                    <th>Ngày tiêm</th>
                    <th>ID vaccine</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
      
                <?php
                $key = $_POST['key'];
                require_once '../../connect.php';
                $search_sql="SELECT * FROM LichTiem WHERE 
                (noidungtiem LIKE '%$key%')
                OR (ngaytiem LIKE '%$key%')
                OR (idVaccine LIKE '%$key%')
                ";
                
                $result = mysqli_query($conn, $search_sql);
                
                while ($r = mysqli_fetch_assoc($result))
                {
                ?>
                        <tr>
                            <td><?php echo $r['noidungtiem'] ?></td>
                            <td><?php echo $r['ngaytiem'] ?></td>
                            <td><?php echo $r['idVaccine'] ?></td>
                            <td><a href="dangkyLichTiem.php?sid=<?php echo $r['idLichTiem']?>&user=<?php echo $sdt?>" class="btn btn-info">Đăng ký</a>
                        </tr>
                        <?php
                    }
                ?>

                </tbody>
            </table>


    </div>
    <style>
    .header{
        position: fixed;
    }
    .thead-style {
        background-color: black;
        color: white;
    }
    </style>

</body>
</html>
       