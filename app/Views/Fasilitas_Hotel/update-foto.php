<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Update Foto</h2>
<p>Silahkan upload foto baru</p>
<form method="POST" action="/fasilitas-hotel/update-foto" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas Hotel</label>
        <input type="hidden" name="txtidfasilitas" value="<?= $detailFasilitasHotel[0]['id_fasilitas_umum']; ?>>
        <input type=" text" name="txtnamafasilitas" class="form-control" placeholder="Masukan Nama Fasilitas" value="<?= $detailFasilitasHotel[0]['nama_fasilitas_umum']; ?>" readonly>
        <input type="hidden" name="tfoto" class="form-control" value="<?= $detailFasilitasHotel[0]['foto']; ?>" readonly>
    </div>
    <div class="form-group">
        <label class="font-weight-bold mb-1"> Foto Fasilitas Hotel</label><br />
        <?php
        if (!empty($detailFasilitasHotel[0]['foto'])) {
            echo '<img src="' . base_url("/gambar/" . $detailFasilitasHotel[0]['foto']) . '" width="150">';
        }
        ?>
        <input type="file" name="txtInputFoto" class="form-control mt-3">
    </div>

    <br>
    <div class="form-group">
        <button class="btn btn-primary mx-1" OnClick="return confirm('Anda Yakin Akan Update Foto Ini?')">Update Foto Fasilitas</button>
    </div>
</form>
<?= $this->endSection(); ?>