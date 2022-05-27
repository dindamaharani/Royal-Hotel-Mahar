<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\TipeKamar;
use Kint\Zval\Value;

class FasilitasKamarController extends BaseController
{
    public function index()
    {
        //
    }
    public function tampilfasilitaskamar()
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
        // $Datafasilitas = new FasilitasKamar;
        // $data['ListFasilitasKamar'] = $Datafasilitas->findAll();
        // return view('Fasilitas_Kamar/fasilitas-kamar', $data);

        $fasilitas_kamar = (new FasilitasKamar())
            ->select('nama_fasilitas, tipe_kamar, id_fasilitas_kamar')
            ->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = fasilitas_kamar.id_tipe_kamar')
            ->findAll();
        $data['ListFasilitasKamar'] = $fasilitas_kamar; // hasil_manipulasi

        return view('Fasilitas_Kamar/fasilitas-kamar', $data);
    }

    public function tambahfasilitaskamar()
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
        // $dataFasilitas = new FasilitasKamar();
        // $data['tipe_kamar'] = $dataFasilitas;
        // return view('Fasilitas_Kamar/tambah-fasilitas-kamar', $data);

        $tipe_kamar = (new TipeKamar)->findAll();
        $data['tipe_kamar'] = $tipe_kamar;

        return view('Fasilitas_Kamar/tambah-fasilitas-kamar', $data);
    }
    public function simpanfasilitaskamar()
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
        // helper(['form']);
        // $dataFasilitas = new FasilitasKamar();
        // $datanya = [
        //     'nama_fasilitas' => $this->request->getPost('txtinputfasilitaskamar')
        // ];
        // $dataFasilitas->insert($datanya);
        // return redirect()->to('/fasilitas-kamar/tampil');

        $datanya = [
            'id_tipe_kamar' => $this->request->getPost('txtinputtipekamar'),
            'nama_fasilitas' => $this->request->getPost('txtinputfasilitaskamar'),
        ];
        $berhasil = (new FasilitasKamar())->insert($datanya);
        return redirect()->to('/fasilitas-kamar/tampil');
    }

    public function editfasilitaskamar($id_fasilitas_kamar)
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
        $datafasilitas = new FasilitasKamar();
        $data['detailFasilitasKamar'] = $datafasilitas->where('id_fasilitas_kamar', $id_fasilitas_kamar)->findAll();

        $tipe_kamar = (new TipeKamar)->findAll();
        $data['tipe_kamar'] = $tipe_kamar;

        return view('Fasilitas_Kamar/edit-fasilitas-kamar', $data);
    }

    public function updatefasilitaskamar()
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
        $data = [
            'id_tipe_kamar' => $this->request->getPost('txtinputtipekamar'),
            'nama_fasilitas' => $this->request->getPost('txtinputfasilitaskamar'),
        ];
        $fasilitaskamar = new FasilitasKamar();
        $fasilitaskamar->update($this->request->getPost('txtidfasilitas'), $data);
        return redirect()->to('/fasilitas-kamar/tampil')->with('berhasil', 'Data Berhasil di Update');
    }

    public function hapusfasilitaskamar($id_fasilitas_kamar)
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
        $fasilitaskamar = new FasilitasKamar();
        $syarat = ['id_fasilitas_kamar' => $id_fasilitas_kamar];
        $infoFile = $fasilitaskamar->where($syarat)->find();
        //hapus data didatabase
        $fasilitaskamar->where('id_fasilitas_kamar', $id_fasilitas_kamar)->delete();
        return redirect()->to('/fasilitas-kamar/tampil')->with('berhasil', 'Data Berhasil di Hapus');
    }

    public function tampilFasilitasTamu()
    {
        $sub_query = (new Kamar())
            ->select('1')
            ->groupStart()
            ->where('akhir_booking IS NULL')
            ->orWhere('akhir_booking <', date('Y-m-d'))
            ->groupEnd()
            ->where('tipe_kamar = tipe_kamar.id_tipe_kamar')
            ->groupBy('tipe_kamar')
            ->getCompiledSelect();

        $tipe_kamar = (new TipeKamar())
            ->select("*, ({$sub_query}) AS tersedia", false)
            ->findAll();

        $fasilitas_kamar = (new FasilitasKamar())
            ->select("id_tipe_kamar, nama_fasilitas")
            ->findAll();

        $fasilitas_kamar_ = [];
        foreach ($fasilitas_kamar as $key => $value) {
            $fasilitas_kamar_[$value['id_tipe_kamar']][] = $value['nama_fasilitas'];
        }

        $tipe_kamar = array_map(function ($tp_kamar) use ($fasilitas_kamar_) {
            $tp_kamar['fasilitas'] = [];
            if (array_key_exists($tp_kamar['id_tipe_kamar'], $fasilitas_kamar_)) {
                $tp_kamar['fasilitas'] = $fasilitas_kamar_[$tp_kamar['id_tipe_kamar']];
            }
            return $tp_kamar;
        }, $tipe_kamar);
        $data['tipe_kamar'] = $tipe_kamar;

        return view('Fasilitas_kamar/fasilitas-kamar-tamu', $data);
    }
}
