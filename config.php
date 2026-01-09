<?php
$host = 'db-cluster-endpoint.cluster-xyz.us-east-1.rds.amazonaws.com';
$db   = 'lksdb';
$user = 'lksadmin';
$pass = 'LksPassword123!';
$port = '5432';

$dsn = "host=$host port=$port dbname=$db user=$user password=$pass";

try {
    $conn = pg_connect($dsn);
    if (!$conn) {
        throw new Exception("Koneksi Gagal.");
    }
} catch (Exception $e) {
    echo "<div style='color:red; background:#ffdddd; padding:10px;'>Status: Belum Terhubung ke Database RDS</div>";
}
?>
