<html>
    <head>
        <title>UTS Novica Ardina</title>
    </head>
    <body>
        <form action="UTSproses.php" method="post">
        <h2 align="center">NUSANTARA COMPUTER CENTER</h2>
        <table border="0" align="center">
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td>
                    <input type="text" name="nama" size="15" placeholder="Isi Nama Anda" required/>
                </td>
            </tr>
            <tr>
                <td>Kode Pendaftaran</td>
                <td> : </td>
                <td>
                    <select name="kode">
                        <option value="None"> Pilih Kode </option>
                        <option value="VBSK00108"> VBSK00108</option>
                        <option value="DPSJ00210"> DPSJ00210</option>
                        <option value="LXSM10105"> LXSM10105</option>
                    </select>
                     (VBSK00108, DPSJ00210, LXSM10105) 
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td> : </td>
                <td>
                    <select name="kelas">
                        <option value="None"> Pilih Kelas </option>
                        <option value="Regular"> Regular</option>
                        <option value="Private"> Private</option>
                    </select>
                     (Regular, Private)
                </td>
            </tr>
            <tr>
                <td>Jumlah Pertemuan</td>
                <td> : </td>
                <td>
                    <input type="number" name="pertemuan" placeholder="Isi Dengan Angka" required/>
                     Kali
                </td>
            </tr>
            <tr>
                <td>Jumlah Peserta</td>
                <td> : </td>
                <td>
                    <input type="number" name="peserta" placeholder="Isi Dengan Angka" required/>
                     Orang 
                </td>
            </tr>
            <tr>
                <td>Hasil Test Awal</td>
                <td> : </td>
                <td>
                    <select name="hasil">
                        <option value="None"> Pilih Hasil </option>
                        <option value="A"> A</option>
                        <option value="B"> B</option>
                        <option value="C"> C</option>
                    </select>
                     (Grade A, Grade B, Grade C) 
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Proses" name="proses">
                    <input type="reset" value="Ulang" name="ulang">
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>