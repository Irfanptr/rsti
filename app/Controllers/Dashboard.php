<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $pasien = new \App\Models\countModel();
        $dokter = new \App\Models\countModel();
        $poli = new \App\Models\countModel();
        $getDataPasien = $pasien->dataPasien();
        $getDataDokter = $dokter->dataDokter();
        $getDataPoli = $poli->dataDokter();

        $data = array(
            'title' => 'Dashboard',
            'content' => 'dashboard',
            'countpas' => $getDataPasien,
            'countdok' => $getDataDokter,
            'countpol' => $getDataPoli);
        return view('layout/wrapper', $data);
    }
}
