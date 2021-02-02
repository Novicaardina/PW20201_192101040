<html>
    <head>
        <title>Cek Stock</title>
    </head>
	<?php
		include("koneksi.php");
	?>
    <body>
    	<h1>Data Logistik Lembar Kerja Siswa</h1>
    	<p>Programmer : Novica Ardina</p>
    	<a href="inputstock.php">Input Stock</a> || <a href="distribusi.php">Distribusi</a> || <a href="cekstock.php">Cek Stock</a>
    	<br>
    	<h3>Data Distribusi</h3>
    	<table border="1">
    		<tr>
    			<td>No</td>
                <td>Kelas</td>
                <td>Jumlah</td>
                <td>Harga</td>
                <td>Nilai Persediaan</td>
    		</tr>
			<?php
				$sql = "SELECT *, (SELECT SUM(jumlah) from tb_distribusi where tb_distribusi.kelas = tb_stock.kelas GROUP BY tb_distribusi.kelas) as distribusi FROM tb_stock";
				$query = mysqli_query($con, $sql);
				while ($data = mysqli_fetch_array($query)) 
					$isi[] = $data;

				$tampil = @$isi;
				$no = 0;

				if (is_null($tampil)) {
					echo "<tr> <td colspan = '5'>Data tidak ada</td> </tr>";
				}else{
					foreach ($tampil as $field) {
						$no++;
						$jumlah_sisa = $field['jumlah'] - $field['distribusi'];
						$nilai_persediaan = $jumlah_sisa * $field['harga'];
			?>
			<tr>
				<td><?=$no?></td>
				<td><?=$field['kelas']?></td>
				<td><?=$jumlah_sisa?></td>
				<td><?=$field['harga']?></td>
				<td><?=$nilai_persediaan?></td>
			</tr>
			<?php }} ?>
    	</table>
    </body>
</html>