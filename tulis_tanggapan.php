<?php
$id_pengaduan = $_GET['id_pengaduan'];
?>
<div class="card">
    <div class="card-header">
    <a href="javascript:history.go(-1)" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Kembali</span>
    </a>
    </div>
    <div class="card-body">
<form class="user" method="post" action="proses_tanggapan.php">
    <?php
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
    $data = mysqli_fetch_assoc($query);
    ?>
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-title">Judul</p>
            <h5 class="card-text"><?= $data['judul']; ?>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-title">Isi Pengaduan</p>
            <h5 class="card-text"><?= $data['isi_laporan']; ?>
        </div>
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-select">
        <?php
            $arrStat = ['0','Diproses','Selesai'];
            for($i=0;$i<3;$i++) {
                if($arrStat[$i] == $data['status'])
                    echo "<option value=$arrStat[$i] selected> $arrStat[$i]</option>";
                else
                    echo "<option value=$arrStat[$i]> $arrStat[$i]</option>";
            }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tulis Tanggapan</label>
        <textarea name="tanggapan" class="form-control" cols="30" rows="5">
        <?= $data['tanggapan']; ?>
        </textarea>
    </div>

    <div class="form-group col-md-4">
            <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan']; ?>">
        <button type="submit" class="btn btn-primary btn-user">
            Kirim Tanggapan
        </button>
        <button type="reset" class="btn btn-primary btn-user">
            Kosongkan
</button>    
    </div>
</form>
    </div>
</div>