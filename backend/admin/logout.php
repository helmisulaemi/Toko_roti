<?php
@session_start();
session_destroy();
echo "<script>alert('Logout Telah Berhasil');document.location.href='../'</script>";
?>