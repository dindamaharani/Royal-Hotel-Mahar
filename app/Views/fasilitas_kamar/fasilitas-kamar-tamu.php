<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<div class="row mt-3">
    <?php foreach ($tipe_kamar as $value) : ?>
        <div class="col-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $value['tipe_kamar'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rp. <?= number_format($value['harga']) ?>Permalam</h6>
                    <p class="card-text">
                        Fasilitas: <br>
                    <ol>
                        <?php foreach ($value['fasilitas'] as $fasilitas) : ?>
                            <li><?= $fasilitas ?></li>
                        <?php endforeach ?>

                    </ol>
                    </p>
                    <?php if (!session()->get('sudahkahLogin')) : ?>
                        <?php if ($value['tersedia']) : ?>
                            <a href="/reservasi?id_tipe_kamar=<?= $value['id_tipe_kamar'] ?>" class="card-link btn btn-primary">Pesan</a>
                        <?php else : ?>
                            <a href="#" class="card-link btn btn-primary disabled">Habis</a>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?= $this->endSection() ?>