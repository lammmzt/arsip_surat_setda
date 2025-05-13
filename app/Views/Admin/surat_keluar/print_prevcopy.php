<?= $surat_keluar['template_jenis_surat']; ?>
<script>
var str = document.body.innerHTML;
var data_isian_surat = <?= json_encode($surat_keluar['isian_surat_keluar']); ?>;
var data_instansi = <?= json_encode($data_instansi); ?>;
// console.log(data_instansi);
// console.log(data_isian_surat);   

// masukan value ke dalam input berdasarkan id
data_isian_surat = JSON.parse(data_isian_surat);

data_isian_surat['nama_instansi'] = data_instansi.nama_instansi;
data_isian_surat['nama_kepala_instansi'] = data_instansi.nama_kepala_instansi;
data_isian_surat['nip_kepala_instansi'] = data_instansi.nip_kepala_instansi;
data_isian_surat['ttd_kepala'] = 'coba_ttd.png';
// console.log(data_isian_surat);

// nama instansi
for (var key in data_isian_surat) {
    // add {key} to str
    var regex = new RegExp("{" + key + "}", "g");
    if (key == 'ttd_kepala') {
        str = str.replace(regex, '<img src="<?= base_url('Assets/ttd_surat/') ?>' + data_isian_surat[key] +
            '" width="150px">');
    } else {
        str = str.replace(regex, data_isian_surat[key]);
    }
    // console.log(key + " : " + data_isian_surat[key]);
}

// Update isi body dengan hasil yang sudah diganti
document.body.innerHTML = str;

// window.print();

// when print is done, close the window
// window.onafterprint = function() {
//     window.close();
// }
</script>