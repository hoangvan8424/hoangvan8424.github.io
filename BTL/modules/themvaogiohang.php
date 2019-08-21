<?php
	session_start();
	require("../DB/connect.php");
	// unset($_SESSION['cart']);
	
	
	if(isset($_POST['id'])) {
		$id=$_POST['id'];		
		$sqldetail = "SELECT * FROM sanpham WHERE maSP=".$id;
		$result = mysql_query($sqldetail);
		$row = mysql_fetch_row($result);
		
		
		
		if(!empty($_SESSION['cart'])) {
			// Từ lần thứ hai mua hàng
			$cart = $_SESSION['cart'];
			if(array_key_exists($id, $cart)) {
				$cart[$id] = array(
					"soluong" => (int)$cart[$id]['soluong']+1,
					"gia" => $row[4],
					"ten" => $row[1],
					"anh" => $row[2],
					"giagoc" => $row[9],
					"km" => $row[5]
				);
			}
			else {
				$cart[$id] = array(
					'soluong' => 1,
					'gia' => $row[4],
					'ten' => $row[1],
					"anh" => $row[2],
					"giagoc" => $row[9],
					"km" => $row[5]
				);
			}
		}
		else
		{
			// Lần đầu mua hàng
			$cart[$id] = array(
				'soluong' => 1,
				'gia' => $row[4],
				'ten' => $row[1],
				"anh" => $row[2],
				"giagoc" => $row[9],
				"km" => $row[5]
			);
		}
		$_SESSION['cart'] = $cart;
	


	}else {
		// Quay về trang chủ
	}
	

	// echo '<pre>';
	// print_r($_SESSION['cart']);

	



?>