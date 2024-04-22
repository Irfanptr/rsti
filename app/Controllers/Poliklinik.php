<?php

namespace App\Controllers;

class Poliklinik extends BaseController
{
    public function index()
    {
        $model = new \App\Models\poliModel();
        $getData = $model->getDataJoin();
        $data = array(
            'title' => 'Data Poli',
            'content' => 'poliklinik',
            'pol' => $getData);
        return view('layout/wrapper', $data);
    }

    public function tambahPoli()
    {
        $model = new \App\Models\poliModel();
        $getData = $model->getDataJoin();
        $data = array(
            'title'     => 'Tambah Poliklinik',
            'content'   => 'pages/tambahpoli',
            'pol' => $getData
        );
        return view('layout/wrapper', $data);
    }
    
    public function addPoli()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'namapoli' => 'required',
            'namadokter' => 'required',
            'gedung' => 'required',
        ];
    
        $messages = [
            'namadokter' => [
                'required' => 'Nama Poli Harus Diisi.'
            ],
            'alamat' => [
                'required' => 'Alamat Harus Diisi.',
            ],
            'gedung' => [
                'required' => 'Gedung Harus Diisi.',
            ],
        ];
    
        if ($this->validate($rules, $messages)) {
            $data = array(
                'nama_poli' => $this->request->getPost('namapoli'),
                'id_dokter' => $this->request->getPost('nama_dokter'),
                'gedung' => $this->request->getPost('gedung'),
            );
    
            $model = new \App\Models\poliModel();
            $model->add($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            return redirect()->to('/pasien');
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }
    }
}