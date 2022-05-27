<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<style>
    @media print {
        .noprint {
            display: none;
        }
    }
</style>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Pemesanan Kamar Hotel</h5>
        <form>
            <div class="form-group row">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="nik" value="<?= $detail_reservasi['nik'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Pemesan</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= $detail_reservasi['nama_pemesan'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="kamar" class="col-sm-2 col-form-label">Kamar</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="kamar" value="<?= implode(',', $kamar) ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="cek_in" class="col-sm-2 col-form-label">Cek-In</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="cek_in" value="<?= $detail_reservasi['cek-in'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="cek_out" class="col-sm-2 col-form-label">Cek-Out</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="cek_out" value="<?= $detail_reservasi['cek-out'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-sm-2 col-form-label">jumlah Kamar</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="jumlah" value="<?= $detail_reservasi['jumlah_kamar'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="total" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="total" value="<?= $detail_reservasi['total'] ?>">
                </div>
            </div>

        </form>
        <a href="#" onclick="window.print()" class="btn btn-primary noprint">print</a>
    </div>
</div>
<?= $this->endSection() ?>