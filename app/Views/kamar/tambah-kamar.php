<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Kamar</h2>
<p>Silakan masukan data kamar baru pada form dibawah ini</p>
<form method="POST" action="/kamar/simpan" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nomor Kamar</label>
        <input type="text" name="txtNoKamar" class="form-control" placeholder="Masukan Nomor Kamar, misal A101" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <select class="form-control" name="txtInputTipeKamar">
            <?php foreach ($tipe_kamar as $row) : ?>
                <option value="<?= $row['id_tipe_kamar'] ?>"><?= $row['tipe_kamar'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextareal" class="font-weight-bold">Deskripsi Kamar</label>
        <textarea name="txtInputDeskripsi" class="form-control" placeholder="Masukan Deskripsi Kamar" id="exampleFormControlTextareal" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto Kamar</label>
        <input type="file" name="txtInputFoto" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" OnClick="return confirm('Anda Yakin Akan Menyimpan Data Ini?')">Simpan</button>
    </div>
</form>
<?= $this->endSection() ?>