<?php
	session_start();
	// unset($_SESSION['cart']);
	require("../DB/connect.php");
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	if(isset($_POST["btn-tieptheo"])) {

		$hinhthucnh = $_POST["nhanhang"];
		$hoten = $_POST["hoten-tt"];
		$email = $_POST["email-tt"];
		$sdt = $_POST["number-tt"];
		$phuongHN = $_POST["phuong-hn"];
		$phuongHCM = $_POST["phuong-hcm"];
		$mand = '';
		if(isset($_SESSION['user']['ID'])){
			$mand = $_SESSION['user']['ID'];
		}
			
		
		if($hinhthucnh==='Nhận tại nhà') {
			$sonha = $_POST["sonha"];
			$tp = $_POST["chon-tp"];
			if($tp=='Hà Nội') {

				if($phuongHN=='Quận Thanh Xuân'){
	
					$xaHN = $_POST["xa-hn"];									
				}
				else {

					$xaHN = $_POST["xa-hn-2"];					
				}
				$diachi= $sonha.", ".$xaHN.", " . $phuongHN.", " .$tp;
				

				$sql = 'INSERT INTO hoadon(maND, ngaydathang, trangthai, email, hinhthucnhanhang, hoten, sdt, diachinhanhang)';
				$sql.= 'VALUES ("'.$mand.'", "'.date("Y-m-d H:i:s").'", "0", "'.$email.'", "'.$hinhthucnh.'", "'.$hoten.'", "'.$sdt.'", "'.$diachi.'")';

				mysql_query($sql);
				$last_id = mysql_insert_id($connect);
				foreach ($_SESSION['cart'] as $key => $value) {
					$sqlinsertCTHD = 'INSERT INTO chitiethd(maHD, maSP, gia, soluong, tongtien, ngaylapcthd)';
					$sqlinsertCTHD .= 'VALUES("'.$last_id.'", "'.$key.'", "'.$value['gia'].'", "'.$value['soluong'].'", "'.$value['gia']*$value['soluong'].'", "'.date("Y-m-d H:i:s").'")';
					mysql_query($sqlinsertCTHD);

				}

				echo "
						<script>
							alert('Đặt hàng thành công!');
							window.location.href ='trangchu.php';
						</script>";
				unset($_SESSION['cart']);
			}
			else {
				if($phuongHCM=='Phường Tân Bình') {
					$xaHCM = $_POST["xa-hcm-2"];
				}
				else {
					$xaHCM = $_POST["xa-hcm"];
				}
							
				$diachi= $sonha.", ".$xaHCM.", " . $phuongHCM.", " .$tp;

				$sql = 'INSERT INTO hoadon(maND, ngaydathang, trangthai, email, hinhthucnhanhang, hoten, sdt, diachinhanhang)';
				$sql.= 'VALUES ("'.$mand.'", "'.date("Y-m-d H:i:s").'", "0", "'.$email.'", "'.$hinhthucnh.'", "'.$hoten.'", "'.$sdt.'", "'.$diachi.'")';
				
				mysql_query($sql);
				$last_id = mysql_insert_id($connect);

				foreach ($_SESSION['cart'] as $key => $value) {
					$sqlinsertCTHD = 'INSERT INTO chitiethd(maHD, maSP, gia, soluong, tongtien, ngaylapcthd)';
					$sqlinsertCTHD .= 'VALUES("'.$last_id.'", "'.$key.'", "'.$value['gia']*$value['soluong'].'", "'.$value['soluong'].'", "'.$tongTienSP.'", "'.date("Y-m-d H:i:s").'")';
					mysql_query($sqlinsertCTHD);
				}
				echo "
						<script>
							alert('Đặt hàng thành công!');
							window.location.href ='trangchu.php';
						</script>";
				unset($_SESSION['cart']);
			}			
			
		}
		else {
			$dccuahang = $_POST["cuahang"];
			$sql = 'INSERT INTO hoadon(maND, ngaydathang, trangthai, email, hinhthucnhanhang, hoten, sdt, diachinhanhang)';
			$sql.= 'VALUES ("'.$mand.'", "'.date("Y-m-d H:i:s").'", "0", "'.$email.'", "'.$hinhthucnh.'", "'.$hoten.'", "'.$sdt.'", "'.$dccuahang.'")';
			
			mysql_query($sql);
			$last_id = mysql_insert_id($connect);

			foreach ($_SESSION['cart'] as $key => $value) {
				$sqlinsertCTHD = 'INSERT INTO chitiethd(maHD, maSP, gia, soluong, tongtien, ngaylapcthd)';
				$sqlinsertCTHD .= 'VALUES("'.$last_id.'", "'.$key.'", "'.$value['gia'].'", "'.$value['soluong'].'", "'.$value['gia']*$value['soluong'].'", "'.date("Y-m-d H:i:s").'")';
				mysql_query($sqlinsertCTHD);
			}
			echo "
						<script>
							alert('Đặt hàng thành công!');
							window.location.href ='trangchu.php';
						</script>";
			unset($_SESSION['cart']);
		}				
	}


?>