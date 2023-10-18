<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

    }
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
            // 'jurusan' => $jurusan,
            // 'angkatan' => $angkatan,
            // 'alamat' => $alamat,
        ];
        return view('profile', $data);
    }
    public function create()
    {
upload-file
        // $kelas = [
        //     [
        //         'id' => 1,
        //         'nama_kelas' => 'A'
        //     ],
        //     [
        //         'id' => 2,
        //         'nama_kelas' => 'B'
        //     ],
        //     [
        //         'id' => 3,
        //         'nama_kelas' => 'C'
        //     ],
        //     [
        //         'id' => 4,
        //         'nama_kelas' => 'D'
        //     ],
        // ];

        // $data  = [
        //     'kelas' => $kelas,
        //     'validation' => \Config\Services::validation()
        // ];
        // return view('create_user', $data);

        $kelas = $this->kelasModel->getKelas();
        $data=[
            'kelas' => $kelas,
            'title' => 'upload_file',
        ];
        return view('create_user', $data);
    }

    public function store(){

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


        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
        $name = $foto->getRandomName();
        if ($foto->move($path, $name)) {
            $foto = base_url($path . $name);
        }

        // $userModel = new UserModel();
        $this->userModel->saveUser([

            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
            // 'jurusan' => $this->request->getVar('jurusan'),
            // 'angkatan' => $this->request->getVar('angkatan'),
            // 'alamat' => $this->request->getVar('alamat'),
            'foto' => $foto
        ]);
        // dd($this->request->getVar());
        $data = [
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
            // 'jurusan' => $this->request->getVar('jurusan'),
            // 'angkatan' => $this->request->getVar('angkatan'),
            // 'alamat' => $this->request->getVar('alamat'),
            'foto' => $foto
        ];
        return redirect()->to('/user');
    }

    public function show($id){
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];
        return view('profile', $data);
    }

    public function edit($id){
        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];
        return view('edit_user', $data);
    }

    public function update($id) {
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');

        $data = [
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
        ];

        if ($foto->isValid()) {
            $name = $foto->getRandomName();

            if ($foto->move($path, $name)) {
                $foto_path = base_url($path . $name);

                $data['foto'] = $foto_path;
            }
        }

        $result = $this->userModel->updateUser($data, $id);
        if(!$result) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Menyimpan Data');
        }
        return redirect()->to(base_url('/user'));
    }

    public function destroy($id)
    {
        $result = $this->userModel->deleteUser($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/user'))
            ->with('success', 'Berhasil menghapus data!');
    }
}