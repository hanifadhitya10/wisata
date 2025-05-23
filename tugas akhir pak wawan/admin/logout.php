<?php
session_start();
session_destroy(); // Menghapus semua data session
header("Location: ../index.php"); // Arahkan ke halaman login
exit;
?>
