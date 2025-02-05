<?php 
namespace App\Controllers;

use App\Models\jenisSuratModel;
use Ramsey\Uuid\Uuid;

class Jenis_surat extends BaseController
{
    public function index() // menampilkan data jenis surat
    {
        $jenisSuratModel = new jenisSuratModel(); // membuat objek model jenis surat
        $data['jenis_surat'] = $jenisSuratModel->findAll(); // mengambil semua data jenis surat
        $data['title'] = 'Jenis Surat'; // set judul halaman
        $data['active'] = 'jenis_surat'; // set active menu 
        $data['validation'] = \Config\Services::validation(); // set validasi
         
        return view('Admin/jenis_surat/index', $data); // tampilkan view jenis surat
    }

    public function tambah() // menampilkan form tambah jenis surat
    {
        $data['title'] = 'Tambah Jenis Surat'; // untuk set judul halaman
         $data['active'] = 'jenis_surat';  // set active menu
        $data['validation'] = \Config\Services::validation(); // set validasi

        return view('Admin/jenis_surat/tambah', $data); // tampilkan view tambah jenis surat
    }

    public function save() // menyimpan data jenis surat
    {
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $validation = \Config\Services::validation(); // membuat objek validasi
        $validation->setRules([ // set rules validasi
            'nama_jenis_surat' => 'required|is_unique[jenis_surat.nama_jenis_surat]', // nama jenis surat wajib diisi dan harus unik
            'kode_surat' => 'required', // kode surat wajib diisi 
            'ket_jenis_surat' => 'required', // keterangan jenis surat wajib diisi
            'template_jenis_surat' => 'required' // template jenis surat wajib diisi
        ]);
        if (!$validation->run($this->request->getPost())) { // jika validasi tidak terpenuhi
            // session()->setFlashdata('errors', $validation->getErrors()); 
            session()->setFlashdata('errors', 'Data Jenis Surat gagal ditambahkan'); // set flashdata error
            return redirect()->to('/Jenis_surat/Tambah'); // redirect ke halaman tambah jenis surat
        }
        $data = [
            'id_jenis_surat' => Uuid::uuid4()->toString(), // generate id jenis surat
            'nama_jenis_surat' => $this->request->getPost('nama_jenis_surat'), // mengambil data nama jenis surat
            'kode_surat' => $this->request->getPost('kode_surat'), // mengambil data kode surat
            'ket_jenis_surat' => $this->request->getPost('ket_jenis_surat'), // mengambil data keterangan jenis surat
            'template_jenis_surat' => $this->request->getPost('template_jenis_surat'),    // mengambil data template jenis surat
            'created_at' => date('Y-m-d H:i:s') // mengambil data template jenis surat
        ];
        $model->insert($data); // insert data jenis surat
        session()->setFlashdata('success', 'Data Jenis Surat berhasil ditambahkan'); // set flashdata success
        return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
    }

    public function edit($id) // menampilkan form edit jenis surat
    {
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $data['jenis_surat'] = $model->find($id); // mengambil data jenis surat berdasarkan id
        $data['title'] = 'Edit Jenis Surat'; // set judul halaman
        $data['active'] = 'jenis_surat'; // set active menu

        
        return view('Admin/jenis_surat/edit', $data); // tampilkan view edit jenis surat
    }
 
    public function update() // mengupdate data jenis surat
    {
        $id = $this->request->getPost('id_jenis_surat'); // mengambil data id jenis surat
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $validation = \Config\Services::validation(); // membuat objek validasi
        $validation->setRules([ // set rules validasi
            'nama_jenis_surat' => 'required', // nama jenis surat wajib diisi
            'kode_surat' => 'required', // kode surat wajib diisi
            'ket_jenis_surat' => 'required', // keterangan jenis surat wajib diisi
            'template_jenis_surat' => 'required' // template jenis surat wajib diisi
        ]);
        if (!$validation->run($this->request->getPost())) { // jika validasi tidak terpenuhi 
            // session()->setFlashdata('errors', $validation->getErrors()); 
            session()->setFlashdata('errors', 'Data Jenis Surat gagal diubah'); // set flashdata error
            return redirect()->to('/Jenis_surat/edit/' . $id); // redirect ke halaman edit jenis surat
        }
        $data = [  // set data jenis surat
            'nama_jenis_surat' => $this->request->getPost('nama_jenis_surat'), // mengambil data nama jenis surat
            'kode_surat' => $this->request->getPost('kode_surat'), // mengambil data kode surat
            'ket_jenis_surat' => $this->request->getPost('ket_jenis_surat'), // mengambil data keterangan jenis surat
            'template_jenis_surat' => $this->request->getPost('template_jenis_surat'), // mengambil data template jenis surat
            'updated_at' => date('Y-m-d H:i:s') // mengambil data template jenis surat
        ];
        $model->update($id, $data); // update data jenis surat
        session()->setFlashdata('success', 'Data Jenis Surat berhasil diubah'); // set flashdata success
        return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
    }

    public function delete($id) // menghapus data jenis surat
    {
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $model->delete($id); // hapus data jenis surat
        session()->setFlashdata('success', 'Data Jenis Surat berhasil dihapus'); // set flashdata success
        return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
    }
    
}
?>