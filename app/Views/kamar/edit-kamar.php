<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Kamar</h2>
<p>Silahkan masukan data Kamar baru pada form dibawah ini</p>
<form method="POST" action="/kamar/update" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nomor Kamar</label>
        <input type="text" name="txtNoKamar" class="form-control" placeholder="Masukan nomor kamar, misal : 1A" value="<?= $detailKamar[0]['nomor_kamar']; ?>" readonly>
    </div>
    <div class="form-group">
        <label class="font-weight-bold"> Tipe Kamar</label>
        <input type="text" name="txtInputTipeKamar" class="form-control" placeholder="Masukan tipe kamar" value="<?= $detailKamar[0]['tipe_kamar']; ?>">
    </div>
    <div class="form-group">
        <label class="font-weight-bold"> Deskripsi Kamar</label>
        <input type="text" name="txtInputDeskripsi" class="form-control" placeholder="Masukan Deskripsi kamar" value="<?= $detailKamar[0]['deskripsi']; ?>">
    </div>
    <div class="form-group">
        <label class="font-weight-bold"> Foto Kamar</label><br />
        <?php
        if (!empty($detailKamar[0]['foto'])) {
            echo '<img src="' . base_url("/gambar/" . $detailKamar[0]['foto']) . '" width="150">';
        }
        ?>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" OnClick="return confirm('Anda Yakin Akan Update Data Ini ?')">Update Kamar</button>
    </div>
</form>
<?= $this->endSection(); ?>