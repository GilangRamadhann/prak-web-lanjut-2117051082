<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
                'id'=>1,
                'nama_kelas'=>'A'
            ],
            [
                'id'=>2,
                'nama_kelas'=>'B'
            ],
            [
                'id'=>3,
                'nama_kelas' =>'C',
            ],
            [
                'id'=>4,
                'nama_kelas'=>'D'
            ],
        ];
        $data=[
            'kelas'=>$kelas
        ];
        return view('create_user',$data);
    }

    public function store()
    {
        $nama = $this->request->getPost('nama');
        $kelas = $this->request->getPost('kelas');
        $npm = $this->request->getPost('npm');
        $jurusan = $this->request->getPost('jurusan');
        $angkatan = $this->request->getPost('angkatan');
        $alamat = $this->request->getPost('alamat');
        $data=[
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
            'jurusan' => $jurusan,
            'angkatan' => $angkatan,
            'alamat' => $alamat
        ];
        return view('profile', $data);
    }

}

