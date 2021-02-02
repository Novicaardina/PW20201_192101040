<html>
    <head>
        <title>Input Stock</title>
    </head>
	<?php
		include("koneksi.php");
		include("oop.php");

		$perintah = new oop();
		$table = "tb_stock";
		$form = "inputstock.php";

		if(isset($_POST['save'])){
			$data = "('','$_POST[kelas]', '$_POST[jumlah]','$_POST[harga]')";
			$perintah->simpan($con, $table, $data, $form);
		}
	
		if(isset($_GET['action']) && $_GET['action'] == "edit"){
			$stock = $perintah->edit($con, $table, "id = $_GET[id]");
	
			if(isset($_POST['edit'])){
				$data = "kelas = '$_POST[kelas]', jumlah = '$_POST[jumlah]', harga = '$_POST[harga]'";
				$perintah->update($con, $table, $data, "id = $_GET[id]" , $form);
			}
		}
	
		if(isset($_GET['action']) && $_GET['action'] == "delete"){
			$perintah->hapus($con,$table,"id = $_GET[id]",$form);
		}

		$jum_lks = 0;
		$jum_nilai_persediaan = 0;
	?>
    <body>
    	<h1>Data Logistik Lembar Kerja Siswa</h1>
    	<p>Programmer : Novica Ardina</p>
    	<a href="inputstock.php">Input Stock</a> || <a href="distribusi.php">Distribusi</a> || <a href="cekstock.php">Cek Stock</a>
    	<br>
		<form method="post">
		<?php if(isset($_GET['action']) && $_GET['action'] == "edit"){ ?>
			<h3>Form Edit Stock LKS</h3>
			<table>
				<tr>
					<td>Kelas</td>
					<td>:</td>
					<td>
						<select name="kelas" id="kelas">
							<option value="1" <?=($stock['kelas'] == 1 ) ? "selected" : "" ?> >1</option>
							<option value="2" <?=($stock['kelas'] == 2 ) ? "selected" : "" ?> >2</option>
							<option value="3" <?=($stock['kelas'] == 3 ) ? "selected" : "" ?> >3</option>
							<option value="4" <?=($stock['kelas'] == 4 ) ? "selected" : "" ?> >4</option>
							<option value="5" <?=($stock['kelas'] == 5 ) ? "selected" : "" ?> >5</option>
							<option value="6" <?=($stock['kelas'] == 6 ) ? "selected" : "" ?> >6</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td>
						<input type="text" id="jumlah" name="jumlah" value="<?=$stock['jumlah']?>">
					</td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>:</td>
					<td>
						<input type="text" id="harga" name="harga" value="<?=$stock['harga']?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="edit" value="Simpan"></td>
				</tr>
			</table>
		<?php }else{ ?>
			<h3>Form Input Stock LKS</h3>
			<table>
				<tr>
					<td>Kelas</td>
					<td>:</td>
					<td>
						<select name="kelas" id="kelas">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td>
						<input type="text" id="jumlah" name="jumlah">
					</td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>:</td>
					<td>
						<input type="text" id="harga" name="harga">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="save" value="Simpan"></td>
				</tr>
			</table>
		<?php } ?>
		</form>

    	<h3>Data Stock LKS</h3>
    	<table border="1">
    		<tr>
    			<td>No</td>
    			<td>Kelas</td>
    			<td>Jumlah</td>
    			<td>Harga</td>
    			<td>Nilai Persediaan</td>
    			<td>Action</td>
    		</tr>
			<?php
				$tampil = $perintah->tampil($con, $table);
				$no = 0;

				if (is_null($tampil)) {
					echo "<tr> <td colspan = '6'>Data tidak ada</td> </tr>";
				}else{
					foreach ($tampil as $field) {
						$no++;
						$jum_lks += $field['jumlah'];
						$nilai_persediaan = $field['jumlah']*$field['harga'];
						$jum_nilai_persediaan += $nilai_persediaan;
			?>
			<tr>
				<td><?=$no?></td>
				<td><?=$field['kelas']?></td>
				<td><?=$field['jumlah']?></td>
				<td><?=$field['harga']?></td>
				<td><?=$nilai_persediaan?></td>
				<td>
					<a href="?action=edit&id=<?=$field['id']?>">edit</a>
					<a href="?action=delete&id=<?=$field['id']?>">delete</a>
				</td>
			</tr>
			<?php }} ?>
    	</table>
    	<br>
    	<table>
    		<tr>
    			<td>Jumlah LKS Seluruh</td>
    			<td>:</td>
    			<td>
    				<input type="text" id="jumlah_total" name="jumlah_total" readonly value="<?=$jum_lks?>">
    			</td>
    		</tr>
    		<tr>
    			<td>Total Nilai Persediaan</td>
    			<td>:</td>
    			<td>
    				<input type="text" id="total_nilai" name="total_nilai" readonly value="<?=$jum_nilai_persediaan?>">
    			</td>
    		</tr>
    	</table>
    </body>
</html>