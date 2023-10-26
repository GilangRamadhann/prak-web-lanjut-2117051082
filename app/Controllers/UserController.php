<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;

class UserController extends BaseController{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }
    
    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }
    
    public function profile($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }

    public function create(){
        $kelas = $this->kelasModel->getKelas();
        $data  = [
            'title' => 'Create User',
            'kelas' => $kelas,
            'validation' => \Config\Services::validation()
        ];
        return view('create_user', $data);
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
            'validation' => \Config\Services::validation()

        ];
        return view('edit_user', $data);
    }

    public function update($id){
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} mahasiswa harus di isi.'
                ]
            ],
            'npm' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => '{field} mahasiswa tidak boleh kosong.',
                    'max_length[10]' => '{field} mahasiswa maksimal 10.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/user/' . $id . '/edit'))->withInput()->with('validation', $validation);
        }

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

        if (!$result) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Edit Data');
        }

        return redirect()->to(base_url('/user'));
    }

    public function destroy($id){
        $result = $this->userModel->deleteUser($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal Menghapus Data');
        }
        return redirect()->to(base_url('/user'))
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function store(){
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} mahasiswa harus di isi.'
                ]
            ],
            'npm' => [
                'rules' => 'required|is_unique[user.npm]',
                'errors' => [
                    'required' => '{field} mahasiswa tidak boleh kosong.',
                    'is_unique' => '{field} mahasiswa sudah terdaftar.'
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
        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
            'foto' => $foto
        ]);
       
        return redirect()->to(base_url('/user'));
    }
}