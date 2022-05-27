<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Kamar</h2>
<p>Berikut ini data kamar yang sudah terdaftar dalam database</p>
<p>
    <a href="/kamar/tambah" class="btn btn-primary btn-sm">Tambah Kamar</a>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert alert-success">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>
            <th>Nomor Kamar</th>
            <th>Tipe Kamar</th>
            <th>Deskripsi Kamar</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        foreach ($ListKamar as $row) {
            $htmlData = '<tr>';
            $htmlData .= '<td>' . $row['nomor_kamar'] . '</td>';
            $htmlData .= '<td>' . $row['tipe_kamar'] . '</td>';
            $htmlData .= '<td>' . $row['deskripsi'] . '</td>';
            $htmlData .= '<td>' . '<img src="' . base_url("/gambar/" . $row['foto']) . '" width="200" height="200">' . '</td>';
            $htmlData .= '<td class ="text-center">';
            $htmlData .= '<a href ="/kamar/edit/' . $row['id_kamar'] . '" class="btn btn-info btn-sm mr-1">Edit</a>';
            $htmlData .= '<a href ="/kamar/foto/' . $row['id_kamar'] . '" class="btn btn-danger btn-sm mr-1">Edit Foto</a>';
            $htmlData .= '<a href ="/kamar/hapus/' . $row['id_kamar'] . '" class="btn btn-danger btn-sm">Hapus</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>