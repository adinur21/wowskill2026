<?php
include('config.php');
if(isset($_GET['id']) && $conn) {
    $id = $_GET['id'];
    pg_query($conn, "DELETE FROM inventory WHERE id = $id");
}
header("Location: index.php");
?>
