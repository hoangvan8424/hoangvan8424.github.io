<?php
	if (isset($_POST['btnthem'])) {
		$ktmh = $_POST['ktmh'];
		$dopg = $_POST['dpgmh'];
		$cnmh = $_POST['cnmh'];
		$cumh = $_POST['cumh'];

		$cpu = $_POST['tencpu'];
		$loaicpu = $_POST['loaicpu'];
		$tocdocpu = $_POST['tocdocpu'];
		$tdtoidacpu = $_POST['tocdotoidacpu'];

		$ckn = $_POST['congkn'];
		$blu = $_POST['bluetooth'];
		$odia = $_POST['odia'];
		$cam = $_POST['webcam'];

		$ram = $_POST['ram'];
		$loairam = $_POST['loairam'];
		$tocdoram = $_POST['tocdoram'];
		$ocung = $_POST['ocung'];

		$tenSP = $_POST['chontensp'];
		$sql_maSP = "SELECT maSP FROM sanpham WHERE tenSP = '$tenSP' ";
		$kq_maSP = mysql_fetch_row(mysql_query($sql_maSP));
		$maSP = $kq_maSP[0];

		$sql1 = "INSERT INTO tskt_manhinh(maSP, kichthuoc, dophangiai, congnghe, camung)
				VALUES('$maSP', '$ktmh', '$dopg', '$cnmh', '$cumh')";
		$kq1=mysql_query($sql1);

		$sql2 = "INSERT INTO tskt_ketnoi(maSP, congkn, bluetooth, odia, webcam)
				VALUES('$maSP', '$ckn', '$blu', '$odia', '$cam')";
		$kq2=mysql_query($sql2);

		$sql3 = "INSERT INTO tskt_cpu(maSP, tencpu, loaicpu, tocdocpu, tocdotoida)
				VALUES('$maSP', '$cpu', '$loaicpu', '$tocdocpu', '$tdtoidacpu')";
		$kq3=mysql_query($sql3);

		$sql4 = "INSERT INTO tskt_ramoc(maSP, ram, tocdoram, loairam, ocung)
				VALUES('$maSP', '$ram', '$tocdoram', '$loairam', '$ocung')";
		$kq4=mysql_query($sql4);

		if($kq1==1 and $kq2==1 and $kq3==1 and $kq4==1) {
			echo '<script>
					alert("Thêm dữ liệu thành công!");
					location.assign("admin.php?module=tschmt");
				</script>';
		}
		else {
			echo '<script>
					alert("Thêm dữ liệu thất bại!");
					location.assign("admin.php?module=tschmt");
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
					  (SELECT maSP FROM tsktmt)
					  AND maDM=1";
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
			<div id="manhinh">
				<label>Kích thước màn hình</label><input type="text" name="ktmh" class="ip mt-4">
				<div id="n-ktmh" class="text-center"></div>
				<label>Độ phân giải</label><input type="text" name="dpgmh" class="ip mt-4">
				<div id="n-dpgmh" class="text-center"></div>
				<label>Công nghệ</label><input type="text" name="cnmh" class="ip mt-4">
				<div id="n-cnmh" class="text-center"></div>
				<label>Cảm ứng</label><input type="text" name="cumh" class="ip mt-4">
				<div id="n-cumh" class="text-center"></div>
			</div>
			<hr>
			<div id="cpu">
				<label>Tên CPU</label><input type="text" name="tencpu" class="ip mt-4">
				<div id="n-tencpu" class="text-center"></div>
				<label>Loại CPU</label><input type="text" name="loaicpu" class="ip mt-4">
				<div id="n-loaicpu" class="text-center"></div>
				<label>Tốc độ</label><input type="text" name="tocdocpu" class="ip mt-4">
				<div id="n-tocdocpu" class="text-center"></div>
				<label>Tốc độ tối đa</label><input type="text" name="tocdotoidacpu" class="ip mt-4">
				<div id="n-tocdotoidacpu" class="text-center"></div>
			</div>
			
		</div>
		<div class="col-6">
			<div id="ketnoi">
				<label>Cổng kết nối</label><textarea type="text" name="congkn" class="ip mt-4"></textarea>
				<div id="n-ckn" class="text-center"></div>
				<label>Bluetooth</label><input type="text" name="bluetooth" class="ip mt-4">
				<div id="n-bluetooth" class="text-center"></div>
				<label>Ổ đĩa</label><input type="text" name="odia" class="ip mt-4">
				<div id="n-odia" class="text-center"></div>
				<label>Webcam</label><input type="text" name="webcam" class="ip mt-4">
				<div id="n-webcam" class="text-center"></div>
			</div>
			<hr>
			<div id="ram">
				<label>RAM</label><input type="text" name="ram" class="ip mt-4">
				<div id="n-ram" class="text-center"></div>
				<label>Loại RAM</label><input type="text" name="loairam" class="ip mt-4">
				<div id="n-loairam" class="text-center"></div>
				<label>Tốc độ RAM</label><input type="text" name="tocdoram" class="ip mt-4">
				<div id="n-tocdoram" class="text-center"></div>
				<label>Ổ cứng</label><input type="text" name="ocung" class="ip mt-4">
				<div id="n-ocung" class="text-center"></div>	
			</div>
		</div>

		<div class="button-cnsp mb-3" style="width: 95%">
			<button class="btn btn-success btn-sm btn-block mt-sm-5 mr-3" type="submit" name="btnthem">Thêm</button>
			<a href="admin.php?module=tschmt" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
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
		var ktmh = form['ktmh'].value;
		if(ktmh =='') {
			document.getElementById('n-ktmh').innerHTML='<span class="text-danger">Kích thước màn hình không được để trống!</span>';
			form['ktmh'].focus();
			return false;
		}
		else {
			document.getElementById('n-ktmh').innerHTML='';
		}

		var dpg  = form['dpgmh'].value;
		if(dpg =='') {
			document.getElementById('n-dpgmh').innerHTML='<span class="text-danger">Độ phân giải không được để trống!</span>';
			form['dpgmh'].focus();
			return false;
		}
		else {
			document.getElementById('n-dpgmh').innerHTML='';
		}

		var cn = form['cnmh'].value;
		if(cn =='') {
			document.getElementById('n-cnmh').innerHTML='<span class="text-danger">Công nghệ không được để trống!</span>';
			form['cnmh'].focus();
			return false;
		}
		else {
			document.getElementById('n-cnmh').innerHTML='';
		}

		var cu = form['cumh'].value;
		if(cu =='') {
			document.getElementById('n-cumh').innerHTML='<span class="text-danger">Cảm ứng không được để trống!</span>';
			form['cumh'].focus();
			return false;
		}
		else {
			document.getElementById('n-cumh').innerHTML='';
		}

		var tencpu = form['tencpu'].value;
		if(tencpu =='') {
			document.getElementById('n-tencpu').innerHTML='<span class="text-danger">Tên CPU không được để trống!</span>';
			form['tencpu'].focus();
			return false;
		}
		else {
			document.getElementById('n-tencpu').innerHTML='';
		}

		var loaicpu = form['loaicpu'].value;
		if(loaicpu =='') {
			document.getElementById('n-loaicpu').innerHTML='<span class="text-danger">Loại CPU không được để trống!</span>';
			form['loaicpu'].focus();
			return false;
		}
		else {
			document.getElementById('n-loaicpu').innerHTML='';
		}

		var tocdo = form['tocdocpu'].value;
		if(tocdo =='') {
			document.getElementById('n-tocdocpu').innerHTML='<span class="text-danger">Tốc độ CPU không được để trống!</span>';
			form['tocdocpu'].focus();
			return false;
		}
		else {
			document.getElementById('n-tocdocpu').innerHTML='';
		}

		var tocdotoida = form['tocdotoidacpu'].value;
		if(tocdotoida =='') {
			document.getElementById('n-tocdotoidacpu').innerHTML='<span class="text-danger">Tốc độ tối đa không được để trống!</span>';
			form['tocdotoidacpu'].focus();
			return false;
		}
		else {
			document.getElementById('n-tocdotoidacpu').innerHTML='';
		}

		var congkn = form['congkn'].value;
		if(congkn =='') {
			document.getElementById('n-ckn').innerHTML='<span class="text-danger">Cổng kết nối không được để trống!</span>';
			form['congkn'].focus();
			return false;
		}
		else {
			document.getElementById('n-ckn').innerHTML='';
		}

		var blu  = form['bluetooth'].value;
		if(blu =='') {
			document.getElementById('n-bluetooth').innerHTML='<span class="text-danger">Bluetooth không được để trống!</span>';
			form['bluetooth'].focus();
			return false;
		}
		else {
			document.getElementById('n-bluetooth').innerHTML='';
		}

		var odia = form['odia'].value;
		if(odia =='') {
			document.getElementById('n-odia').innerHTML='<span class="text-danger">Ổ đĩa không được để trống!</span>';
			form['odia'].focus();
			return false;
		}
		else {
			document.getElementById('n-odia').innerHTML='';
		}

		var cam = form['webcam'].value;
		if(cam =='') {
			document.getElementById('n-webcam').innerHTML='<span class="text-danger">Webcam không được để trống!</span>';
			form['webcam'].focus();
			return false;
		}
		else {
			document.getElementById('n-webcam').innerHTML='';
		}

		var ram = form['ram'].value;
		if(ram =='') {
			document.getElementById('n-ram').innerHTML='<span class="text-danger">RAM không được để trống!</span>';
			form['ram'].focus();
			return false;
		}
		else {
			document.getElementById('n-ram').innerHTML='';
		}

		var loairam = form['loairam'].value;
		if(loairam =='') {
			document.getElementById('n-loairam').innerHTML='<span class="text-danger">Loại RAM không được để trống!</span>';
			form['loairam'].focus();
			return false;
		}
		else {
			document.getElementById('n-loairam').innerHTML='';
		}

		var tocdoram = form['tocdoram'].value;
		if(tocdoram =='') {
			document.getElementById('n-tocdoram').innerHTML='<span class="text-danger">Tốc độ RAM không được để trống!</span>';
			form['tocdoram'].focus();
			return false;
		}
		else {
			document.getElementById('n-tocdoram').innerHTML='';
		}

		var ocung = form['ocung'].value;
		if(ocung =='') {
			document.getElementById('n-ocung').innerHTML='<span class="text-danger">Ổ cứng không được để trống!</span>';
			form['ocung'].focus();
			return false;
		}
		else {
			document.getElementById('n-ocung').innerHTML='';
		}

		return true;
	}


</script>