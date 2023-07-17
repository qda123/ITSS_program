<?php

$idVaccine = $_GET['sid'];

require_once '../connect.php';

$delete_sql = "DELETE FROM Vaccine WHERE idVaccine = $idVaccine";

if (mysqli_query($conn, $delete_sql))
{
    header("Location: viewVaccineStaff.php");
};