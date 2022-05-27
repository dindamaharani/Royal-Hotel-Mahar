<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Kamar</h2>
<p>Berikut ini data fasilitas kamar yang sudah terdaftar dalam database </p>
<P>
    <a href="/fasilitas-kamar/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas Kamar</a>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert aler-success">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hover">
    <thead class="bg-light text-center">
        <tr>
            <th>Nama Fasilitas Kamar</th>
            <th>Tipe Kamar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        foreach ($ListFasilitasKamar as $row) {
            $htmlData = '<tr>';
            $htmlData .= '<td>' . $row['nama_fasilitas'] . '</td>';
            $htmlData .= '<td>' . $row['tipe_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="edit/' . $row['id_fasilitas_kamar'] . '" class="btn btn-info btn-sm mr-1">edit</a>';
            $htmlData .= '<a href="hapus/' . $row['id_fasilitas_kamar'] . '" class="btn btn-danger btn-sm mr-1">hapus</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>