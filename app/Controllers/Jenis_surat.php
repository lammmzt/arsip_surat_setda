<?php 
namespace App\Controllers;

use App\Models\jenisSuratModel;
use App\Models\detailJenisSuratModel; // model untuk detail jenis surat
use App\Models\referensiJenisSuratModel; // model untuk referensi jenis surat
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
        $referensiJenisSuratModel = new referensiJenisSuratModel(); // membuat objek model referensi jenis surat
        $data['referensi'] = $referensiJenisSuratModel->where('status_referensi_jenis_surat', '1')->findAll(); // mengambil semua data referensi jenis surat yang statusnya aktif
        $data['title'] = 'Tambah Jenis Surat'; // untuk set judul halaman
        $data['active'] = 'jenis_surat';  // set active menu
        $data['validation'] = \Config\Services::validation(); // set validasi

        return view('Admin/jenis_surat/tambah', $data); // tampilkan view tambah jenis surat
    }

    public function save() // menyimpan data jenis surat
    {
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $modelDetailJenisurat = new detailJenisSuratModel(); // membuat objek model detail jenis surat
        $validation = \Config\Services::validation(); // membuat objek validasi
        $validation->setRules([ // set rules validasi
            'nama_jenis_surat' => 'required|is_unique[jenis_surat.nama_jenis_surat]', // nama jenis surat wajib diisi dan harus unik
            'kode_surat' => 'required', // kode surat wajib diisi 
            'ket_jenis_surat' => 'required', // keterangan jenis surat wajib diisi
            'template_jenis_surat' => 'required' // template jenis surat wajib diisi
        ]);
        // dd($this->request->getPost()); // untuk menampilkan data post
        if (!$validation->run($this->request->getPost())) { // jika validasi tidak terpenuhi
            // session()->setFlashdata('errors', $validation->getErrors()); 
            session()->setFlashdata('errors', 'Data Jenis Surat gagal ditambahkan'); // set flashdata error
            return redirect()->to('/Jenis_surat/Tambah'); // redirect ke halaman tambah jenis surat
        }
        $id_jenis_surat = Uuid::uuid4()->toString(); // generate id jenis surat
        $data = [
            'id_jenis_surat' => $id_jenis_surat, // set id jenis surat
            'nama_jenis_surat' => $this->request->getPost('nama_jenis_surat'), // mengambil data nama jenis surat
            'kode_surat' => $this->request->getPost('kode_surat'), // mengambil data kode surat
            'ket_jenis_surat' => $this->request->getPost('ket_jenis_surat'), // mengambil data keterangan jenis surat
            'template_jenis_surat' => $this->request->getPost('template_jenis_surat'),    // mengambil data template jenis surat
            'created_at' => date('Y-m-d H:i:s') // mengambil data template jenis surat
        ];  
        $model->insert($data); // insert data jenis surat
        $detail_jenis_surat = $this->request->getPost('detail_jenis_surat'); // mengambil data detail jenis surat
        if($detail_jenis_surat != null){ // jika data detail jenis surat tidak ada
            foreach ($detail_jenis_surat as $key => $value) { // looping data detail jenis surat
                $data_detail = [
                     'id_jenis_surat' => $id_jenis_surat, // set id jenis surat
                     'id_referensi_jenis_surat' => $value, // set id referensi jenis surat
                     'created_at' => date('Y-m-d H:i:s') // set created at
                 ];
                 $modelDetailJenisurat->save($data_detail); // insert data detail jenis surat
             }
        }
        session()->setFlashdata('success', 'Data Jenis Surat berhasil ditambahkan'); // set flashdata success
        return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
    }

    public function edit($id) // menampilkan form edit jenis surat
    {
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $detailJenisuratModel = new detailJenisSuratModel(); // membuat objek model detail jenis surat
        $referensiJenisSuratModel = new referensiJenisSuratModel(); // membuat objek model referensi jenis surat
        $datadetail_jenis_surat = $detailJenisuratModel->geDetailByJenisSurat($id); // mengambil data detail jenis surat berdasarkan id
        // dd($datadetail_jenis_surat);
        if($datadetail_jenis_surat != null){ // jika data detail jenis surat tidak ada
            $data['detail_jenis_surat'] = array_map(function($item) {
                return $item['id_referensi_jenis_surat'];
            }, $datadetail_jenis_surat);
        }else{
            $data['detail_jenis_surat'] = [];
        }
        
        $data['referensi_jenis_surat'] = $referensiJenisSuratModel->where('status_referensi_jenis_surat', '1')->findAll(); // mengambil semua data referensi jenis surat yang statusnya aktif
        $data['jenis_surat'] = $model->find($id); // mengambil data jenis surat berdasarkan id
        $data['title'] = 'Edit Jenis Surat'; // set judul halaman
        $data['active'] = 'jenis_surat'; // set active menu

        // dd($data);
        return view('Admin/jenis_surat/edit', $data); // tampilkan view edit jenis surat
    }
 
    public function update() // mengupdate data jenis surat
    {
        $id = $this->request->getPost('id_jenis_surat'); // mengambil data id jenis surat
        $modelDetailJenisurat = new detailJenisSuratModel(); // membuat objek model detail jenis surat
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $data_jenis_surat = $model->find($id); // mengambil data jenis surat berdasarkan id
        if ($data_jenis_surat == null) { // jika data jenis surat tidak ada
            session()->setFlashdata('errors', 'Data Jenis Surat tidak ditemukan'); // set flashdata error
            return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
        }
        // check jika nama jenis surat yang diinputkan sama dengan nama jenis surat yang sudah ada
        if ($this->request->getPost('nama_jenis_surat') == $data_jenis_surat['nama_jenis_surat']) { // jika nama jenis surat sama
            $rule_nama_jenis_surat = 'required'; // set rule nama jenis surat wajib diisi
        } else {
            $rule_nama_jenis_surat = 'required|is_unique[jenis_surat.nama_jenis_surat]'; // set rule nama jenis surat wajib diisi dan harus unik
        }
        $validation = \Config\Services::validation(); // membuat objek validasi
        $validation->setRules([ // set rules validasi
            'nama_jenis_surat' => $rule_nama_jenis_surat, // nama jenis surat wajib diisi dan harus unik
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
        $detail_jenis_surat = $this->request->getPost('detail_jenis_surat'); // mengambil data detail jenis surat
        // dd($detail_jenis_surat);
        $data_detail_jenis_surat = $modelDetailJenisurat->where('id_jenis_surat', $id)->findAll(); // mengambil data detail jenis surat berdasarkan id
        if($data_detail_jenis_surat != null){ // jika data detail jenis surat tidak ada
            // hapus semua data detail jenis surat berdasarkan id jenis surat
            foreach ($data_detail_jenis_surat as $key => $value) { // looping data detail jenis surat
                $modelDetailJenisurat->delete($value['id_detail_jenis_surat']); // hapus data detail jenis surat
            }
        }
        if($detail_jenis_surat != null){ // jika data detail jenis surat tidak ada
            foreach ($detail_jenis_surat as $key => $value) { // looping data detail jenis surat
                $data_detail = [
                     'id_jenis_surat' => $this->request->getPost('id_jenis_surat'), // set id jenis surat
                     'id_referensi_jenis_surat' => $value, // set id referensi jenis surat
                     'created_at' => date('Y-m-d H:i:s') // set created at
                 ];
                 $modelDetailJenisurat->save($data_detail); // insert data detail jenis surat
             }
        }
        session()->setFlashdata('success', 'Data Jenis Surat berhasil diubah'); // set flashdata success
        return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
    }

    public function Duplicated($id_jenis_surat){ // Menggandakan data jenis surat
       
        $modelDetailJenisurat = new detailJenisSuratModel(); // membuat objek model detail jenis surat
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $data_jenis_surat = $model->find($id_jenis_surat); // mengambil data jenis surat berdasarkan id
        $id_jenis_surat_baru = Uuid::uuid4()->toString(); // generate id jenis surat
        $data = [  // set data jenis surat
            'id_jenis_surat' => $id_jenis_surat_baru, // set id jenis surat
            'nama_jenis_surat' => $data_jenis_surat['nama_jenis_surat'] .' (Copy)', // mengambil data nama jenis surat
            'kode_surat' => $data_jenis_surat['kode_surat'], // mengambil data kode surat
            'kode_surat' => $data_jenis_surat['kode_surat'], // mengambil data kode surat
            'ket_jenis_surat' => $data_jenis_surat['ket_jenis_surat'], // mengambil data keterangan jenis surat
            'template_jenis_surat' => $data_jenis_surat['template_jenis_surat'], // mengambil data template jenis surat
            'updated_at' => date('Y-m-d H:i:s') // mengambil data template jenis surat
        ];
        $model->insert($data); // insert data jenis surat
        // dd($detail_jenis_surat);
        $data_detail_jenis_surat = $modelDetailJenisurat->where('id_jenis_surat', $id_jenis_surat)->findAll(); // mengambil data detail jenis surat berdasarkan id
        if($data_detail_jenis_surat != null){ // jika data detail jenis surat tidak ada
            // hapus semua data detail jenis surat berdasarkan id jenis surat
            foreach ($data_detail_jenis_surat as $key => $value) { // looping data detail jenis surat
                $data_detail = [
                     'id_jenis_surat' => $id_jenis_surat_baru, // set id jenis surat
                     'id_referensi_jenis_surat' => $value['id_referensi_jenis_surat'], // set id referensi jenis surat
                     'created_at' => date('Y-m-d H:i:s') // set created at
                 ];
                 $modelDetailJenisurat->save($data_detail); // insert data detail jenis surat
            }
        }
        
        session()->setFlashdata('success', 'Data Jenis Surat berhasil digandakan'); // set flashdata success
        return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
    }

    public function delete($id) // menghapus data jenis surat
    {
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $model->delete($id); // hapus data jenis surat
        session()->setFlashdata('success', 'Data Jenis Surat berhasil dihapus'); // set flashdata success
        return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
    }

    public function ubahStatus($id) // mengubah status data jenis surat
    {
        $model = new jenisSuratModel(); // membuat objek model jenis surat
        $data_jenis_surat = $model->find($id); // mengambil data jenis surat berdasarkan id
        if($data_jenis_surat == null){ // jika data jenis surat tidak ada
            session()->setFlashdata('errors', 'Data Jenis Surat tidak ditemukan'); // set flashdata error
            return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
        }
        $data = [ // set data jenis surat
            'status_jenis_surat' => $data_jenis_surat['status_jenis_surat'] == '1' ? '0' : '1', // jika status jenis surat 1 maka ubah menjadi 0, jika tidak maka ubah menjadi 1
            'updated_at' => date('Y-m-d H:i:s') // mengambil data template jenis surat
        ];
        $model->update($id, $data); // update data jenis surat
        session()->setFlashdata('success', 'Data Jenis Surat berhasil diubah'); // set flashdata success
        return redirect()->to('/Jenis_surat'); // redirect ke halaman jenis surat
    }
    
    public function Referensi() // menampilkan data referensi jenis surat
    {
        $model = new referensiJenisSuratModel(); // membuat objek model referensi jenis surat
        $data['referensi'] = $model->getRefereni(); // mengambil semua data jenis surat
        $data['title'] = 'Referensi Jenis Surat'; // set judul halaman
        $data['active'] = 'referensi_jenis_surat'; // set active menu
        $data['validation'] = \Config\Services::validation(); // set validasi

        return view('Admin/jenis_surat/Referensi/index', $data); // tampilkan view referensi jenis surat
    }

    public function saveReferensi(){
        // dd($this->request->getPost()); // untuk menampilkan data post
        $model = new referensiJenisSuratModel(); // membuat objek model referensi jenis surat
        $validation = \Config\Services::validation(); // membuat objek validasi
        $validation->setRules([ // set rules validasi
            'kode_referensi_jenis_surat' => 'required|is_unique[referensi_jenis_surat.kode_referensi_jenis_surat]', // id referensi jenis surat wajib diisi dan harus unik
            'nama_referensi_jenis_surat' => 'required|is_unique[referensi_jenis_surat.nama_referensi_jenis_surat]', // nama referensi jenis surat wajib diisi dan harus unik
            'ket_referensi_jenis_surat' => 'required' // keterangan referensi jenis surat wajib diisi
        ]);
        if (!$validation->run($this->request->getPost())) { // jika validasi tidak terpenuhi
            session()->setFlashdata('errors', 'Data Referensi Jenis Surat gagal ditambahkan'); // set flashdata error
            return redirect()->to('/Jenis_surat/Referensi')->withInput(); // redirect ke halaman referensi jenis surat
        }
        $data = [  // set data referensi jenis surat
            'kode_referensi_jenis_surat' => $this->request->getPost('kode_referensi_jenis_surat'), // set id referensi jenis surat
            'nama_referensi_jenis_surat' => $this->request->getPost('nama_referensi_jenis_surat'), // mengambil data nama referensi jenis surat
            'tipe_referensi_jenis_surat' => $this->request->getPost('tipe_referensi_jenis_surat'), // mengambil data tipe referensi jenis surat
            'ket_referensi_jenis_surat' => $this->request->getPost('ket_referensi_jenis_surat'), // mengambil data keterangan referensi jenis surat
            'created_at' => date('Y-m-d H:i:s') // mengambil data template jenis surat
        ];
        $model->save($data); // insert data referensi jenis surat
        session()->setFlashdata('success', 'Data Referensi Jenis Surat berhasil ditambahkan'); // set flashdata success
        return redirect()->to('/Jenis_surat/Referensi'); // redirect ke halaman referensi jenis surat
    }

    public function updateReferensi() // mengupdate data referensi jenis surat
    {
        $model = new referensiJenisSuratModel(); // membuat objek model referensi jenis surat
        $validation = \Config\Services::validation(); // membuat objek validasi
        
        $id_referensi_jenis_surat = $this->request->getPost('id_referensi_jenis_surat'); // mengambil data id referensi jenis surat
        $data_referensi = $model->getRefereni($id_referensi_jenis_surat); // mengambil data referensi jenis surat berdasarkan id
        if ($this->request->getPost('kode_referensi_jenis_surat') == $data_referensi['kode_referensi_jenis_surat']) { // jika id referensi jenis surat sama
            $rule_kode_referensi_jenis_surat = 'required'; // set rule id referensi jenis surat wajib diisi
        } else {
            $rule_kode_referensi_jenis_surat = 'required|is_unique[referensi_jenis_surat.kode_referensi_jenis_surat]'; // set rule id referensi jenis surat wajib diisi dan harus unik
        }
        if ($this->request->getPost('nama_referensi_jenis_surat') == $data_referensi['nama_referensi_jenis_surat']) { // jika nama referensi jenis surat sama
            $rule_nama_referensi_jenis_surat = 'required'; // set rule nama referensi jenis surat wajib diisi
        } else {
            $rule_nama_referensi_jenis_surat = 'required|is_unique[referensi_jenis_surat.nama_referensi_jenis_surat]'; // set rule nama referensi jenis surat wajib diisi dan harus unik
        }
        $validation->setRules([ // set rules validasi
            'kode_referensi_jenis_surat' => $rule_kode_referensi_jenis_surat, // id referensi jenis surat wajib diisi dan harus unik
            'nama_referensi_jenis_surat' => $rule_nama_referensi_jenis_surat, // nama referensi jenis surat wajib diisi dan harus unik
            'ket_referensi_jenis_surat' => 'required' // keterangan referensi jenis surat wajib diisi
        ]);
        if (!$validation->run($this->request->getPost())) { // jika validasi tidak terpenuhi 
            session()->setFlashdata('errors', 'Data Referensi Jenis Surat gagal diubah'); // set flashdata error
            return redirect()->to('/Jenis_surat/Referensi')->withInput(); // redirect ke halaman referensi jenis surat
        }
        $data = [  // set data referensi jenis surat
            'kode_referensi_jenis_surat' => $this->request->getPost('kode_referensi_jenis_surat'), // set id referensi jenis surat
            'nama_referensi_jenis_surat' => $this->request->getPost('nama_referensi_jenis_surat'), // mengambil data nama referensi jenis surat
            'tipe_referensi_jenis_surat' => $this->request->getPost('tipe_referensi_jenis_surat'), // mengambil data tipe referensi jenis surat
            'ket_referensi_jenis_surat' => $this->request->getPost('ket_referensi_jenis_surat'), // mengambil data keterangan referensi jenis surat
            'updated_at' => date('Y-m-d H:i:s') // mengambil data template jenis surat
        ];
        $model->update($id_referensi_jenis_surat, $data); // update data referensi jenis surat
        session()->setFlashdata('success', 'Data Referensi Jenis Surat berhasil diubah'); // set flashdata success
        return redirect()->to('/Jenis_surat/Referensi'); // redirect ke halaman referensi jenis surat
    }

    public function deleteReferensi($id) // menghapus data referensi jenis surat
    {
        $model = new referensiJenisSuratModel(); // membuat objek model referensi jenis surat
        $model->delete($id); // hapus data referensi jenis surat
        session()->setFlashdata('success', 'Data Referensi Jenis Surat berhasil dihapus'); // set flashdata success
        return redirect()->to('/Jenis_surat/Referensi'); // redirect ke halaman referensi jenis surat
    }

    public function ubahStatusReferensi($id) // menghapus data referensi jenis surat
    {
        $model = new referensiJenisSuratModel(); // membuat objek model referensi jenis surat
        $data_referensi = $model->getRefereni($id); // mengambil data referensi jenis surat berdasarkan id
        if($data_referensi == null){ // jika data referensi jenis surat tidak ada
            session()->setFlashdata('errors', 'Data Referensi Jenis Surat tidak ditemukan'); // set flashdata error
            return redirect()->to('/Jenis_surat/Referensi'); // redirect ke halaman referensi jenis surat
        }
        $data = [ // set data referensi jenis surat
            'status_referensi_jenis_surat' => $data_referensi['status_referensi_jenis_surat'] == '1' ? '0' : '1', // jika status referensi jenis surat 1 maka ubah menjadi 0, jika tidak maka ubah menjadi 1
            'updated_at' => date('Y-m-d H:i:s') // mengambil data template jenis surat
        ];
        // dd($data);
        $model->update($id, $data); // update data referensi jenis surat
         // dd($data);
        session()->setFlashdata('success', 'Data Referensi Jenis Surat berhasil diubah'); // set flashdata success
         // dd($data);
        return redirect()->to('/Jenis_surat/Referensi'); // redirect ke halaman referensi jenis surat
    }


}
?>