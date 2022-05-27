<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Form pemesanan Kamar</h2>
<p>Silakan masukan data pemesanan kamar pada form dibawah ini</p>
<p>
<form action="/reservasi/simpan" method="POST">
  <div class="form-group">
    <label for="coloum-nik">NIK</label>
    <input type="text" class="form-control" name="nik" id="coloum-nik" placeholder="Masukkan NIK">
  </div>
  <div class="form-group">
    <label for="coloum-nama">Nama Pemesan</label>
    <input type="text" class="form-control" name="nama_pemesan" id="coloum-nama" placeholder="Masukkan Nama Pemesan">
  </div>
  <!-- <div class="form-group">
    <label for="coloum-kamar">Jumlah Kamar</label>
    <select multiple name="kamar[]" class="form-control" id="coloum-kamar">
      <?php foreach ($kamar as $value) : ?>
        <option value="<?= $value['id_kamar']; ?>"><?= $value['nomor_kamar']; ?></option>
      <?php endforeach ?>
    </select>
  </div> -->
  <div class="form-group">
    <label for="coloum-cekin">Cek In</label>
    <input type="date" class="form-control" name="cekin" id="coloum-cekin">
  </div>
  <div class="form-group">
    <label for="coloum-cekout">Cek Out</label>
    <input type="date" class="form-control" name="cekout" id="coloum-cekout">
  </div>
  <div class="form-group">
    <label for="coloum-pilihkamar">Pilih Kamar</label>
    <select multiple class="form-control" name="pilihkamar[]" id="coloum-pilihkamar">
      <?php foreach ($kamar as $row) : ?>
        <option value="<?= $row['id_kamar'] ?>"><?= $row['nomor_kamar'] ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= $this->endSection() ?>