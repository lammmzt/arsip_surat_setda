<?php 
namespace App\Models;

use CodeIgniter\Model;

class suratMasukModel extends Model
{
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id_surat_masuk';
    protected $allowedFields = ['id_surat_masuk', 'perihal_surat_masuk', 'ket_surat_masuk', 'pengirim_surat_masuk', 'no_surat_masuk', 'tipe_file_surat_masuk','tgl_surat_masuk', 'file_surat_masuk', 'created_at', 'updated_at'];

    public function getSuratMasuk($id = false)
    {
        if ($id === false) {
            return $this
            ->orderBy('created_at', 'DESC')
            ->findAll();
        } else {
            return $this->getWhere(['id_surat_masuk' => $id]);
        }
    }
}

?>