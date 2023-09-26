<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        //
    }
    public function profile($nama = "", $kelas = "", $npm = "", $jurusan = "", $angkatan = "", $alamat = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
            'jurusan' => $jurusan,
            'angkatan' => $angkatan,
            'alamat' => $alamat,
        ];
        return view('profile', $data);
    }
    public function create()
    {
        $kelas = [
            [
                'id' => 1,
                'nama_kelas' => 'A'
            ],
            [
                'id' => 2,
                'nama_kelas' => 'B'
            ],
            [
                'id' => 3,
                'nama_kelas' => 'C'
            ],
            [
                'id' => 4,
                'nama_kelas' => 'D'
            ],
        ];

        $data  = [
            'kelas' => $kelas,
            'validation' => \Config\Services::validation()
        ];
        return view('create_user', $data);
    }
    public function store()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi terlebih dahulu.'
                ]
            ],
            'npm' => [
                'rules' => 'required|is_unique[user.npm]',
                'errors' => [
                    'required' => '{field} wajib di isi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/user/create'))->withInput()->with('validation', $validation);
        }

        $userModel = new UserModel();
        $userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
            'jurusan' => $this->request->getVar('jurusan'),
            'angkatan' => $this->request->getVar('angkatan'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        // dd($this->request->getVar());
        $data = [
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
            'jurusan' => $this->request->getVar('jurusan'),
            'angkatan' => $this->request->getVar('angkatan'),
            'alamat' => $this->request->getVar('alamat'),
        ];
        return view('profile', $data);
    }
}