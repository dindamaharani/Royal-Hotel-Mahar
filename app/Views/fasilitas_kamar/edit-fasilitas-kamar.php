<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2> Edit Fasilitas Kamar </h2>
<p>Silahkan masukan data Kamar baru pada form dibawah ini</p>
<form method="POST" action="/fasilitas-kamar/update" ectype="multipart/fprm-data">
    <div class="form-group">
        <input type="hidden" name="txtidfasilitas" value="<?= $detailFasilitasKamar[0]['id_fasilitas_kamar']; ?>">
        <label class="font-weight-bold">Nama Fasilitas Kamar</label>
        <input type="text" name="txtinputfasilitaskamar" class="form-control" placeholder="Masukan fasilitas kamar" value="<?= $detailFasilitasKamar[0]['nama_fasilitas']; ?>">
    </div>
    <div class <div class="form-group">
        <label for="tipe_kamar">Pilih Tipe Kamar</label>
        <select class="form-control" id="tipe_kamar" name="txtinputtipekamar">
            <?php foreach ($tipe_kamar as $key => $value) : ?>
                <option value="<?= $value['id_tipe_kamar'] ?>"><?= $value['tipe_kamar'] ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group">
        <button class="btn btn-primary mt-3" type="submit" OnClick="return confirm('Anda Yakin Akan Update Data Ini?')">Update Fasilitas Kamar</button>
    </div>
</form>
<?= $this->endSection(); ?>