<?php
	require("../DB/connect.php");
	if(isset($_GET['id'])){
		$code = $_GET['id'];

		$sql = "SELECT * FROM sanpham AS sp, chitietmt AS ctmt WHERE sp.maSP = ctmt.maSP and tenSP like '%$code%' UNION SELECT * FROM sanpham AS sp, chitietma AS ctma WHERE sp.maSP = ctma.maSP and tenSP like '%$code%' LIMIT 1,6
		";

		$query = mysql_query($sql);

		$num = mysql_num_rows($query);
		if($num>0){
			while ($row = mysql_fetch_array($query)) {

				echo "<table class='kq' style='position: absolute;top: 54px;left: 446px;width: 345px;background: white;box-shadow: 6px -1px 8px;text-decoration: unset;   z-index: 100;'>";
				while ($row = mysql_fetch_array($query)) {
			 		echo '<tr>							
							<td class="td-tk">
								<a class="text-dark" href="chitietmt.php?id='.$row['maSP'].'">
									<img class="anh-tk mr-3" src="../img/'.$row['hinhanh'].'">
									<div class="ten-sp-tk mt-3">
										<p>'.$row['tenSP'].'</p>
										<p>'.number_format($row['gia'], 0,'.', '.').'đ</p>
									</div>						 	
							 	</a>
							</td>
						</tr>';

					
		 		}	    		
				echo "</table>";
		 
			}
		}
	}

?>
