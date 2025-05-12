<?php 
namespace App\Models;

use CodeIgniter\Model;

class detailSuratKeluar extends Model
{
    protected $table = 'data_surat_keluar';
    protected $primaryKey = 'id_data_surat_keluar';
    protected $allowedFields = ['id_surat_keluar', 'id_user', 'keterangan_detail_surat_keluar', 'status_detail_surat_keluar','created_at', 'updated_at'];

    public function getDetailSuratKeluar($id_surat_keluar = false)
    {
        if ($id_surat_keluar == false) {
            return $this
                ->select('data_surat_keluar.*, surat_keluar.nama_surat_keluar, surat_keluar.kode_surat_keluar, surat_keluar.ket_surat_keluar, surat_keluar.template_surat_keluar, surat_keluar.created_at, surat_keluar.updated_at')
                ->join('surat_keluar', 'data_surat_keluar.id_surat_keluar = surat_keluar.id_surat_keluar')
                ->findAll();
        }
        return $this
            ->select('data_surat_keluar.*, surat_keluar.nama_surat_keluar, surat_keluar.kode_surat_keluar, surat_keluar.ket_surat_keluar, surat_keluar.template_surat_keluar, surat_keluar.created_at, surat_keluar.updated_at')
            ->join('surat_keluar', 'data_surat_keluar.id_surat_keluar = surat_keluar.id_surat_keluar')
            ->first();
    }
}

?>