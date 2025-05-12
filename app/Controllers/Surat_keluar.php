<?php 
namespace App\Controllers;

use App\Models\suratKeluarModel;
use App\Models\usersModel;
use App\Models\jenisSuratModel;
use App\Models\detailJenisSuratModel;
use App\Models\externalModel;
use Ramsey\Uuid\Uuid;

class Surat_keluar extends BaseController
{ 
    public function index() // menampilkan data surat keluar
    { 
        $suratKeluarModel = new suratKeluarModel(); // membuat objek model surat keluar
        $data['surat_keluar'] = $suratKeluarModel->getSuratkeluar(); // mengambil semua data surat keluar
        $data['title'] = 'Surat keluar'; // set judul halaman 
        $data['active'] = 'surat_keluar'; // set active menu
        $data['validation'] = \Config\Services::validation(); // set validasi
        
        return view('Admin/surat_keluar/index', $data); // tampilkan view surat keluar
    }

    public function tambah() // menampilkan form tambah surat keluar
    { 
        $jenisSuratModel = new jenisSuratModel(); // membuat objek model jenis surat
        $detailJenisSuratModel = new detailJenisSuratModel(); // membuat objek model detail jenis surat
        if($this->request->getPost('id_jenis_surat_keluar')){
            $id_jenis_surat_keluar = $this->request->getPost('id_jenis_surat_keluar'); // mengambil id jenis surat keluar
            $jenis_surat_keluar = $jenisSuratModel->find($id_jenis_surat_keluar); // mengambil data jenis surat keluar berdasarkan id
            $dataDetailJenisSurat = $detailJenisSuratModel->geDetailByJenisSurat($id_jenis_surat_keluar); // mengambil data detail jenis surat keluar berdasarkan id
        
        }else{
            $id_jenis_surat_keluar = ''; // set id jenis surat keluar
            $jenis_surat_keluar = ''; // set jenis surat keluar
            $dataDetailJenisSurat = ''; // set data detail jenis surat keluar
        }
        $pegawaiModel = new jenissuratModel(); // membuat objek model jenis surat
        $data['title'] = 'Tambah Surat keluar'; // untuk set judul halaman
        $data['active'] = 'surat_keluar'; // set active menu  
        $data['jenis_surat'] = $jenisSuratModel->findAll(); // mengambil semua data jenis surat yang statusnya aktif
        $data['jenis_surat_keluar'] = $jenis_surat_keluar; // set jenis surat keluar
        $data['dataDetailJenisSurat'] = $dataDetailJenisSurat; // set data detail jenis surat keluar
        $data['id_jenis_surat_keluar'] = $id_jenis_surat_keluar; // set id jenis surat keluar
        $data['validation'] = \Config\Services::validation(); // set validasi
        $data['pegawai'] = $pegawaiModel->where('status_pegawai', '1')->findAll(); // mengambil semua data pegawai yang statusnya aktif

        return view('Admin/surat_keluar/tambah', $data); // tampilkan view tambah surat keluar
    }

    public function save() // menyimpan data surat keluar
    {
        $model = new suratKeluarModel(); // membuat objek model surat keluar
        $disposisiModel = new disposisiModel(); // membuat objek model disposisi
        $validation = \Config\Services::validation(); // membuat objek validasi
        // dd($this->request->getPost());
        $validation->setRules([ // set rules validasi
            'pengirim_surat_keluar' => 'required',
            'perihal_surat_keluar' => 'required',
            'no_surat_keluar' => 'required',
            'tgl_surat_keluar' => 'required',
            'ket_surat_keluar' => 'required',
            'tipe_file_surat_keluar' => 'required',
            'file_surat_keluar' => 'uploaded[file_surat_keluar]|ext_in[file_surat_keluar,pdf,doc,docx,jpg,jpeg,png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) { // jika validasi tidak terpenuhi
            session()->setFlashdata('errors', $validation->getErrors()); // set flashdata error
            return redirect()->to('/Surat_keluar/tambah')->withInput(); // redirect ke halaman tambah surat keluar
        }
        // upload file surat 
        $fileSurat = $this->request->getFile('file_surat_keluar'); // mengambil file surat
        $newName = $fileSurat->getRandomName(); // generate nama file random
        $fileSurat->move('Assets/file_surat_keluar', $newName); // pindahkan file surat ke folder file_surat_keluar
        $id_surat_keluar = 'SM-' . date('YmdHis') . '-' . rand(10, 100); // generate id surat keluar
        $model->insert([ // insert data surat keluar
            'id_surat_keluar' => $id_surat_keluar, // set id surat keluar
            'pengirim_surat_keluar' => $this->request->getPost('pengirim_surat_keluar'), // mengambil data pengirim surat
            'perihal_surat_keluar' => $this->request->getPost('perihal_surat_keluar'), // mengambil data perihal surat
            'no_surat_keluar' => $this->request->getPost('no_surat_keluar'), // mengambil data no surat
            'tgl_surat_keluar' => $this->request->getPost('tgl_surat_keluar'), // mengambil data tanggal surat
            'ket_surat_keluar' => $this->request->getPost('ket_surat_keluar'), // mengambil data keterangan surat
            'tipe_file_surat_keluar' => $this->request->getPost('tipe_file_surat_keluar'), // mengambil data tipe file surat
            'file_surat_keluar' => $newName, // set nama file surat
            'created_at' => date('Y-m-d H:i:s') // set tanggal dibuat
        ]);

        // jika ada id pegawai yang dipilih
        if ($this->request->getPost('id_pegawai')) {
            $id_pegawai = $this->request->getPost('id_pegawai'); // mengambil id pegawai
            $ket_disposisi = $this->request->getPost('ket_disposisi'); // mengambil keterangan disposisi
            
            foreach ($id_pegawai as $key => $value) { // loop data pegawai
                $disposisiModel->insert([ // insert data disposisi
                    'id_disposisi' => 'DISPO-' . date('YmdHis') . '-' . rand(10, 100), // generate id disposisi
                    'id_surat_keluar' => $id_surat_keluar, // set id surat keluar 
                    'id_pegawai' => $value, // set id pegawai
                    'status_disposisi' => '0', // set status disposisi
                    'ket_disposisi' => $ket_disposisi[$key], // set keterangan disposisi
                    'created_at' => date('Y-m-d H:i:s') // set tanggal dibuat
                ]);
            }
        }
        
        session()->setFlashdata('success', 'Data Surat keluar berhasil ditambahkan'); // set flashdata success
        return redirect()->to('/surat_keluar'); // redirect ke halaman surat keluar
    }

    public function edit($id) // menampilkan form edit surat keluar
    {
        $model = new suratKeluarModel(); // membuat objek model surat keluar
        $disposisiModel = new disposisiModel(); // membuat objek model disposisi
        $pegawaiModel = new pegawaiModel(); // membuat objek model pegawai
        $data['title'] = 'Edit Surat keluar'; // set judul halaman
        $data['surat_keluar'] = $model->find($id); // mengambil data surat keluar berdasarkan id
        $data['pegawai'] = $pegawaiModel->where('status_pegawai', '1')->findAll(); // mengambil semua data pegawai yang statusnya aktif
        $data['disposisi'] = $disposisiModel->getDisposisiBySurat($id); // mengambil data disposisi berdasarkan id surat keluar
        $data['active'] = 'surat_keluar'; // set active menu
        $data['validation'] = \Config\Services::validation(); // set validasi
        // dd($data);
        return view('Admin/surat_keluar/edit', $data); // tampilkan view edit surat keluar
    }
    
    public function update()
    {
        $model = new suratKeluarModel(); // membuat objek model surat keluar
        $disposisiModel = new disposisiModel(); // membuat objek model disposisi
        $validation = \Config\Services::validation(); // membuat objek validasi
        // dd($this->request->getPost());
        $validation->setRules([ // set rules validasi
            'pengirim_surat_keluar' => 'required',
            'perihal_surat_keluar' => 'required',
            'no_surat_keluar' => 'required',
            'tgl_surat_keluar' => 'required',
            'ket_surat_keluar' => 'required',
            'tipe_file_surat_keluar' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) { // jika validasi tidak terpenuhi
            session()->setFlashdata('errors', $validation->getErrors()); // set flashdata error
            return redirect()->to('/Surat_keluar/tambah')->withInput(); // redirect ke halaman tambah surat keluar
        }
        $id_surat_keluar = $this->request->getPost('id_surat_keluar'); // mengambil id surat keluar
        $dataSurat = $model->find($id_surat_keluar); // mengambil data surat keluar berdasarkan id
        // upload file surat 
        $fileSurat = $this->request->getFile('file_surat_keluar'); // mengambil file surat
        // jika tidak ada file surat yang diupload
        if ($fileSurat->getError() == 4) {
            $newName = $dataSurat['file_surat_keluar']; // set nama file surat
        } else {
            if ($dataSurat['file_surat_keluar']) {
                unlink('Assets/file_surat_keluar/' . $dataSurat['file_surat_keluar']); // hapus file surat lama
            }
            $newName = $fileSurat->getRandomName(); // generate nama file random
            $fileSurat->move('Assets/file_surat_keluar', $newName); // pindahkan file surat ke folder file_surat_keluar
        }
        $model->update($id_surat_keluar, [ // update data surat keluar
            'pengirim_surat_keluar' => $this->request->getPost('pengirim_surat_keluar'), // mengambil data pengirim surat
            'perihal_surat_keluar' => $this->request->getPost('perihal_surat_keluar'), // mengambil data perihal surat
            'no_surat_keluar' => $this->request->getPost('no_surat_keluar'), // mengambil data no surat
            'tgl_surat_keluar' => $this->request->getPost('tgl_surat_keluar'), // mengambil data tanggal surat
            'ket_surat_keluar' => $this->request->getPost('ket_surat_keluar'), // mengambil data keterangan surat
            'tipe_file_surat_keluar' => $this->request->getPost('tipe_file_surat_keluar'), // mengambil data tipe file surat
            'file_surat_keluar' => $newName, // set nama file surat
            'created_at' => date('Y-m-d H:i:s') // set tanggal dibuat
        ]);
        // hapus semua data disposisi berdasarkan id surat keluar
        $disposisiModel->where('id_surat_keluar', $id_surat_keluar)->delete();
        // jika ada id pegawai yang dipilih
        if ($this->request->getPost('id_pegawai')) {
            $id_pegawai = $this->request->getPost('id_pegawai'); // mengambil id pegawai
            $ket_disposisi = $this->request->getPost('ket_disposisi'); // mengambil keterangan disposisi
            
            foreach ($id_pegawai as $key => $value) { // loop data pegawai
                $disposisiModel->insert([ // insert data disposisi
                    'id_disposisi' => 'DISPO-' . date('YmdHis') . '-' . rand(10, 100), // generate id disposisi
                    'id_surat_keluar' => $id_surat_keluar, // set id surat keluar 
                    'id_pegawai' => $value, // set id pegawai
                    'status_disposisi' => '0', // set status disposisi
                    'ket_disposisi' => $ket_disposisi[$key], // set keterangan disposisi
                    'created_at' => date('Y-m-d H:i:s') // set tanggal dibuat
                ]);
            }
        }
        
        session()->setFlashdata('success', 'Data Surat keluar berhasil diubah'); // set flashdata success
        return redirect()->to('/surat_keluar'); // redirect ke halaman surat keluar
    }


    public function detail($id) // menampilkan form edit surat keluar
    {
        $model = new suratKeluarModel(); // membuat objek model surat keluar
        $disposisiModel = new disposisiModel(); // membuat objek model disposisi
        $pegawaiModel = new pegawaiModel(); // membuat objek model pegawai
        $data['title'] = 'Edit Surat keluar'; // set judul halaman
        $data['surat_keluar'] = $model->find($id); // mengambil data surat keluar berdasarkan id
        $data['pegawai'] = $pegawaiModel->where('status_pegawai', '1')->findAll(); // mengambil semua data pegawai yang statusnya aktif
        $data['disposisi'] = $disposisiModel->getDisposisiBySurat($id); // mengambil data disposisi berdasarkan id surat keluar
        $data['active'] = 'surat_keluar'; // set active menu
        $data['validation'] = \Config\Services::validation(); // set validasi
        // dd($data);
        return view('Admin/surat_keluar/detail', $data); // tampilkan view edit surat keluar
    }

}
?>