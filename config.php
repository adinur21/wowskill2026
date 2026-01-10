<?php
$host = 'db-cluster-endpoint.cluster-xyz.us-east-1.rds.amazonaws.com';
$db   = 'lksdb';
$user = 'lksadmin';
$pass = 'LksPassword123!';
$port = '3306';

$dsn = "host=$host port=$port dbname=$db user=$user password=$pass";

try {
    $conn = mysqli($dsn);
    if (!$conn) {
        throw new Exception("Koneksi Gagal.");
    }
} catch (Exception $e) {
    echo "<div style='color:red; background:#ffdddd; padding:10px;'>Status: Belum Terhubung ke Database RDS</div>";
}
?>
