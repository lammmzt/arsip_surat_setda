<?php 
namespace App\Controllers;

use App\Models\jenisSuratModel;
use Ramsey\Uuid\Uuid;

class Jenis_surat extends BaseController
{
    public function index()
    {
        $jenisSuratModel = new jenisSuratModel();
        $data['jenis_surat'] = $jenisSuratModel->findAll();
        $data['title'] = 'Jenis Surat';
        $data['active'] = 'jenis_surat';
        $data['validation'] = \Config\Services::validation();
        
        return view('Admin/jenis_surat/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Jenis Surat';
         $data['active'] = 'jenis_surat';
        $data['validation'] = \Config\Services::validation();

        return view('Admin/jenis_surat/tambah', $data);
    }

    public function save()
    {
        $model = new jenisSuratModel();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_jenis_surat' => 'required|is_unique[jenis_surat.nama_jenis_surat]',
            'kode_surat' => 'required',
            'ket_jenis_surat' => 'required',
            'template_jenis_surat' => 'required'
        ]);
        if (!$validation->run($this->request->getPost())) {
            // session()->setFlashdata('errors', $validation->getErrors()); 
            session()->setFlashdata('errors', 'Data Jenis Surat gagal ditambahkan');
            return redirect()->to('/Jenis_surat/Tambah');
        }
        $data = [
            'id_jenis_surat' => Uuid::uuid4()->toString(),
            'nama_jenis_surat' => $this->request->getPost('nama_jenis_surat'),
            'kode_surat' => $this->request->getPost('kode_surat'),
            'ket_jenis_surat' => $this->request->getPost('ket_jenis_surat'),
            'template_jenis_surat' => $this->request->getPost('template_jenis_surat'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        $model->insert($data);
        session()->setFlashdata('success', 'Data Jenis Surat berhasil ditambahkan');
        return redirect()->to('/Jenis_surat');
    }

    public function edit($id)
    {
        $model = new jenisSuratModel();
        $data['jenis_surat'] = $model->find($id);
        $data['title'] = 'Edit Jenis Surat';
        $data['active'] = 'jenis_surat';

        
        return view('Admin/jenis_surat/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_jenis_surat');
        $model = new jenisSuratModel();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_jenis_surat' => 'required',
            'kode_surat' => 'required',
            'ket_jenis_surat' => 'required',
            'template_jenis_surat' => 'required'
        ]);
        if (!$validation->run($this->request->getPost())) {
            // session()->setFlashdata('errors', $validation->getErrors()); 
            session()->setFlashdata('errors', 'Data Jenis Surat gagal diubah');
            return redirect()->to('/Jenis_surat/edit/' . $id);
        }
        $data = [
            'nama_jenis_surat' => $this->request->getPost('nama_jenis_surat'),
            'kode_surat' => $this->request->getPost('kode_surat'),
            'ket_jenis_surat' => $this->request->getPost('ket_jenis_surat'),
            'template_jenis_surat' => $this->request->getPost('template_jenis_surat'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $model->update($id, $data);
        session()->setFlashdata('success', 'Data Jenis Surat berhasil diubah');
        return redirect()->to('/Jenis_surat');
    }

    public function delete($id)
    {
        $model = new jenisSuratModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Data Jenis Surat berhasil dihapus');
        return redirect()->to('/Jenis_surat');
    }
    
}
?>