<?php

namespace App\Controllers;

class Pendaftaran extends BaseController
{
    public function index()
    {
        $poli = new \App\Models\poliModel();
        $pm = new \App\Models\pembayaranModel();
        $getdata = $poli->getDataJoin();
        $getAll = $pm->findAll();
        $data = array(
            'title'     => 'Pendaftaran Pasien',
            'content'   => 'pendaftaran',
            'pol'       => $getdata,
            'pm'        => $getAll);
        return view('layout/wrapper', $data);
    }

    public function autofill()
    {
        $poliModel = new \App\Models\PoliModel();
        $poliId = $this->request->getPost('id');
        $data = $poliModel->innerJoin($poliId);
        if ($data) {
            // Jika data ditemukan, kirimkan dalam format JSON
            return $this->response->setJSON($data);
        } else {
            // Jika data tidak ditemukan, kirim respons error
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Data not found']);
        }
    }
}
