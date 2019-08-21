<div class="modal fade" id="form-dangnhap" role="dialog" data-backdrop="static" style="display: none;"> <!-- popup đăng nhập -->
	<div class="modal-dialog modal-dialog-scrollable" role="document">
	  	<div class="modal-content">
	  		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
	        <ul class="nav nav-tabs">
				<li class="nav-item li-chung li-dn">
					<button type="button" class="btn btn-link bt-dn" id="dn-1">Đăng nhập</button>
				</li>
				<li class="nav-item li-chung">
					<button type="button" class="btn btn-link bt-dn" id="dk-1">Đăng ký</button>
				</li>			
			</ul>
		    <!-- Modal Header -->	    
		    <div class="modal-body"> <!-- Modal body -->  	        
				<form action="login.php" method="post">	<!-- bắt đầu form -->
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fas fa-user-tie"></i>
							</span>
						</div>
						<input class="form-control" type="text" name="email" id="email" placeholder="Nhập Email" required>
					</div>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text">
							<i class="fas fa-unlock-alt"></i>
							</span>
						</div>
						<input class="form-control" type="password" name="password" id="password" placeholder="Nhập Mật khẩu (Từ 6 đến 30 ký tự)" required>
					</div>
					<div class="row text-left">
						<button class="btn btn-link px-0" type="button">Quên mật khẩu?</button>
					</div>

					<div class="row mt-3">
						<div class="col-12">
							<button class="btn btn-primary px-4 btn-block" type="submit" name="sb" id="sb">Đăng nhập</button>	
						</div>													
					</div>
					
					<div class="row mt-4">
						<div class="col-12">
							<a href="#" class="btn btn-block btn-facebook" style="background: #32508E; color: #FFF;">
		                        <i class="fab fa-facebook text-left" ></i>
		                        <span>Đăng nhập bằng Facebook</span>
	                    	</a>
						</div>																				
					</div>

					<div class="row mt-4">
						<div class="col-12" >
							<a href="#" class="btn btn-block btn-gg" style="background: #DD4B39; color: #FFF;">
		                        <i class="fab fa-google-plus-g"></i>
		                        <span>Đăng nhập bằng Google</span>
	                    	</a>
						</div>															
					</div>

				</form> <!-- hết form -->
			</div> <!-- hết modal-body -->
		</div> <!-- hết modal-content -->
    </div> <!-- hết modal-dialog -->
</div> <!-- kết thúc form đăng nhập -->
