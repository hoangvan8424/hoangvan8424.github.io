<?php
	if (isset($_POST['btnthem'])) {
		$model = $_POST['model'];
		$mausac = $_POST['mausac'];
		$nhasx = $_POST['nhasx'];
		$xuatxu = $_POST['xuatxu'];

		$dopg = $_POST['dopg'];
		$boxuly = $_POST['boxuly'];
		$laynet = $_POST['laynet'];
		$khuonmat = $_POST['khuonmat'];

		$mh = $_POST['manhinh'];
		$kt = $_POST['kichthuoc'];
		$cbtrang = $_POST['cbtrang'];
		$iso = $_POST['iso'];

		$loaiok = $_POST['loaiok'];
		$tieucu = $_POST['tieucu'];
		
		$tenSP = $_POST['chontensp'];
		$sql_maSP = "SELECT maSP FROM sanpham WHERE tenSP = '$tenSP' ";
		$kq_maSP = mysql_fetch_row(mysql_query($sql_maSP));
		$maSP = $kq_maSP[0];

		$sql = "INSERT INTO tsktma(maSP, model, mausac, nhasanxuat, xuatxu, dophangiai, boxuly, tudonglaynet, nhandienkhuonmat, loaimanhinh, kichthuoc, canbangtrang, ISO, loaiongkinh, tieucu) 
			VALUES('$maSP', '$model', '$mausac', '$nhasx', '$xuatxu', '$dopg', '$boxuly', '$laynet', '$khuonmat', '$mh', '$kt', '$cbtrang', '$iso', '$loaiok', '$tieucu') ";
		$kq = mysql_query($sql);
		if($kq) {
			echo '<script>
					alert("Thêm dữ liệu thành công!");
					location.assign("admin.php?module=tschma");
				</script>';
		}
		else {
			echo '<script>
					alert("Thêm dữ liệu thất bại!");
					location.assign("admin.php?module=tschma");
				</script>';
		} 
	}
?>

<h5 class="h-cnsp text-center mt-2">Thêm thông số cấu hình máy tính</h5>
<form name="themts" method="POST" onsubmit="return checktt()" action="" >
	<?php
		$sql_check = "SELECT tenSP 
					  FROM sanpham
					  WHERE maSP NOT IN
					  (SELECT maSP FROM tsktma)
					  AND maDM=2";
		$kqcheck=mysql_query($sql_check);
		$numrow=mysql_num_rows($kqcheck);
		if($numrow>0) {
			echo '<label style="width: 30%;font-weight: 600;">Tên sản phẩm</label>';
			echo '<select name="chontensp" class="mt-4" style="width: 50%;height: 33px;">';	
			while ($rowcheck=mysql_fetch_row($kqcheck)) {

	?>
		<option value="<?php echo $rowcheck[0]?>"><?php echo $rowcheck[0]?></option>
	<?php
			}
	?>
	</select>
	<div class="row mt-3 mb-3">
		<div class="col-6" style="border-right: 1px solid #CCC;">
			<div class="ma-tskt">
				<label>Model</label><input type="text" name="model" class="ip mt-4">
				<div id="n-model" class="text-center"></div>
				<label>Màu sắc</label><input type="text" name="mausac" class="ip mt-4">
				<div id="n-mausac" class="text-center"></div>
				<label>Nhà sản xuất</label><input type="text" name="nhasx" class="ip mt-4">
				<div id="n-nhasx" class="text-center"></div>
				<label>Xuất xứ</label><input type="text" name="xuatxu" class="ip mt-4">
				<div id="n-xuatxu" class="text-center"></div>

				<label>Độ phân giải</label><input type="text" name="dopg" class="ip mt-4">
				<div id="n-dopg" class="text-center"></div>
				<label>Bộ xử lý</label><input type="text" name="boxuly" class="ip mt-4">
				<div id="n-boxuly" class="text-center"></div>
				<label>Tự động lấy nét</label><input type="text" name="laynet" class="ip mt-4">
				<div id="n-laynet" class="text-center"></div>
				<label style="position: relative;top: 15px;">Nhận diện khuôn mặt</label><input type="text" name="khuonmat" class="ip mt-4">
				<div id="n-khuonmat" class="text-center"></div>
			</div>
			
		</div>
		<div class="col-6">
			<div class="ma-tskt">
				<label>Loại màn hình</label><input type="text" name="manhinh" class="ip mt-4">
				<div id="n-manhinh" class="text-center"></div>
				<label>Kích thước</label><input type="text" name="kichthuoc" class="ip mt-4">
				<div id="n-kichthuoc" class="text-center"></div>
				<label style="position: relative;bottom: 32px;">Cân bằng trắng</label><textarea type="text" name="cbtrang" class="ip mt-4"></textarea>
				<div id="n-cbtrang" class="text-center"></div>
				
				<label>ISO</label><input type="text" name="iso" class="ip mt-4">
				<div id="n-iso" class="text-center"></div>
				<label>Loại ống kinh</label><input type="text" name="loaiok" class="ip mt-4">
				<div id="n-loaiok" class="text-center"></div>
				<label>Tiêu cự</label><input type="text" name="tieucu" class="ip mt-4">
				<div id="n-tieucu" class="text-center"></div>
				
			</div>
		</div>

		<div class="button-cnsp mb-3" style="width: 95%">
			<button class="btn btn-success btn-sm btn-block mt-sm-5 mr-3" type="submit" name="btnthem">Thêm</button>
			<a href="admin.php?module=tschma" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
		</div>
	</div>
	<?php
		}else {
			echo '<p class="text-center text-danger" style="font-size:25px; margin-top: 50px;">Tất cả sản phẩm đã được thêm thông số cấu hình!</p>';
			echo '<a href="admin.php?module=tschmt" class="btn btn-success" style="display: block;
    				width: 200px;height: 40px;line-height: 27px;text-align: center;margin-left: 40%;font-size: 18px;"><i class="fas fa-backward mr-3"></i>Quay lại</a>';			
		}


	?>
</form>
<script type="text/javascript">
	function checktt(){
		var form = document.forms['themts'];
		var md = form['model'].value;
		if(md =='') {
			document.getElementById('n-model').innerHTML='<span class="text-danger">Model không được để trống!</span>';
			form['model'].focus();
			return false;
		}
		else {
			document.getElementById('n-model').innerHTML='';
		}

		var mau  = form['mausac'].value;
		if(mau =='') {
			document.getElementById('n-mausac').innerHTML='<span class="text-danger">Màu sắc không được để trống!</span>';
			form['mausac'].focus();
			return false;
		}
		else {
			document.getElementById('n-mausac').innerHTML='';
		}

		var nhasx = form['nhasx'].value;
		if(nhasx =='') {
			document.getElementById('n-nhasx').innerHTML='<span class="text-danger">Nhà sản xuất không được để trống!</span>';
			form['nhasx'].focus();
			return false;
		}
		else {
			document.getElementById('n-nhasx').innerHTML='';
		}

		var xx = form['xuatxu'].value;
		if(xx =='') {
			document.getElementById('n-xuatxu').innerHTML='<span class="text-danger">Xuất xứ không được để trống!</span>';
			form['xuatxu'].focus();
			return false;
		}
		else {
			document.getElementById('n-xuatxu').innerHTML='';
		}

		var pg = form['dopg'].value;
		if(pg =='') {
			document.getElementById('n-dopg').innerHTML='<span class="text-danger">Độ phân giải không được để trống!</span>';
			form['dopg'].focus();
			return false;
		}
		else {
			document.getElementById('n-dopg').innerHTML='';
		}

		var xl = form['boxuly'].value;
		if(xl =='') {
			document.getElementById('n-boxuly').innerHTML='<span class="text-danger">Bộ xử lý không được để trống!</span>';
			form['boxuly'].focus();
			return false;
		}
		else {
			document.getElementById('n-boxuly').innerHTML='';
		}

		var ln = form['laynet'].value;
		if(ln =='') {
			document.getElementById('n-laynet').innerHTML='<span class="text-danger">Tự động lấy nét không được để trống!</span>';
			form['laynet'].focus();
			return false;
		}
		else {
			document.getElementById('n-laynet').innerHTML='';
		}

		var km = form['khuonmat'].value;
		if(km =='') {
			document.getElementById('n-khuonmat').innerHTML='<span class="text-danger">Nhận diện khuôn mặt không được để trống!</span>';
			form['khuonmat'].focus();
			return false;
		}
		else {
			document.getElementById('n-khuonmat').innerHTML='';
		}

		var manhinh = form['manhinh'].value;
		if(manhinh =='') {
			document.getElementById('n-manhinh').innerHTML='<span class="text-danger">Loại màn hình không được để trống!</span>';
			form['manhinh'].focus();
			return false;
		}
		else {
			document.getElementById('n-manhinh').innerHTML='';
		}

		var kt  = form['kichthuoc'].value;
		if(kt =='') {
			document.getElementById('n-kichthuoc').innerHTML='<span class="text-danger">Kích thước không được để trống!</span>';
			form['kichthuoc'].focus();
			return false;
		}
		else {
			document.getElementById('n-kichthuoc').innerHTML='';
		}

		var cbtrang = form['cbtrang'].value;
		if(cbtrang =='') {
			document.getElementById('n-cbtrang').innerHTML='<span class="text-danger">Cân bằng trắng không được để trống!</span>';
			form['cbtrang'].focus();
			return false;
		}
		else {
			document.getElementById('n-cbtrang').innerHTML='';
		}

		var iso = form['iso'].value;
		if(iso =='') {
			document.getElementById('n-iso').innerHTML='<span class="text-danger">ISO không được để trống!</span>';
			form['iso'].focus();
			return false;
		}
		else {
			document.getElementById('n-iso').innerHTML='';
		}

		var loaiok = form['loaiok'].value;
		if(loaiok =='') {
			document.getElementById('n-loaiok').innerHTML='<span class="text-danger">Loại ống kính không được để trống!</span>';
			form['loaiok'].focus();
			return false;
		}
		else {
			document.getElementById('n-loaiok').innerHTML='';
		}

		var tc = form['tieucu'].value;
		if(tc =='') {
			document.getElementById('n-tieucu').innerHTML='<span class="text-danger">Tiêu cự không được để trống!</span>';
			form['tieucu'].focus();
			return false;
		}
		else {
			document.getElementById('n-tieucu').innerHTML='';
		}

		return true;
	}


</script>