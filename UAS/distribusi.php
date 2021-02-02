<html>
    <head>
        <title>Distribusi</title>
    </head>
	<?php
		include("koneksi.php");
		include("oop.php");

		$perintah = new oop();
		$table = "tb_distribusi";
		$form = "distribusi.php";

		if(isset($_POST['save'])){
			$data = "('','$_POST[nama]','$_POST[kelas]', '$_POST[jumlah]')";
			$perintah->simpan($con, $table, $data, $form);
		}
	
		if(isset($_GET['action']) && $_GET['action'] == "edit"){
			$distribusi = $perintah->edit($con, $table, "id = $_GET[id]");
	
			if(isset($_POST['edit'])){
				$data = "nama_sekolah = '$_POST[nama]', kelas = '$_POST[kelas]', jumlah = '$_POST[jumlah]'";
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
    	<h3>Distribusi LKS</h3>
		<form method="post">
		<?php if(isset($_GET['action']) && $_GET['action'] == "edit"){ ?>
			<table>
				<tr>
					<td>Nama Sekolah</td>
					<td>:</td>
					<td>
						<input type="text" id="nama" name="nama" value="<?=$distribusi['nama_sekolah']?>">
					</td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td>:</td>
					<td>
						<input type="radio" name="kelas" value="1" <?=($distribusi['kelas'] == 1 ) ? "checked" : "" ?> > 1
						<input type="radio" name="kelas" value="2" <?=($distribusi['kelas'] == 2 ) ? "checked" : "" ?> > 2
						<input type="radio" name="kelas" value="3" <?=($distribusi['kelas'] == 3 ) ? "checked" : "" ?> > 3
						<input type="radio" name="kelas" value="4" <?=($distribusi['kelas'] == 4 ) ? "checked" : "" ?> > 4
						<input type="radio" name="kelas" value="5" <?=($distribusi['kelas'] == 5 ) ? "checked" : "" ?> > 5
						<input type="radio" name="kelas" value="6" <?=($distribusi['kelas'] == 6 ) ? "checked" : "" ?> > 6
					</td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td>
						<input type="text" id="jumlah" name="jumlah" value="<?=$distribusi['jumlah']?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="edit" value="Simpan"></td>
				</tr>
			</table>
		<?php }else{ ?>
			<table>
				<tr>
					<td>Nama Sekolah</td>
					<td>:</td>
					<td>
						<input type="text" id="nama" name="nama">
					</td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td>:</td>
					<td>
						<input type="radio" name="kelas" value="1"> 1
						<input type="radio" name="kelas" value="2"> 2
						<input type="radio" name="kelas" value="3"> 3
						<input type="radio" name="kelas" value="4"> 4
						<input type="radio" name="kelas" value="5"> 5
						<input type="radio" name="kelas" value="6"> 6
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
					<td></td>
					<td></td>
					<td><input type="submit" name="save" value="Simpan"></td>
				</tr>
			</table>
		<?php } ?>
		</form>
    	<h3>Data Distribusi</h3>
    	<table border="1">
    		<tr>
    			<td>No</td>
                <td>Nama Sekolah</td>
    			<td>Kelas</td>
    			<td>Jumlah</td>
    			<td>Action</td>
    		</tr>
			<?php
				$tampil = $perintah->tampil($con, $table);
				$no = 0;

				if (is_null($tampil)) {
					echo "<tr> <td colspan = 5>Data tidak ada</td> </tr>";
				}else{
					foreach ($tampil as $field) {
						$no++;
			?>
			<tr>
				<td><?=$no?></td>
				<td><?=$field['nama_sekolah']?></td>
				<td><?=$field['kelas']?></td>
				<td><?=$field['jumlah']?></td>
				<td>
					<a href="?action=edit&id=<?=$field['id']?>">edit</a>
					<a href="?action=delete&id=<?=$field['id']?>">delete</a>
				</td>
			</tr>
			<?php }} ?>
    	</table>
    </body>
</html>