<?php
session_start();
$judul = $_POST['judul'];
$isi_laporan = $_POST['isi_aduan'];
$tgl_pengaduan = date('Y-m-d');

include 'koneksi.php';
$query = mysqli_query($koneksi, "INSERT INTO pengaduan(nik,tgl_pengaduan,judul,ini_laporan) VALUES($_SESSION[nik],'$tgl_pengaduan','$judul','$isi_laporan')");
    if ($query) {
        ?>
        <script>
            alert("Data Sudah Ditambahkan. Terima Kasih !");
            window.location.assign('user.php');
            </script>
        <?php
    } else {
        ?>
        <script>
            alert("Data gagal ditambahkan !");
            window.location.assign('isi_aduan.php');
            </script>
        <?php
    }
?>