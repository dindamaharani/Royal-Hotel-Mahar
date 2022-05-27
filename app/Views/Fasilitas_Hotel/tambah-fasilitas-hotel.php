<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Fasilitas Hotel</h2>
<p>Silakan gunakan form dibawah ini untuk menambahkan data Fasilitas Hotel Baru</p>
<form method="POST" action="/fasilitas-hotel/simpan" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas Hotel</label>
        <input type="text" name="txtnamafasilitas" class="form-control" placeholder="Masukan Nama Fasilitas Hotel" autocomplete="off" autofocus>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Deskripsi Fasilitas</label>
        <textarea name="txtInputDeskripsi" class="form-control" id="exampleFormControlTextarea1" placeholder="Masukan Deskripsi Fasilitas Hotel"></textarea>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto Fasilitas</label>
        <input type="file" name="txtInputFoto" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit" OnClick="return confirm('Anda Yakin Akan Menyimpan Data Ini?')">Simpan Fasilitas Hotel</button>
    </div>
</form>
<?= $this->endSection() ?>