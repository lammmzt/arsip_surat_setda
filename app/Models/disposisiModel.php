<?php 
namespace App\Models;

use CodeIgniter\Model;

class disposisiModel extends Model
{
    protected $table = 'disposisi';
    protected $primaryKey = 'id_disposisi ';
    protected $allowedFields = ['id_disposisi', 'id_surat_masuk', 'id_pegawai', 'status_disposisi','ket_disposisi', 'jawaban_disposisi', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getDisposisiBySurat($id_surat_masuk)
    {
        return $this
            ->select('disposisi.*, pegawai.nama_pegawai, surat_masuk.no_surat_masuk, pegawai.id_pegawai')
            ->join('pegawai', 'pegawai.id_pegawai = disposisi.id_pegawai')
            ->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi.id_surat_masuk')
            ->where('disposisi.id_surat_masuk', $id_surat_masuk)
            ->findAll();
    }
}

?>