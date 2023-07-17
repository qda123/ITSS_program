<?php

$idThuoc = $_GET['sid'];

require_once '../connect.php';

$delete_sql = "DELETE FROM Thuoc WHERE idThuoc = $idThuoc";

if (mysqli_query($conn, $delete_sql))
{
    header("Location: viewThuocStaff.php");
};