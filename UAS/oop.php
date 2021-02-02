<?php
	class oop{

		function simpan($con, $table, $isi, $form){
			$sql = "INSERT INTO $table VALUES $isi";
			$query = mysqli_query($con, $sql);
			if ($query) {
				echo "<script>alert('Data berhasil disimpan');document.location.href='$form'</script>";
			}else{
				echo "<script>alert('Data gagal tersimpan');document.location.href='$form'</script>";
			}
		}

		function tampil($con, $table){
			$sql = "SELECT * FROM $table";
			$query = mysqli_query($con, $sql);
			while ($data = mysqli_fetch_array($query)) 
				$isi[] = $data;
			return @$isi;
		}

		function tampil_limit($con, $table, $limit){
			$sql = "SELECT * FROM $table limit $limit";
			$query = mysqli_query($con, $sql);
			while ($data = mysqli_fetch_array($query)) 
				$isi[] = $data;
			return @$isi;
		}

		function edit($con, $table, $where){
			$sql = "SELECT * FROM $table WHERE $where";
			$query = mysqli_query($con, $sql);
			$isi = mysqli_fetch_array($query);
			return $isi;
		}

		function update($con, $table, $isi, $where, $form){
			$sql = "UPDATE $table SET $isi WHERE $where";
			$query = mysqli_query($con, $sql);
			if ($query) {
				echo "<script>alert('Data berhasil diubah');document.location.href='$form'</script>";
			}else{
				echo "<script>alert('Data gagal diubah');document.location.href='$form'</script>";
			}
		}

		function hapus($con, $table, $where, $form){
			$sql = "DELETE FROM $table WHERE $where";
			$query = mysqli_query($con, $sql);
			if ($query) {
				echo "<script>alert('Data berhasil dihapus');document.location.href='$form'</script>";
			}else{
				echo "<script>alert('Data gagal dihapus');document.location.href='$form'</script>";
			}
		}
		
	}

?>