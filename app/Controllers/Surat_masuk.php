<?php 
namespace App\Controllers;

use App\Models\suratMasukModel;
use App\Models\usersModel;
use Ramsey\Uuid\Uuid;

class Surat_masuk extends BaseController
{ 
    public function index() // menampilkan data surat masuk
    { 
        $suratMasukModel = new suratMasukModel(); // membuat objek model surat masuk
        $data['surat_masuk'] = $suratMasukModel->getSuratMasuk(); // mengambil semua data surat masuk
        $data['title'] = 'Surat Masuk'; // set judul halaman 
        $data['active'] = 'surat_masuk'; // set active menu
        $data['validation'] = \Config\Services::validation(); // set validasi
        
        return view('Admin/surat_masuk/index', $data); // tampilkan view surat masuk
    }

    public function tambah() // menampilkan form tambah surat masuk
    { 
        $data['title'] = 'Tambah Surat Masuk'; // untuk set judul halaman
         $data['active'] = 'surat_masuk'; // set active menu  
        $data['validation'] = \Config\Services::validation(); // set validasi

        return view('Admin/surat_masuk/tambah', $data); // tampilkan view tambah surat masuk
    }

    public function save() // menyimpan data surat masuk
    {
        $model = new suratMasukModel(); // membuat objek model surat masuk
        $validation = \Config\Services::validation(); // membuat objek validasi
        // dd($this->request->getPost());
        $validation->setRules([
            'pengirim_surat_masuk' => 'required',
            'perihal_surat_masuk' => 'required',
            'no_surat_masuk' => 'required',
            'tgl_surat_masuk' => 'required',
            'ket_surat_masuk' => 'required',
            'tipe_file_surat_masuk' => 'required',
            'file_surat_masuk' => 'uploaded[file_surat_masuk]|max_size[file_surat_masuk,1024]|ext_in[file_surat_masuk,pdf,doc,docx,jpg,jpeg,png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/Surat_masuk/tambah')->withInput();
        }
        // upload file surat
        $fileSurat = $this->request->getFile('file_surat_masuk');
        $newName = $fileSurat->getRandomName();
        $fileSurat->move('Assets/file_surat_masuk', $newName);
        $model->insert([
            'id_surat_masuk' => Uuid::uuid4()->toString(),
            'pengirim_surat_masuk' => $this->request->getPost('pengirim_surat_masuk'),
            'perihal_surat_masuk' => $this->request->getPost('perihal_surat_masuk'),
            'no_surat_masuk' => $this->request->getPost('no_surat_masuk'),
            'tgl_surat_masuk' => $this->request->getPost('tgl_surat_masuk'),
            'ket_surat_masuk' => $this->request->getPost('ket_surat_masuk'),
            'tipe_file_surat_masuk' => $this->request->getPost('tipe_file_surat_masuk'),
            'file_surat_masuk' => $newName
        ]);

        session()->setFlashdata('success', 'Data Surat Masuk berhasil ditambahkan');
        return redirect()->to('/surat_masuk');
    }

    public function edit($id)
    {
        $model = new suratMasukModel();
        $data['surat_masuk'] = $model->find($id);
        $data['title'] = 'Edit Surat Masuk';
        $data['active'] = 'surat_masuk';

        return view('Admin/surat_masuk/edit', $data);
    }

    public function update()
    {
        
    }

    public function delete($id)
    {
        $model = new suratMasukModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Data Surat Masuk berhasil dihapus');
        return redirect()->to('/surat_masuk');
    }
    
}
?>