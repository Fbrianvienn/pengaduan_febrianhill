<?php
session_start();
$status = $_POST['status'];
$tanggapan = $_POST['tanggapan']."[[admin : ".$_SESSION['nama']."]]";
$id_pengaduan = $_POST['id_pengaduan'];

include 'koneksi.php';
$query = mysqli_query($koneksi, "UPDATE pengaduan SET status = '$status', tanggapan = '$tanggapan' WHERE id_pengaduan = '$id_pengaduan'");
    if ($query) {
        ?>
        <script>
            alert("Tanggapan Sudah Ditambahkan. Terima Kasih !");
            window.location.assign('user_admin.php');
            </script>
        <?php
    } else {
        ?>
        <script>
            alert("Data gagal ditambahkan !");
            window.location.assign('user_admin.php?url=lihat_aduan');
            </script>
        <?php
    }
?>