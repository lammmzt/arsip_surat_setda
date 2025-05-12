<?php 
namespace App\Models;

use CodeIgniter\Model;

class suratKeluarModel extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id_surat_keluar';
    protected $allowedFields = ['id_surat_keluar','id_user', 'nomor_surat_keluar', 'tanggal_surat_keluar', 'isian_surat_keluar', 'status_surat_keluar', 'file_surat_keluar','lampiran_surat_keluar', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
        
    public function getSuratkeluar($id = false)
    {
        if ($id === false) {
            return $this
            ->select('surat_keluar.*, users.nama_user')
            ->join('users', 'users.id_user = surat_keluar.id_user')
            ->orderBy('created_at', 'DESC')
            ->orderBy('tanggal_surat_keluar', 'DESC')
            ->findAll();
        } else {
            return $this
            ->select('surat_keluar.*, users.nama_user')
            ->join('users', 'users.id_user = surat_keluar.id_user')
            ->where('surat_keluar.id_surat_keluar', $id);
        }
    }
}

?>