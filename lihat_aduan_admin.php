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
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Isi Aduan</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        <tbody>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM pengaduan");
        while ($data=mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?= $data[2]; ?></td>
            <td><?= $data[3]; ?></td>
            <td><?= $data[4]; ?></td>
            <td><?= $data[5]; ?></td>
            <td><?= $data[6]; ?></td>
            <td>
                <a href="?url=tulis_tanggapan&id_pengaduan=<?= $data[0]; ?>" class="btn btn-danger">
                <i class="fa fa-pen"> Tanggapi </i>
            </td>
        </tr>
    <?php
    } ?>
        <tbody>
        </table>
    </div>
</div>