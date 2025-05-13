<?php 
namespace App\Models;

use CodeIgniter\Model;

class suratKeluarModel extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id_surat_keluar';
    protected $allowedFields = ['id_surat_keluar','id_user', 'id_jenis_surat', 'nomor_surat_keluar', 'tipe_lampiran_surat_keluar','tanggal_surat_keluar', 'isian_surat_keluar', 'status_surat_keluar', 'final_dokumen_surat_keluar', 'catatan_persetujuan_surat_keluar','lampiran_surat_keluar', 'keterangan_surat_keluar', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
        
    public function getSuratkeluar($id = false)
    {
        if ($id === false) {
            return $this
            ->select('surat_keluar.*, users.nama_user, jenis_surat.*')
            ->join('jenis_surat', 'jenis_surat.id_jenis_surat = surat_keluar.id_jenis_surat')
            ->join('users', 'users.id_user = surat_keluar.id_user')
            ->orderBy('surat_keluar.created_at', 'DESC')
            ->orderBy('tanggal_surat_keluar', 'DESC')
            ->findAll();
        } else {
            return $this
            ->select('surat_keluar.*, users.nama_user, jenis_surat.*')
            ->join('jenis_surat', 'jenis_surat.id_jenis_surat = surat_keluar.id_jenis_surat')
            ->join('users', 'users.id_user = surat_keluar.id_user')
            ->where('surat_keluar.id_surat_keluar', $id);
        }
    }
}

?>