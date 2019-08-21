<?php
	if(isset($_POST['btnthem'])) {
		$ten = $_POST['tenncc'];
		$dm = $_POST['chondm'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];

		$sql = "INSERT INTO ncc(tenNCC, diachi, sdt, maDM)
				VALUES('$ten', '$diachi', '$sdt', '$dm')";
		$kq = mysql_query($sql);
		if($kq) {
			echo "<script>
					alert('Thêm nhà cung cấp thành công!');
					location.assign('admin.php?module=qlncc');
				   </script>";			
		}
		else {
			echo "<script>
					alert('Thêm nhà cung cấp thất bại!');
					location.assign('admin.php?module=qlncc');
				   </script>";	
		}

	}

?>
<h5 class="h-cnsp text-center mt-2">Thêm nhà cung cấp</h5>
<form class="ml-md-3 mr-md-3 them-sp" name="themncc" method="POST" onsubmit="return check()" action="">
	<label>Tên nhà cung cấp</label><input type="text" name="tenncc" class="ip">
	<div id="n-tenncc" class="text-center"></div>
	<label>Danh mục</label>
	<select type="text" name="chondm" class="ip mt-4">
		<option value="0">Chọn</option>
		<option value="1">Máy tính</option>
		<option value="2">Máy ảnh</option>
	</select>
	<div id="n-chondm" class="text-center"></div>
	<label>Địa chỉ</label><input type="text" name="diachi" class="ip mt-4">
	<div id="n-diachi" class="text-center"></div>
	<label>SĐT</label><input type="number" name="sdt" min="0" max="9999999999" class="ip mt-4">
	<div id="n-sdt" class="text-center"></div>
	<div class="button-cnsp mb-3">
		<button class="btn btn-success btn-sm mt-5 mr-3" type="submit" name="btnthem">Thêm</button>
		<a href="admin.php?module=qlncc" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
	</div>
	
</form>
<script type="text/javascript">
	function check() {
		var form = document.forms['themncc'];

		var tenncc = form['tenncc'].value;
		if(tenncc=='') {
			document.getElementById('n-tenncc').innerHTML='<span class="text-danger">Tên nhà cung cấp không được để trống!</span>';
			form['tenncc'].focus();
			return false;
		}
		else {
			document.getElementById('n-tenncc').innerHTML='';
		}

		var dm = form['chondm'].selectedIndex;
		if(dm==0) {
			document.getElementById('n-chondm').innerHTML='<span class="text-danger">Bạn chưa chọn danh mục sản phẩm!</span>';
			form['chondm'].focus();
			return false;
		}
		else {
			document.getElementById('n-chondm').innerHTML='';
		}

		var diachi = form['diachi'].value;
		if(diachi=='') {
			document.getElementById('n-diachi').innerHTML='<span class="text-danger">Địa chỉ không được để trống!</span>';
			form['diachi'].focus();
			return false;
		}
		else {
			document.getElementById('n-diachi').innerHTML='';
		}

		var sdt = form['sdt'].value;
		if(sdt=='') {
			document.getElementById('n-sdt').innerHTML='<span class="text-danger">SĐT không được để trống!</span>';
			form['sdt'].focus();
			return false;			
		}
		else {
			document.getElementById('n-sdt').innerHTML='';
		}
		return true;
	}
</script>