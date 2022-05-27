<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Reservasi</h2>
<p>Berikut ini adalah data Reservasi pelanggan </p>

<!-- 
<script>
    function popitup(url) {
        newwindow = window.open(url, 'name', 'height=400,width=700');
        if (window.focus) {
            newwindow.focus()
        }
        return false;
    }
</script> -->


<?php if (!empty(session()->getFlashdata('berhasil'))) : ?>
  <div class="alert aler-success">
    <?php echo session()->getFlashdata('berhasil'); ?>
  </div>
<?php endif ?>
<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form-filter" aria-expanded="false" aria-controls="form-filter">
    Filter Data
  </button>
  <?php if (\Config\Services::request()->getMethod() == 'post') : ?>
    <a href="/reservasi/data" class="btn btn-danger">Hapus Filter</a>
  <?php endif ?>
  <!-- <a href="/laporan" onclick="return popitup('/laporan')" class="btn btn-info">Print</a> -->
</p>
<div class="collapse mb-3" id="form-filter">
  <div class="card card-body ">
    <form method="POST" action="/reservasi/data">
      <div class="form-group">
        <label for="colom_nik">NIK</label>
        <input type="text" name="nik" class="form-control" id="colom_nik" placeholder="Masukan NIK">
      </div>
      <div class="form-group">
        <label for="colom_nama">Nama Pemesan</label>
        <input type="text" name="nama_pemesan" class="form-control" id="colom_nama" placeholder="Masukan Nama Tamu">
      </div>
      <div class="form-group">
        <label for="colom_cek_in">Cek-in</label>
        <input type="date" name="cek_in" class="form-control" id="colom_cek_in">
      </div>
      <div class="form-group">
        <label for="colom_cek_out">Cek-out</label>
        <input type="date" name="cek_out" class="form-control" id="colom_cek_out">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<table class="table table-sm table-hover">
  <thead class="bg-light text-center">
    <tr>
      <th>NO</th>
      <th>NIK</th>
      <th>Nama Pemesan</th>
      <th>Kamar</th>
      <th>Cek-in</th>
      <th>Cek-out</th>
      <th>Harga/Permalam</th>
      <th>Total</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
    foreach ($reservasi as $row) : ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nik'] ?></td>
        <td><?= $row['nama_pemesan'] ?></td>
        <td>
          <ul>
            <?php foreach ($row['kamar'] as $kamar) : ?>
              <li><?= $kamar ?></li>
            <?php endforeach ?>
          </ul>
        </td>
        <td><?= $row['cek-in'] ?></td>
        <td><?= $row['cek-out'] ?></td>
        <td><?= $row['harga'] ?></td>
        <td><?= $row['total'] ?></td>
        <td><?= $row['status_txt'] ?></td>
        <td class="text-center">
          <a href="/reservasi/cekin/<?= $row['id_reservasi'] ?>" class="btn btn-info btn-sm mr-1 <?= ($row['status'] == '1') ? '' : 'disabled' ?>">Cek-In</a>
          <a href="/reservasi/cekout/<?= $row['id_reservasi'] ?>" class="btn btn-success btn-sm mr-1 <?= ($row['status'] == '2') ? '' : 'disabled' ?>">Cek-Out</a>
          <a href="/reservasi/selesai/<?= $row['id_reservasi'] ?>" class="btn btn-primary btn-sm mr-1 <?= ($row['status'] == '3') ? '' : 'disabled' ?>">Selesai</a>
          <?php /*
          <?php if ($row['status'] == 1) : ?>
            <a href="/reservasi/terima/<?= $row['id_reservasi'] ?>" class="btn btn-info btn-sm mr-1">Terima</a>
            <a href="/reservasi/tolak/<?= $row['id_reservasi'] ?>" class="btn btn-danger btn-sm mr-1">Tolak</a>
          <?php elseif ($row['status'] == 2) : ?>
            <a href="/reservasi/cekout/<?= $row['id_reservasi'] ?>" class="btn btn-success btn-sm mr-1">Cek-Out</a>
          <?php elseif ($row['status'] == 5) : ?>
            <?php if (new DateTime(date('Y-m-d')) == new DateTime($row['cek-in'])) : ?>
              <a href="/reservasi/cekin/<?= $row['id_reservasi'] ?>" class="btn btn-info btn-sm mr-1">Cek-In</a>
            <?php else : ?>
              <a href="/reservasi/cekin/<?= $row['id_reservasi'] ?>" class="btn btn-info btn-sm mr-1 disabled">Cek-In</a>
              <a href="/reservasi/tolak/<?= $row['id_reservasi'] ?>" class="btn btn-danger btn-sm mr-1">Tolak</a>
            <?php endif ?>
          <?php else : ?>
            <a href="/reservasi/hapus/<?= $row['id_reservasi'] ?>" class="btn btn-danger btn-sm mr-1">Hapus</a>
          <?php endif ?>
          */ ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?= $this->endSection() ?>