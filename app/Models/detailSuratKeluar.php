<?php 
namespace App\Models;

use CodeIgniter\Model;

class detailSuratKeluar extends Model
{
    protected $table = 'detail_surat_keluar';
    protected $primaryKey = 'id_detail_surat_keluar';
    protected $allowedFields = ['id_surat_keluar', 'id_user', 'keterangan_detail_surat_keluar', 'status_detail_surat_keluar','created_at', 'updated_at'];

    public function getDetailSuratKeluar($id_detail_surat_keluar = false)
    {
        if ($id_detail_surat_keluar == false) {
            return $this
                ->select('detail_surat_keluar.*, surat_keluar.nomor_surat_keluar, surat_keluar.keterangan_surat_keluar, surat_keluar.isian_surat_keluar, surat_keluar.created_at, surat_keluar.updated_at, users.nama_user')
                ->join('surat_keluar', 'detail_surat_keluar.id_surat_keluar = surat_keluar.id_surat_keluar')
                ->join('users', 'users.id_user = detail_surat_keluar.id_user')
                ->findAll();
        }
        return $this
            ->select('detail_surat_keluar.*, surat_keluar.nomor_surat_keluar, surat_keluar.keterangan_surat_keluar, surat_keluar.isian_surat_keluar, surat_keluar.created_at, surat_keluar.updated_at')
            ->join('surat_keluar', 'detail_surat_keluar.id_surat_keluar = surat_keluar.id_surat_keluar')
            ->join('users', 'users.id_user = detail_surat_keluar.id_user')
            ->where(['detail_surat_keluar.id_detail_surat_keluar' => $id_detail_surat_keluar])
            ->first();
    }

    public function getDetailSuratKeluarByIdSuratKeluar($id_surat_keluar)
    {
        return $this
            ->select('detail_surat_keluar.*, surat_keluar.nomor_surat_keluar, surat_keluar.keterangan_surat_keluar, surat_keluar.isian_surat_keluar, surat_keluar.created_at, surat_keluar.updated_at, users.nama_user')
            ->join('surat_keluar', 'detail_surat_keluar.id_surat_keluar = surat_keluar.id_surat_keluar')
            ->join('users', 'users.id_user = detail_surat_keluar.id_user')
            ->where(['detail_surat_keluar.id_surat_keluar' => $id_surat_keluar])
            ->findAll();
    }
}

?>