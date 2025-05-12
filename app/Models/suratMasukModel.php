<?php 
namespace App\Models;

use CodeIgniter\Model;

class suratMasukModel extends Model
{
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id_surat_masuk';
    protected $allowedFields = ['id_surat_masuk','id_user', 'perihal_surat_masuk', 'ket_surat_masuk', 'pengirim_surat_masuk', 'no_surat_masuk', 'tipe_file_surat_masuk','tgl_surat_masuk', 'file_surat_masuk', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
        
    public function getSuratMasuk($id = false)
    {
        if ($id === false) {
            return $this
            ->select('surat_masuk.*, users.nama_user')
            ->join('users', 'users.id_user = surat_masuk.id_user')
            ->orderBy('created_at', 'DESC')
            ->findAll();
        } else {
            return $this
            ->select('surat_masuk.*, users.nama_user')
            ->join('users', 'users.id_user = surat_masuk.id_user')
            ->where('surat_masuk.id_surat_masuk', $id);
        }
    }
}

?>