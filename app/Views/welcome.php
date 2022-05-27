<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<?php if (session()->get('level') == 'admin') { ?>
    <h1 class="display-6 text-primary">
        <marquee>Selamat Datang Ini Adalah Halaman Admin</marquee><strong>
            <?= session()->get('nama_petugas'); ?></strong>
    </h1>
<?php } else if (session()->get('level') == 'resepsionis') { ?>
    <h1 class="display-6 text-primary">
        <marquee>Selamat Datang Ini Adalah Halaman Resepsionis</marquee><strong>
            <?= session()->get('nama_petugas'); ?></strong>
    </h1>
<?php } ?>
<?= $this->endSection() ?>