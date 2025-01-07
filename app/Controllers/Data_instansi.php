<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Data_instansiModel;
use Ramsey\Uuid\Uuid;

class Data_instansi extends Controller
{
     public function index()
    {
        $data_instansiModel = new Data_instansiModel();
        $data['title'] = 'Data Instansi';
        $data['active'] = 'data_instansi';
        $data['data_instansi'] = $data_instansiModel->first();
        $data['validation'] = \Config\Services::validation();
        
        return view('Admin/data_instansi/index', $data);
    }

    public function save()
    {
        // dd($this->request->getVar());
        if(!$this->validate([
            'nama_instansi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Instansi harus diisi'
                ]
            ],
            'alamat_instansi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Instansi harus diisi'
                ]
            ],
            'no_tlp_instansi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Telp Instansi harus diisi'
                ]
            ],
            'email_instansi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email Instansi harus diisi'
                ]
            ],
            'nama_kepala_instansi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kepala Instansi harus diisi'
                ]
            ],
            'nip_kepala_instansi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIP Kepala Instansi harus diisi'
                ]
            ]
        ])){
            session()->setFlashdata('errors', 'Data gagal diubah');
            return redirect()->to('/Data_instansi')->withInput();
        }

        $data_instansiModel = new Data_instansiModel();
        $check = $data_instansiModel->first();
        // dd($check);
        $logo_instansi = $this->request->getFile('logo_instansi');
    
        if($check){
            if($logo_instansi->getError() == 4){
                $nama_logo_instansi = $check['logo_instansi'];
            }else{
                $nama_logo_instansi = $logo_instansi->getRandomName();
                unlink('Assets/img/data_instansi/'.$check['logo_instansi']);
                $logo_instansi->move('Assets/img/data_instansi', $nama_logo_instansi);
            }
            $data_instansiModel->update($check['id_data_instansi'], [
                'nama_instansi' => $this->request->getVar('nama_instansi'),
                'alamat_instansi' => $this->request->getVar('alamat_instansi'),
                'no_tlp_instansi' => $this->request->getVar('no_tlp_instansi'),
                'email_instansi' => $this->request->getVar('email_instansi'),
                'nama_kepala_instansi' => $this->request->getVar('nama_kepala_instansi'),
                'nip_kepala_instansi' => $this->request->getVar('nip_kepala_instansi'),
                'logo_instansi' => $nama_logo_instansi,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }else{
            if($logo_instansi->getError() == 4){
                $nama_logo_instansi = '';
            }else{
                $nama_logo_instansi = $logo_instansi->getRandomName();
                $logo_instansi->move('Assets/img/data_instansi', $nama_logo_instansi);
            }
            $id_data_instansi = Uuid::uuid4()->toString();
            $data_instansiModel->insert([
                'id_data_instansi' => $id_data_instansi,
                'nama_instansi' => $this->request->getVar('nama_instansi'),
                'alamat_instansi' => $this->request->getVar('alamat_instansi'),
                'no_tlp_instansi' => $this->request->getVar('no_tlp_instansi'),
                'email_instansi' => $this->request->getVar('email_instansi'),
                'nama_kepala_instansi' => $this->request->getVar('nama_kepala_instansi'),
                'nip_kepala_instansi' => $this->request->getVar('nip_kepala_instansi'),
                'logo_instansi' => $nama_logo_instansi,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/Data_instansi');

    }

}
?>