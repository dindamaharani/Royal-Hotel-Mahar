<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use CodeIgniter\HTTP\Request;

class ReservasiController extends BaseController
{
    protected $filter = [];
    public function data()
    {
        $reservasi = (new Reservasi)
            ->select('reservasi.id_reservasi, nik, nama_pemesan, cek-in, cek-out, jumlah_kamar, harga, total, status');
        // ->join('reservasi_kamar', 'reservasi_kamar.id_reservasi = reservasi.id_reservasi', 'left')

        foreach ($this->filter as $coloum => $filter) {
            if ($filter === '') continue;

            if ($coloum == 'nama') {
                $reservasi->like($coloum, $filter, 'both');
            }


            $reservasi->where($coloum, $filter);
        }

        // dd($reservasi->getCompiledSelect());
        $reservasi = $reservasi->get()->getResultArray();
        // Ambildata id_reservasi nya saja
        $id_reservasi = [];
        foreach ($reservasi as $key => $value) {
            // if ($value['id_reservasi_kamar] == null) continue;
            $id_reservasi[] = $value['id_reservasi'];
        }

        //Query id_kamar di tabel reservasi_kamar
        $data_kamar = [];
        if (count($reservasi) > 0)
            $data_kamar = \config\Database::connect()
                ->table('reservasi_kamar')
                ->select('id_reservasi, nomor_kamar')
                ->whereIn('id_reservasi', $id_reservasi)
                ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
                // ->getCompiledSelect();
                ->get()
                ->getResultArray();
        // dd($data_kamar);
        // $data_kamar = data mentah dari database
        // $data_kamar = data yang sudah di struktur ulang pengelompokan nya
        // struktur ulang data_kamar
        $data_kamar_ = [];
        foreach ($data_kamar as $key => $value) {
            $data_kamar_[$value['id_reservasi']][] = $value['nomor_kamar'];
        }

        //Masukkin $data_kamar_ ke $reservasi
        $reservasi = array_map(function ($reserv) use ($data_kamar_) {
            $reserv['kamar'] = [];
            if (array_key_exists($reserv['id_reservasi'], $data_kamar_)) {
                $reserv['kamar'] = $data_kamar_[$reserv['id_reservasi']];
            }

            switch ($reserv['status']) {
                case 1:
                    $reserv['status_txt'] = 'Pending';
                    break;
                case 2:
                    $reserv['status_txt'] = 'Cek-In';
                    break;
                case 3:
                    $reserv['status_txt'] = 'Cek-Out';
                    break;
                    // case 4:
                    //     $reserv['status_txt'] = 'terima';
                    //     break;
                    // case 5:
                    //     $reserv['status_txt'] = 'tolak';
                    //     break;
                case 6:
                    $reserv['status_txt'] = 'Selesai';
                    break;
            }

            return $reserv;
        },  $reservasi);


        //dd($reservasi, $id_reservasi, $data_kamar, $data_kamar_);
        $data['reservasi'] = $reservasi;

        return view('reservasi/data', $data);
    }

    public function cekIn($id_reservasi)
    {
        $berhasil = (new Reservasi())->update($id_reservasi, ['status' => 2]);
        return redirect()->to('reservasi/data');
    }

    public function cekOut($id_reservasi)
    {
        $berhasil = (new Reservasi())->update($id_reservasi, ['status' => 3]);
        return redirect()->to('reservasi/data');
    }

    public function selesai($id_reservasi)
    {
        $berhasil = (new Reservasi())->update($id_reservasi, ['status' => 6]);
        return redirect()->to('reservasi/data');
    }

    // public function terima($id_reservasi)
    // {
    //     $berhasil = (new Reservasi())->update($id_reservasi, ['status' => 4]);
    //     return redirect()->to('reservasi/data');
    // }

    // public function tolak($id_reservasi)
    // {
    //     $berhasil = (new Reservasi())->update($id_reservasi, ['status' => 5]);
    //     return redirect()->to('reservasi/data');
    // }

    // public function hapusdatareservasi($id_reservasi)
    // {
    //     $reservasi = new Reservasi();
    //     $syarat = ['id_reservasi' => $id_reservasi];
    //     $infoFile = $reservasi->where($syarat)->find();

    //     //hapus data didatabase
    //     $reservasi->where('id_reservasi', $id_reservasi)->delete();
    //     return redirect()->to('/reservasi/data')->with('berhasil', 'Data Berhasil di Hapus');
    // }

    public function form()
    {
        // mengambil semua data kamar
        $kamar = (new Kamar)
            ->findAll();
        $data['kamar'] = $kamar;
        return view('reservasi/form', $data);
    }

    public function simpan()
    {
        d($this->request->getPost());

        $jml_kamar = count($this->request->getPost('pilihkamar'));
        $id_kamarkamar = $this->request->getPost('pilihkamar');

        // ambil harga kamar berdasarkan tipe kamar 
        $kamar = (new Kamar)
            ->select('harga')
            ->whereIn('id_kamar', $id_kamarkamar)
            ->join('tipe_kamar', 'id_tipe_kamar = kamar.tipe_kamar')
            // ->getCompiledSelect();
            ->get()->getResultArray();
        // dd($kamar);
        $harga_kamar = 0;
        foreach ($kamar as $value) {
            $harga_kamar = $harga_kamar + $value['harga'];
        }
        // dd($harga_kamar);

        $cekin = $this->request->getPost('cekin');
        $cekout = $this->request->getPost('cekout');

        $in = new \DateTime($cekin);
        $out = new \DateTime($cekout);
        $interval = $in->diff($out);
        $jml_hari = $interval->d;

        $reservasi = new Reservasi();
        $reservasi->insert([
            'nik' => $this->request->getPost('nik'),
            'nama_pemesan' => $this->request->getPost('nama_pemesan'),
            'cek-in' => $cekin,
            'cek-out' => $cekout,
            'jumlah_kamar' => $jml_kamar,
            'harga' => $harga_kamar,
            'total' => $harga_kamar * $jml_hari,
            'status' => 1,
        ]);
        $id_reservasi = $reservasi->getInsertID();
        $data = [];
        foreach ($id_kamarkamar as $key => $value) {
            $data[] = [
                'id_kamar' => $value,
                'id_reservasi' => $reservasi->getInsertID()
            ];
        }

        $db = \config\Database::connect();
        $builder = $db->table('reservasi_kamar');
        $builder->insertBatch($data);

        return redirect()->to('reservasi/pemesanan/' . $id_reservasi);

        // if (session()->get('level') == 'resepsionis') {
        //     return redirect()->to('/reservasi/data');
        // } else {
        //     return redirect()->to('/reservasi/data');
        // }
    }

    public function afterInsert($id_reservasi)
    {
        $detail_reservasi = (new Reservasi())
            ->select('reservasi.id_reservasi, nik, nama_pemesan, cek-in, cek-out, jumlah_kamar, reservasi.harga, total, status, nomor_kamar, tipe_kamar.tipe_kamar')
            ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar')
            ->where('reservasi.id_reservasi', $id_reservasi)
            ->get()->getRowArray();

        //Ambil data id_kamar dari table reservasi_kamar berdasarkan $id_reservasi
        $db = \Config\Database::connect();
        $reservasi_kamar = $db->table('reservasi_kamar');
        $kamar = $reservasi_kamar
            ->select('kamar.nomor_kamar')
            ->where('id_reservasi', $id_reservasi)
            ->join('kamar', 'reservasi_kamar.id_kamar = kamar.id_kamar')
            ->get()->getResult();
        $kamar = array_column($kamar, 'nomor_kamar');

        //dd($detail_reservasi);
        $data['detail_reservasi'] = $detail_reservasi;
        $data['kamar'] = $kamar;

        //$data['nama_ku'] = 'dinda';
        return view('reservasi/selesaiInsert', $data);
    }

    public function filterData()
    {
        $request = $this->request;


        $this->filter = [
            'nik' => $request->getPost('nik'),
            'nama_pemesan' => $request->getPost('nama_pemesan'),
            'cek-in' => $request->getPost('cek_in'),
            'cek-out' => $request->getPost('cek_out'),
        ];

        return $this->data();
    }
}
