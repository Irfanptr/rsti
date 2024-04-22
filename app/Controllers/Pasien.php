<?php

namespace App\Controllers;

use TCPDF;

class Pasien extends BaseController
{
    public function index()
    {
        $model = new \App\Models\pasienModel();
        $getdata = $model->join();
        $data = array(
            'title'     => 'Data Pasien',
            'content'   => 'pasien',
            'pasien'    => $getdata);
        return view('layout/wrapper', $data);
    }

    public function tambahPasien()
    {
        $model = new \App\Models\pembayaranModel();
        $model1 = new \App\Models\pasienModel();
        $getdata = $model1->join();
        $get = $model->findAll();
        $data = array(
            'title'     => 'Tambah Pasien',
            'content'   => 'pages/tambahpasien',
            'byr'       =>  $get,
            'psn'       => $getdata);
        return view('layout/wrapper', $data);
    }
    
    public function add()
    {
    $validation = \Config\Services::validation();
    $rules = [
        'namapasien' => 'required',
        'alamat' => 'required',
        'pembayaran' => 'required',
        'nohp' => 'required',
        'nik' => 'required|max_length[16]|min_length[16]|numeric'
    ];

    $messages = [
        'namapasien' => [
            'required' => 'Nama Pasien Harus Diisi.'
        ],
        'alamat' => [
            'required' => 'Alamat Harus Diisi.',
        ],
        'nohp' => [
            'required' => 'No Hp Harus Diisi.',
        ],
        'pembayaran' => [
            'required' => 'Metode Harus Diisi.',
        ],
        'nik' => [
            'required' => 'nomor nik Harus Diisi.',
            'max_length' => 'Maksimal input nik 16 nomor',
            'min_length' => 'Minimal input nik 16 nomor',
            'numeric' => 'Nik tidak boleh ada huruf, Harus Berupa Angka.',
        ],
    ];

    if ($this->validate($rules, $messages)) {
        $data = array(
            'id_pembayaran' => $this->request->getPost('pembayaran'),
            'nama_pasien' => $this->request->getPost('namapasien'),
            'nik' => $this->request->getPost('nik'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp'),
            'jenis_kelamin' => $this->request->getPost('jenis'),
        );

        $model = new \App\Models\pasienModel();
        $model->tambah($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/pasien');
    } else {
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->back()->withInput();
    }
}


    public function editPasien($pasienid = null)
    {
        $model = new \App\Models\pasienModel();
        $byrModel = new \App\Models\pembayaranModel();
        $get = $model->find($pasienid);
        $byr = $byrModel->findAll();
        if(is_object($get)){
        $data = array(
            'title'     => 'Edit Pasien',
            'content'   => 'pages/editpasien',
            'psn'       =>  $get,
            'byr'       =>  $byr);
        return view('layout/wrapper', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); //jika id pasien tidak ditemkukan tampil halaman 404
        }
    }

    public function edit($id)
    {
        $validation = \Config\Services::validation();
        $rules = [
            'namapasien' => 'required',
            'alamat' => 'required',
            'pembayaran' => 'required',
            'nohp' => 'required'
        ];
        $messages = [
            'namapasien' => [
                'required' => 'Nama Pasien Harus Diisi.'
            ],
            'alamat' => [
                'required' => 'Alamat Harus Diisi.',
            ],
            'nohp' => [
                'required' => 'No Hp Harus Diisi.',
            ],
            'pembayaran' => [
                'required' => 'Metode Harus Diisi.',
            ],
        ];
        if ($this->validate($rules, $messages)) {
            $data = array(
                'id_pembayaran' => $this->request->getPost('pembayaran'),
                'nama_pasien' => $this->request->getPost('namapasien'),
                'alamat' => $this->request->getPost('alamat'),
                'nohp' => $this->request->getPost('nohp'),
                'jenis_kelamin' => $this->request->getPost('jenis'),
            );
            $model = new \App\Models\pasienModel();
            $model->edit($id,$data);
            session()->setFlashdata('success', 'data berhasil diupdate.');
            return redirect()->to('pasien');
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $model = new \App\Models\pasienModel();
        $model->hapus($id);
        return redirect()->to('pasien');
        session()->setFlashdata('success', 'data berhasil dihapus.');
    }

    public function printPdf()
    {
        $model = new \App\Models\PasienModel();
        $dataPasien = $model->join(); 

        $pdf = new \TCPDF();
        $pdf->AddPage('L', 'A4');
        $pdf->SetFont('', 'B', 14);
        // $image_file = FCPATH . 'public/images/logo.png'; 
        // $pdf->Image($image_file, 15, 10, 30); 
        $pdf->Ln(10);   
        $pdf->Cell(0, 10, "DAFTAR PASIEN RS TUGU IBU", 0, 1, 'C');
        $pdf->Ln(10);   
        // Tabel Header
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(20, 8, "No", 1, 0, 'C',);
        $pdf->Cell(40, 8, "Nama Pasien", 1, 0, 'C');
        $pdf->Cell(50, 8, "NIK", 1, 0, 'C');
        $pdf->Cell(30, 8, "Jenis Kelamin", 1, 0, 'C');
        $pdf->Cell(65, 8, "Alamat", 1, 0, 'C');
        $pdf->Cell(35, 8, "Nomor Telepon", 1, 0, 'C');
        $pdf->Cell(40, 8, "Tanggal Berobat", 1, 1, 'C');
        // Tabel Content
        $pdf->SetFont('', '', 12);
        $no = 0;
        foreach ($dataPasien as $pasien) {
            $no++;
            $pdf->Cell(20, 8, $no, 1, 0, 'C');
            $pdf->Cell(40, 8, $pasien->nama_pasien, 1, 0);
            $pdf->Cell(50, 8, $pasien->nik, 1, 0);
            $pdf->Cell(30, 8, $pasien->jenis_kelamin, 1, 0);
            $pdf->Cell(65, 8, $pasien->alamat, 1, 0);
            $pdf->Cell(35, 8, $pasien->nohp, 1, 0);
            $pdf->Cell(40, 8, date('d/m/Y', strtotime($pasien->tgl_berobat)), 1, 1, 'C');
        }
        // Output PDF
        $pdf->SetFont('', 'B', 10);
        $pdf->Ln(10);
        $pdf->Cell(0, 10, "Laporan PDF", 0, 1, 'L');
        $this->response->setContentType('application/pdf');
        $pdf->Output('Data-Pasien.pdf', 'I'); 
    }
    }

