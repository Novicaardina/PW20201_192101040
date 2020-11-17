<?php
    $nama = $_POST['nama'];
    $pertemuan = $_POST['pertemuan'];
    $peserta = $_POST['peserta'];

    $kode = $_POST['kode'];
    if($_POST['kode'] == 'VBSK00108'){
        $kode = "VBSK00108";
    }elseif($_POST['kode'] == 'DPSJ00210'){
        $kode = "DPSJ00210";
    }elseif($_POST['kode'] == 'LXSM10105'){
        $kode = "LXSM10105";
    }else{
        echo "<script>alert('Pilih kode terlebih dahulu.');document.location='UTSNovica.php'</script>";
    }

    $kelas = $_POST['kelas'];
    if($_POST['kelas'] == 'Regular'){
        $kelas = "Regular";
    }elseif($_POST['kelas'] == 'Private'){
        $kelas = "Private";
    }else{
        echo "<script>alert('Pilih kelas terlebih dahulu.');document.location='UTSNovica.php'</script>";
    }

    $hasil = $_POST['hasil'];
    if($_POST['hasil'] == 'A'){
        $hasil = "A";
        $subsidi = 5/100;
    }elseif($_POST['hasil'] == 'B'){
        $hasil = "B";
        $subsidi = 2/100;
    }elseif($_POST['hasil'] == 'C'){
        $hasil = "C";
        $subsidi = 0;
    }else{
        echo "<script>alert('Pilih hasil terlebih dahulu.');document.location='UTSNovica.php'</script>";
    }

    $sub_kode = substr($kode, 0, 2);
    if($sub_kode == 'VB'){
        $kelas = "Visual Basic";
        $jenis = "Pemrograman";
        $biaya = 750000;
    }elseif($sub_kode == 'DP'){
        $kelas = "Delphi";
        $jenis = "Pemrograman";
        $biaya = 650000;
    }elseif($sub_kode == 'LX'){
        $kelas = "Linux";
        $jenis = "Sistem Operasi";
        $biaya = 800000;
    }

    $sub_hari = substr($kode, 3, 1);
    if($sub_hari == 'K'){
        $hari = "Kamis";
    }elseif($sub_hari == 'J'){
        $hari = "Jum'at";
    }elseif($sub_hari == 'M'){
        $hari = "Minggu";
    }

    $nourut = substr($kode, 4, 3);

    if($kelas == 'Private' && $peserta > 5){
        $tambahan = 75000 * $peserta;
    }elseif($kelas == 'Private' && $peserta < 5){
        $tambahan = 20000 * $peserta;
    }elseif($kelas == 'Reguler' && $peserta < 10){
        $tambahan = 50000 * $peserta;
    }else{
        $tambahan = 0;
    }

    $biaya_subsidi = ($biaya + $tambahan) * $subsidi;
    $total = $biaya + $tambahan - $biaya_subsidi;
?>

<html>
    <head>
        <title>UTS Proses</title>
    </head>
    <body>
        <p>Output :</p>
        <h2 align="center">NUSANTARA COMPUTER CENTER</h2>
        <h3 align="center">Kode Pendaftaran</h2>
        <table border="0" align="center" cellspacing="7">
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td><?php echo $nama; ?></td>
                <td>Jenis Kursus</td>
                <td> : </td>
                <td><?php echo $jenis; ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td> : </td>
                <td><?php echo $kelas; ?></td>
                <td>No. Urut</td>
                <td> : </td>
                <td><?php echo $nourut; ?></td>
            </tr>
            <tr>
                <td>Hasil Test Awal</td>
                <td> : </td>
                <td><?php echo $hasil; ?></td>
                <td>Hari</td>
                <td> : </td>
                <td><?php echo $hari; ?></td>
            </tr>
            <tr>
                <td>Jumlah Peserta</td>
                <td> : </td>
                <td><?php echo $peserta; ?> Orang</td>
                <td>Jumlah Pertemuan</td>
                <td> : </td>
                <td><?php echo $pertemuan; ?> Kali</td>
            </tr>
            <tr>
                <td>Biaya Kursus</td>
                <td> : </td>
                <td><?php echo $biaya; ?></td>
                <td>Biaya Tambahan</td>
                <td> : </td>
                <td><?php echo $tambahan; ?></td>
            </tr>
            <tr>
                <td>Biaya Subsidi</td>
                <td> : </td>
                <td><?php echo $biaya_subsidi; ?></td>
                <td>Biaya Yang Dibayar</td>
                <td> : </td>
                <td><?php echo $total; ?></td>
            </tr>
        </table>
    </body>
</html>