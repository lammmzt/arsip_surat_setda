<?php

namespace App\Controllers;
use App\Models\usersModel;
use App\Models\pegawaiModel;
use App\Models\externalModel;
use App\Models\suratKeluarModel;
use App\Models\suratMasukModel;
class Home extends BaseController
{  
    public function index(): string // menampilkan halaman dashboard
    { 
        $usersModel = new usersModel(); // inisialisasi model users
        $pegawaiModel = new pegawaiModel(); // inisialisasi model pegawai
        $externalModel = new externalModel(); // inisialisasi model external
        $suratKeluarModel = new suratKeluarModel(); // inisialisasi model surat keluar
        $suratMasukModel = new suratMasukModel(); // inisialisasi model surat masuk
        $data['total_users'] = $usersModel->countAll(); // hitung total users
        $data['total_pegawai'] = $pegawaiModel->countAll(); // hitung total pegawai
        $data['total_external'] = $externalModel->countAll(); // hitung total external
        $data['total_surat_keluar'] = $suratKeluarModel->where('status_surat_keluar', '3')->countAllResults(); // hitung total surat keluar
        $data['total_surat_masuk'] = $suratMasukModel->countAll(); // hitung total surat masuk
        $data['total_surat'] = $suratKeluarModel->countAll() + $suratMasukModel->countAll(); // hitung total surat
        $data['total_surat_keluar'] = $suratKeluarModel->countAll(); // hitung total surat keluar
        $data['total_surat_masuk'] = $suratMasukModel->countAll(); // hitung total surat masuk
        $data['title'] = 'Dashboard'; // set judul halaman
        $data['active'] = 'dashboard'; // set active menu
        return view('Dashboard/index', $data); // tampilkan view dashboard
    }
}