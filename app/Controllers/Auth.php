<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Login'
        );
        return view('login', $data);
    }

    public function login()
    {
        if ($this->validate([
            'useremail' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi Tidak Boleh kosong']
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => ['required' => '{field} Wajib Diisi Tidak Boleh kosong']
            ],
        ])) {
            $email = $this->request->getPost('useremail');
            $password = $this->request->getPost('password');
            $model = new \App\Models\UserModel();
            $cek = $model->getData($email, $password);

            if ($cek) {
                session()->set('logged', TRUE);
                session()->set('username', $cek['username']);
                session()->set('useremail', $cek['useremail']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);
                return redirect()->to('dashboard');
            } else {
                session()->setFlashdata('msg', 'Selamat Datang, ', ['username']);
                session()->setFlashdata('error', 'Username atau password tidak sesuai.');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('useremail', 'Email Harus Diisi.');
            session()->setFlashdata('password', 'Password Harus Diisi.');
            return redirect()->to('/'); // Jika validasi gagal, langsung redirect ke halaman login
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); //menghapus session
        return redirect()->to('/');
    }

    public function register()
    {
        session();
        $data = array(
            'title' => 'register',
            'validation' => \Config\Services::validation()
        );
        return view('register', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'username' => 'required',
            'email' => 'required|valid_email|is_unique[user.useremail]',
            'password' => 'required|min_length[5]',
            'confirmpass' => 'required|matches[password]'
        ];
        $messages = [
            'confirmpass' => [
                'matches' => 'Confirm Password dan Password Harus Sesuai.',
                'required' => 'Confirm Password Harus Diisi.'
            ],
            'username' => [
                'required' => 'Username Harus Diisi.',
            ],
            'email' => [
                'required' => 'Email Harus Diisi.',
                'is_unique' => 'Alamat email sudah digunakan. Silakan gunakan alamat email lain.'
            ],
            'password' => [
                'required' => 'Password Harus Diisi.',
                'min_length' => 'Password setidaknya berisi 5 karakter.'
            ],
        ];

        if ($this->validate($rules, $messages)) {
            $data = array(
                'username' => $this->request->getPost('username'),
                'useremail' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'level' => 3
            );
            $model = new \App\Models\UserModel();
            $model->saveData($data);
            session()->setFlashdata('success', 'data berhasil ditambahkan.');
            return redirect()->to('register');
        } else {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }
    }
}
