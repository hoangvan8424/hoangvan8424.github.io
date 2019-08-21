<div class="modal fade" role="dialog" data-backdrop="static" id="form-contact" style="display:none;"> <!-- popup liên hệ -->
	<div class="modal-dialog modal-dialog-scrollable" role="document"> <!-- bắt đầu modal-dialog -->
	  	<div class="modal-content" style="border-radius: 0;"> <!-- bắt đầu modal content -->

	  		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <!-- bắt đầu button close -->
                <i class="fas fa-times"></i>
            </button> <!-- kết thúc button close -->

	    	<h3 style="text-align: center; margin-top: 6px">Liên hệ chúng tôi </h3>

	    	<div class="modal-body"> <!-- bắt đầu modal-body -->		    		
				<form name="dangky" action="lienhe.php" method="POST"> <!-- bắt đầu form -->
					<div class="input-group mb-3"> <!-- họ tên -->
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fas fa-user-tie"></i>
							</span>
						</div>
						<input class="form-control" type="text" name="hoten" id="hoten" placeholder="Họ tên" required title="Vui lòng nhập họ tên">
					</div> <!-- hết họ tên -->
					
					<div class="input-group mb-3"> <!-- email -->
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fas fa-envelope"></i>
							</span>
						</div>
						<input class="form-control" type="email" name="email" id="email" placeholder="Email">
					</div><!-- hết email -->

					<div class="input-group mb-3"> <!-- password -->
						<div class="input-group-prepend">
							<span class="input-group-text">
							<i class="fas fa-envelope-square"></i>
							</span>
						</div>
						<textarea name="noidung" id="noidung" rows="10" cols="60" placeholder="Nội dung" style="width: 90%"></textarea>
					</div> <!-- hết password -->

	

					<div class="row mt-1"> <!-- button tạo tài khoản -->
						<div class="col-12 text-center">
							<button type="submit" name="sb" class="btn btn-primary px-4 btn-block">Gửi</button>
						</div> 					
					</div> <!-- hết button tạo tài khoản -->

				</form> <!-- kết thúc form -->
	    	</div> <!-- hết modal-body -->
		</div> <!-- hết modal-content -->			
	</div> <!-- hết modal-dialog -->
</div> <!-- hết from liên hệ -->