<?php
	if(isset($_POST['btnthem'])) {
		$tenSP = $_POST['chonsp'];

		if($_FILES['hinhanh']['error']>0) {
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		}
		else {
			move_uploaded_file($_FILES["hinhanh"]["tmp_name"],"../img/".$_FILES["hinhanh"]["name"]);
			$anh1 = $_FILES["hinhanh"]["name"];
		}

		$anh2='';
		if($_FILES['hinhanh2']['error']>0) {
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		}
		else {
			move_uploaded_file($_FILES["hinhanh2"]["tmp_name"],"../img/".$_FILES["hinhanh2"]["name"]);
			$anh2 = $_FILES["hinhanh2"]["name"];
		}

		$anh3='';
		if($_FILES['hinhanh3']['error']>0) {
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		}
		else {
			move_uploaded_file($_FILES["hinhanh3"]["tmp_name"],"../img/".$_FILES["hinhanh3"]["name"]);
			$anh3 = $_FILES["hinhanh3"]["name"];
		}

		$anh4='';
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

		$sql_maSP = "SELECT maSP FROM sanpham WHERE tenSP = '$tenSP' ";
		$kq_maSP = mysql_fetch_row(mysql_query($sql_maSP));
		$maSP = $kq_maSP[0];
		
		$sql = "INSERT INTO dacdiemma(maSP, thietke, chupanh, ongkinh, cambien, anh_1, anh_2, anh_3, anh_4)
				VALUES('$maSP', '$thietke', '$manhinh', '$cauhinh', '$baomat', '$anh1', '$anh2', '$anh3', '$anh4')";
		$kq=mysql_query($sql);
		if($kq) {
			echo '<script>
					alert("Thêm dữ liệu thành công!");
					location.assign("admin.php?module=dacdiemnbmt");
				</script>';
		}
		else {
			echo '<script>
					alert("Thêm dữ liệu thất bại!");
					location.assign("admin.php?module=dacdiemnbmt");
				</script>';			
		}

	}


	
?>
<h5 class="h-cnsp text-center mt-2">Thêm đặc điểm nổi bật máy ảnh</h5>
<form class="ml-md-3 mr-md-3 them-sp" name="themsp" onsubmit="return checkFormThemSP()" method="POST" action="" enctype="multipart/form-data">
	
	
	<?php
		$sql_check="SELECT tenSP
					FROM sanpham
					WHERE maSP NOT IN
					(SELECT maSP FROM dacdiemma)
					AND maDM=2";
		$kqcheck=mysql_query($sql_check);
		$numrow=mysql_num_rows($kqcheck);
		if($numrow>0) {
			echo '<label class="mt-2">Tên sản phẩm</label>';
			echo '<select name="chonsp" class="mt-sm-4">';
			while ($rowcheck=mysql_fetch_array($kqcheck)) {
				
		
	?>	
		<option value="<?php echo $rowcheck['tenSP'] ?>"><?php echo $rowcheck['tenSP'] ?></option>
		
	<?php
			}
		
	?>
	</select>

	<div id="n-tensp" class="text-center"></div>
	<label>Ảnh 1</label><input type="file" name="hinhanh" class="ip mt-sm-4">
	<div id="n-hinhanh" class="text-center"></div>

	<label>Ảnh 2</label><input type="file" name="hinhanh2" class="ip mt-sm-4">
	<div id="n-hinhanh2" class="text-center"></div>

	<label>Ảnh 3</label><input type="file" name="hinhanh3" class="ip mt-sm-4">
	<div id="n-hinhanh3" class="text-center"></div>

	<label>Ảnh 4</label><input type="file" name="hinhanh4" class="ip mt-sm-4">
	<div id="n-hinhanh4" class="text-center"></div>
	
	<div>
		<label class="mh">Thiết kế</label><textarea type="text" name="thietke" class="ip mt-sm-4"></textarea>
		<div id="n-tk" class="text-center"></div>
		<label class="cpu">Khả năng chụp ảnh</label><textarea type="text" name="manhinh" class="ip mt-sm-4"></textarea>
		<div id="n-mh" class="text-center"></div>
		<label class="ram">Bộ cảm biến</label><textarea type="text" name="cauhinh" class="ip mt-sm-4"></textarea>
		<div id="n-ch" class="text-center"></div>
		<label class="ram">Ống kinh</label><textarea type="text" name="baomat" class="ip mt-sm-4"></textarea>
		<div id="n-bm" class="text-center"></div>
	</div>

	<div class="button-cnsp mb-3">
		<button class="btn btn-success btn-sm btn-block mt-sm-5 mr-3" type="submit" name="btnthem">Thêm</button>
		<a href="admin.php?module=dacdiemnbma" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
	</div>
	

	<?php
		}else {
			echo '<p class="text-center text-danger" style="font-size:25px; margin-top: 50px;">Tất cả sản phẩm đã được thêm đặc điểm nổi bật!</p>';
			echo '<a href="admin.php?module=dacdiemnbmt" class="btn btn-success" style="display: block;
    				width: 200px;height: 40px;line-height: 27px;text-align: center;margin-left: 40%;font-size: 18px;"><i class="fas fa-backward mr-3"></i>Quay lại</a>';
		}
	?>	
	
	

</form>
			
<script type="text/javascript">

	function checkFormThemSP() {
		var form = document.forms['themsp'];
		
		var hinhanh=form['hinhanh'].value;
		if(hinhanh=='') {
		 	form['hinhanh'].focus();
			return false;
		}
		 else {
		 	
		}
		
		var hinhanh2=form['hinhanh2'].value;
		if(hinhanh2=='') {
		 	form['hinhanh2'].focus();
			return false;
		}
		 else {
		 	
		}
		var hinhanh3=form['hinhanh3'].value;
		if(hinhanh3=='') {
		 	form['hinhanh3'].focus();
			return false;
		}
		 else {
		 	
		}
		var hinhanh4=form['hinhanh4'].value;
		if(hinhanh4=='') {
		 	form['hinhanh4'].focus();
			return false;
		}
		 else {
		 	
		}
		var tk = form['thietke'].value;
		if(tk=='') {
			document.getElementById('n-tk').innerHTML='<span class="text-danger">Thiết kế không được để trống!</span>';
			form['thietke'].focus();
			return false;
		}
		else {
			document.getElementById('n-tk').innerHTML='';
		}

		var mh = form['manhinh'].value;
		if(mh=='') {
			document.getElementById('n-mh').innerHTML='<span class="text-danger">Khả năng chụp ảnh không được để trống!</span>';
			form['manhinh'].focus();
			return false;
		}
		else {
			document.getElementById('n-mh').innerHTML='';

		}

		var ch = form['cauhinh'].value;
		if(ch=='') {
			document.getElementById('n-ch').innerHTML='<span class="text-danger">Bộ cảm biến không được để trống!</span>';
			form['cauhinh'].focus();
			return false;
		}
		else {
			document.getElementById('n-ch').innerHTML='';

		}
		var bm = form['baomat'].value;
		if(bm=='') {
			document.getElementById('n-bm').innerHTML='<span class="text-danger">Ống kính không được để trống!</span>';
			form['baomat'].focus();
			return false;
		}
		else {
			document.getElementById('n-bm').innerHTML='';
			
		}
		

		return true;
	}
</script>