<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FasilitasHotel;
use App\Models\Kamar;

class Home extends BaseController
{
    public function index()
    {
        $Datakamar = new Kamar;
        $data['fasilitas_kamar'] = $Datakamar
            ->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar = kamar.tipe_kamar')
            ->groupBy('kamar.tipe_kamar')
            ->get()
            ->getResult('array');
        $datafasilitas = new FasilitasHotel();
        $data['fasilitas_hotel'] = $datafasilitas->findAll();

        return view('home-template/home', $data);
    }
}
