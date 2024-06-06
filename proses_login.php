<?php
include 'koneksi.php';
$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
$password = mysqli_real_escape_string($koneksi,$_POST['password']);

$secret_key = "6LdJSvEpAAAAAJpUc395svMLgGoz_X_V0g6DHNlS";

$verifikasi = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.
    $_POST['g-recaptcha-response']);
$response = json_decode($verifikasi);

if($response->success)
{
$query_validasi = mysqli_query($koneksi, "SELECT * FROM user WHERE nik = '$nik' AND password = md5('$password')");

if(mysqli_num_rows($query_validasi) == 0) {
    ?>
    <script>
        alert("Maaf NIK atau Password salah !!!");                   
        window.location.assign('index.php');
        </script>
    <?php
} else {
    $data = mysqli_fetch_assoc($query_validasi);
    session_start();
    $_SESSION["nik"] = $nik;
    $_SESSION["nama"] = $data['nama'];
    $_SESSION["status"] = $data['status'];
    if($data['status'] == 'Pengguna')
        header("location:user.php");
    else
        header("location:user_admin.php");
}
} else {
    ?>
    <script>
        alert("Recaptcha tidak sesuai");
        window.location.assign('index.php');
    </script>
<?php
}
?>