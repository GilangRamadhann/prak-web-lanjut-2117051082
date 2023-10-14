<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

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