<?php 
	if(isset($_POST['simpan'])){
		require("eksekusi.php");
		simpan();
	}else if(isset($_POST['update'])){
		require("eksekusi.php");
		update();
	}else if(isset($_GET['aksi'])){
		if($_GET['aksi']=="delete"){
			require("eksekusi.php");
			delete();
		}
	}else{
		echo "content tidak ada";
	}
?>