<?php

namespace App\Controllers;

class Dokter extends BaseController
{
    public function index()
    {
        $model = new \App\Models\dokterModel();
        $getData = $model->findAll();
        $data = array(
            'title'     => 'Data Dokter',
            'content'   => 'dokter',
            'dok'       => $getData);
        return view('layout/wrapper', $data);
    }

    public function tambahDokter()
    {
        $data = array(
            'title'     => 'Tambah Dokter',
            'content'   => 'pages/tambahdokter'
        );
        return view('layout/wrapper', $data);
    }

    public function addDokter()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'namadokter' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'spesialis' => 'required'
        ];
    
        $messages = [
            'namadokter' => [
                'required' => 'Nama Dokter Harus Diisi.'
            ],
            'alamat' => [
                'required' => 'Alamat Harus Diisi.',
            ],
            'nohp' => [
                'required' => 'No Hp Harus Diisi.',
            ],
            'spesialis' => [
                'required' => 'Spesialis Harus Diisi.',
            ],
        ];
    
        if ($this->validate($rules, $messages)) {
            $data = array(
                'nama_dokter' => $this->request->getPost('namadokter'),
                'alamat' => $this->request->getPost('alamat'),
                'nohp' => $this->request->getPost('nohp'),
                'spesialis' => $this->request->getPost('spesialis'),
            );
    
            $model = new \App\Models\dokterModel();
            $model->add($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            return redirect()->to('/pasien');
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }
    }
}
