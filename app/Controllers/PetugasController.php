<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\Kamar;
use App\Models\TipeKamar;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function login()
    {
        $Datapetugas =  new Petugas;
        $syarat = [
            'username' =>
            $this->request->getPost('txtUsername'),
            'password' =>
            md5($this->request->getPost('txtPassword'))
        ];
        $Userpetugas =
            $Datapetugas->where($syarat)->find();
        if (count($Userpetugas) == 1) {
            $session_data = [
                'username' => $Userpetugas[0]['username'],
                'id_petugas' => $Userpetugas[0]['id_petugas'],
                'level' => $Userpetugas[0]['level'],
                'sudahkahLogin' => TRUE
            ];
            session()->set($session_data);
            return redirect()->to('/petugas/dashboard');
        } else {
            return redirect()->to('/petugas');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }
    public function tampilKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $Datakamar = new Kamar;
        $data['ListKamar'] = $Datakamar
            ->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar')
            ->get()
            ->getResult('array');
        return view('Kamar/tampil-kamar', $data);
    }
    public function tambahKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        // ambil data tipe kamar
        $tipe_kamar = (new TipeKamar)
            ->findAll();
        $data['tipe_kamar'] = $tipe_kamar;
        return view('Kamar/tambah-kamar', $data);
    }
    public function simpanKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        helper(['form']);
        $dataKamar = new Kamar;
        $upload = $this->request->getFile('txtInputFoto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $datanya = [
            'id_kamar' => $this->request->getPost('txtIdKamar'),
            'nomor_kamar' => $this->request->getPost('txtNoKamar'),
            'tipe_kamar' => $this->request->getPost('txtInputTipeKamar'),
            'deskripsi' => $this->request->getPost('txtInputDeskripsi'),
            'foto' => $upload->getName()
        ];
        $dataKamar->insert($datanya);
        return redirect()->to('/kamar');
    }
    public function editKamar($idKamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $dataKamar = new Kamar;
        $data['detailKamar'] = $dataKamar->where('id_kamar', $idKamar)->findAll();
        return view('Kamar/edit-kamar', $data);
    }
    public function editFoto($idKamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $dataKamar = new Kamar;
        $data['detailKamar'] = $dataKamar->where('id_kamar', $idKamar)->findAll();
        return view('Kamar/update-foto', $data);
    }
    public function updateKamar()
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        helper(['form']);
        $dataKamar = new Kamar;
        $data = [
            'tipe_kamar' => $this->request->getPost('txtInputTipeKamar'),
            'deskripsi' => $this->request->getPost('txtInputDeskripsi')
        ];
        $dataKamar->update($this->request->getPost('txtNoKamar'), $data);
        return redirect()->to('/kamar');
    }
    public function updateFoto()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        helper(['form']);
        $DataKamar = new Kamar;
        $syarat = $this->request->getPost('tfoto');
        unlink('gambar/' . $syarat);
        $upload = $this->request->getFile('txtFotoKamar');
        $upload->move(WRITEPATH . '../public/gambar/');
        $data = ['foto' => $upload->getName()];
        $DataKamar->update($this->request->getPost('txtNoKamar'), $data);
        return redirect()->to('/kamar');
    }
    public function hapusKamar($idKamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $kamar = new Kamar();
        $syarat = ['id_kamar' => $idKamar];
        $infoFile = $kamar->where($syarat)->find();
        //hapus foto
        unlink('gambar/' . $infoFile[0]['foto']);
        //hapus data didatabase
        $kamar->where('id_kamar', $idKamar)->delete();
        return redirect()->to('/kamar')->with('berhasil', 'Data Berhasil di Hapus');
    }
}
