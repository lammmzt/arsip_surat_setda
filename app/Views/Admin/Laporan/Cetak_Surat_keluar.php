<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Keluar Periode <?= date('d-m-Y', strtotime($tanggal_awal)) ?> s/d
        <?= date('d-m-Y', strtotime($tanggal_akhir)) ?></title>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
    }

    p {
        margin-top: 0;
        margin-bottom: 5px;
    }

    .table-header {
        width: 100%;
        margin-top: 0px;
    }

    .table-header tr:nth-child(even) {
        background-color: white;
    }

    .table-header td {
        padding: 5px;
    }

    .table-header td:first-child {
        padding-top: 0;
    }

    .table-header td:last-child {
        padding-bottom: 2px;
    }

    table {
        width: 99%;
        border-collapse: collapse;
    }

    table th {
        background-color: #f2f2f2;
        color: black;
    }

    table th,
    table td {
        padding: 8px;
        text-align: left;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }


    /* repeat .kop surat */
    .kop_surat {
        text-align: center;
        margin-bottom: 20px;
    }

    .kop_surat img {
        width: 100%;
        height: 150px;
    }

    /* table td auto fit  */
    table td {
        word-wrap: break-word;
        max-width: 200px;
        /* Set a max width for the cells */
    }

    /* media a4 */
    @page {
        size: A4;
    }
    </style>
    <script>
    window.print();

    window.onafterprint = function() {
        window.close();
    }
    </script>

<body>

    <div class="kop_surat">
        <img src="<?= base_url('Assets/img/data_instansi/KOP SETDA PEKALONGAN.png') ?>" alt=""
            style="width: 100%; height: 130px;">
        <table border="0" cellpadding="5" cellspacing="0" class="table-header">
            <tr>
                <td colspan="2">
                    <h2>Laporan Surat Keluar</h2>
                </td>
            </tr>
            <tr>
                <td width="70px">Periode</td>
                <td>: <?= date('d-m-Y', strtotime($tanggal_awal)) ?> s/d
                    <?= date('d-m-Y', strtotime($tanggal_akhir)) ?></td>
            </tr>

        </table>
    </div>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th style="text-align: center">No</th>
                <th>Judul</th>
                <th style="text-align: center">Tanggal</th>
                <th style="text-align: center">Nomor</th>
                <th style="text-align: center">Pembuat</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            ?>
            <?php foreach($surat_keluar as $jns): ?>
            <tr>
                <td style="text-align: center"><?= $no++; ?></td>
                <td><?= ($jns['judul_surat_keluar'] != null) ? $jns['judul_surat_keluar'] : '-'; ?></td>
                <td style="text-align: center;">
                    <?= ($jns['tanggal_surat_keluar'] != null) ? date('d-m-Y', strtotime($jns['tanggal_surat_keluar'])) : '-'; ?>
                </td>
                <td style="text-align: center">
                    <?=  ($jns['nomor_surat_keluar'] != null) ? $jns['kode_surat'].'/'.$jns['nomor_surat_keluar'] : '-'; ?>
                </td>
                <td style="text-align: center"><?= $jns['nama_user']; ?></td>
                <td><?= ($jns['keterangan_surat_keluar'] != null) ? $jns['keterangan_surat_keluar'] : '-'; ?>
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

    <!-- form ttd -->
    <!-- <table style="width: 100%; margin-top: 20px;" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td style="width: 50%; text-align: center;">
                <p>Mengetahui</p>
                <p>Kepala Sekretariat Daerah Kota Pekalongan</p>
                <br>
                <br>
                <br>
                <p>(...........................................)</p>
            </td>
            <td style="width: 50%; text-align: center;">
                <p>Pekalongan, <?= date('d-m-Y') ?></p>
                <p>Yang Membuat</p>
                <br>
                <br>
                <br>
                <p>(...........................................)</p>
            </td>
        </tr>
    </table> -->
</body>

</html>