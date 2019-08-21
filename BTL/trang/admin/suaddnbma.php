
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql="SELECT *FROM ddmayanh WHERE maDDNBMA=".$id;
		$query= mysql_query($sql);
		$row=mysql_fetch_row($query);
	}
	
	if(isset($_POST['btncn'])) {

		$anh1 = $_POST['hacn1'];
		$anh2 = $_POST['hacn2'];
		$anh3 = $_POST['hacn3'];
		$anh4 = $_POST['hacn4'];
		
		if($_FILES['hinhanh']['error']>0) {
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		}
		else {
			move_uploaded_file($_FILES["hinhanh"]["tmp_name"],"../img/".$_FILES["hinhanh"]["name"]);
			$anh1 = $_FILES["hinhanh"]["name"];
		}


		if($_FILES['hinhanh2']['error']>0) {
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		}
		else {
			move_uploaded_file($_FILES["hinhanh2"]["tmp_name"],"../img/".$_FILES["hinhanh2"]["name"]);
			$anh2 = $_FILES["hinhanh2"]["name"];
		}


		if($_FILES['hinhanh3']['error']>0) {
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		}
		else {
			move_uploaded_file($_FILES["hinhanh3"]["tmp_name"],"../img/".$_FILES["hinhanh3"]["name"]);
			$anh3 = $_FILES["hinhanh3"]["name"];
		}


		if($_FILES['hinhanh4']['error']>0) {
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		}
		else {
			move_uploaded_file($_FILES["hinhanh4"]["tmp_name"],"../img/".$_FILES["hinhanh4"]["name"]);
			$anh4 = $_FILES["hinhanh4"]["name"];
		}

		$thietke = $_POST['thietke'];
		$manhinh = $_POST['manhinh'];
		$cauhinh = $_POST['cauhinh'];
		$baomat = $_POST['baomat'];

		$sql2 = "UPDATE dacdiemma SET thietke='$thietke', chupanh='$manhinh', cambien='$cauhinh', ongkinh='$baomat',
		 			anh_1='$anh1', anh_2='$anh2', anh_3='$anh3', anh_4='$anh4' WHERE maDDNBMA=".$id;
		$kq=mysql_query($sql2);
		if($kq) {
			echo '	<script>
						alert("Cập nhật thành công!");
						location.assign("admin.php?module=dacdiemnbma");
					</script>';			
		}
		else {
			echo '	<script>
						alert("Cập nhật thất bại!");
						location.assign("admin.php?module=dacdiemnbma");
					</script>';		
		}
	}
?>
<h5 class="h-cnsp text-center mt-2">Cập nhật đặc điểm nổi bật máy ảnh</h5>
<form class="ml-md-3 mr-md-3 them-sp" name="themsp" onsubmit="return checkFormThemSP()" method="POST" action="" enctype="multipart/form-data">
	<input type="hidden" name="hacn1" value="<?php echo $row[3];?>">
	<input type="hidden" name="hacn2" value="<?php echo $row[4];?>">
	<input type="hidden" name="hacn3" value="<?php echo $row[5];?>">
	<input type="hidden" name="hacn4" value="<?php echo $row[6];?>">
	<label class="mt-2">Tên sản phẩm</label><input disabled type="text" name="tensp" class="ip" value="<?php echo $row[2] ?>">
	
	<label>Ảnh 1</label><input type="file" name="hinhanh" class="ip mt-sm-4">
	<label>Ảnh 2</label><input type="file" name="hinhanh2" class="ip mt-sm-4">
	<label>Ảnh 3</label><input type="file" name="hinhanh3" class="ip mt-sm-4">
	<label>Ảnh 4</label><input type="file" name="hinhanh4" class="ip mt-sm-4">
	
	
	<div>
		<label class="mh">Thiết kế</label><textarea type="text" name="thietke" class="ip mt-sm-4"><?php echo $row[7]; ?></textarea>	
		<label class="cpu">Khả năng chụp ảnh</label><textarea type="text" name="manhinh" class="ip mt-sm-4"><?php echo $row[8]; ?></textarea>	
		<label class="ram">Bộ cảm biến</label><textarea type="text" name="cauhinh" class="ip mt-sm-4"><?php echo $row[9]; ?></textarea>	
		<label class="ram">Ống kính</label><textarea type="text" name="baomat" class="ip mt-sm-4"><?php echo $row[10]; ?></textarea>
		
	</div>

	<div class="button-cnsp mb-3">
		<button class="btn btn-success btn-sm btn-block mt-sm-5 mr-3" type="submit" name="btncn">Cập nhật</button>
		<a href="admin.php?module=dacdiemnbmt" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
	</div>
	
</form>
