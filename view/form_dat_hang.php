<?php
include("link.php");
?>
<!-- Start Checkout Area -->
        <section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-12">
        				<div class="wn_checkout_wrap">
        					<div class="checkout_info">
        						<span>Bạn chưa đăng nhập?</span>
        						<a class="showlogin" href="?action=dang_nhap">Bấm vào đây để đăng nhập</a>
        					</div>

        					<div class="checkout_info">
        						<span>Bạn có mã giảm giá? </span>
        						<a class="showcoupon" href="#">Nhập mã giảm giá</a>
        					</div>
        					<div class="checkout_coupon">
        						<form action="" method="post">
        							<div class="form__coupon">
        								<input type="text" placeholder="Coupon code">
        								<button>Áp dụng mã giảm giá</button>
        							</div>
        						</form>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="row">
					<div class="col-lg-6 col-12">
					<form action="" method="post">
					<?php if(!isset($_SESSION['login'])){ ?>
        			
					<div class="customer_details">
						<h3>Nhập Thông Tin Đặt Hàng</h3>
						<div class="customar__field">
							<div class="margin_between">
								<div class="input_box space_between">
									<label>Tên khách hàng<span>*</span></label>
									<input name="ten" type="text" required>
								</div>
								<div class="input_box space_between">
									<label>Số Điện Thoại <span>*</span></label>
									<input name="sdt" type="text" required>
								</div>
							</div>
							<div class="input_box">
								<label>Địa Chỉ <span>*</span></label>
								<input name="dia_chi" type="text" required>
							</div>

							<div class="input_box">
								<label>Email <span>*</span></label>
								<input name="email" type="email" required>
							</div>

						</div>
					</div>
					<input type="hidden" name="action" value="dat_hang">
					<input style="margin-left: 30%; margin-top: 5%; margin-bottom: 5%;" class="btn btn-outline-success btn-lg" type="submit" name="btn_dat_hang" value="Đặt Hàng">
					</form>   
				</div>
				<?php }else{ ?>
					<div class="customer_details">
						<h3>Nhập Thông Tin Đặt Hàng</h3>
						<div class="customar__field">
							<div class="margin_between">
								<div class="input_box space_between">
									<label>Tên khách hàng<span>*</span></label>
									<input name="ten" type="text" value="<?php echo $_SESSION['user']; ?>">
								</div>
								<div class="input_box space_between">
									<label>Số Điện Thoại <span>*</span></label>
									<input name="sdt" type="text" value="<?php echo $_SESSION['sdt']; ?>" >
								</div>
							</div>
							<div class="input_box">
								<label>Giao đến <span>*</span></label>
								<input name="dia_chi" type="text" value="<?php echo $_SESSION['dia_chi']; ?>">
							</div>

							<div class="input_box">
								<label>Email <span>*</span></label>
								<input name="email" type="email" value="<?php echo $_SESSION['email']; ?>">
							</div>

						</div>
					</div>   
				</div>

				<?php } ?>
				<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
					<div class="wn__order__box">
						<h3 class="onder__title">Thông tin đơn hàng</h3>
						<ul class="order__total">
							<li>Sách</li>
							<li>Thành tiền</li>
						</ul>
						<ul class="order_product">
						<?php if(isset($_SESSION['gio_hang'])){
								foreach($_SESSION['gio_hang'] as $value){	
						?>
						
							<li><?php echo $value['ten_sach']; ?> × <?php echo $value['so_luong']; ?><span><?php echo number_format($value['thanh_tien']); ?>VNĐ</span></li>
						
								<?php } ?>
						</ul>
						<ul class="shipping__method">
							<li>Phương thức thanh toán
								<ul>
									<li>
										<input name="shipping_method[0]" data-index="0" value="legacy_flat_rate" checked="checked" type="radio">
										<label>Thanh toán khi nhận hàng</label>
									</li>
									<li>
										<input name="shipping_method[0]" data-index="0" value="legacy_flat_rate" checked="checked" type="radio">
										<label>Thanh toán qua thẻ ngân hàng</label>
									</li>
									<li>
										<input name="shipping_method[0]" data-index="0" value="legacy_flat_rate" checked="checked" type="radio">
										<label>Thanh toán qua ví điện tử</label>
									</li>
								</ul>
							</li>
						</ul>
						<?php } ?>
						<ul class="total__amount">
							<li>Tổng tiền <span><?php echo number_format($tong_tien); ?>VNĐ</span></li>
						</ul>
						
						<ul class="total__amount">
				
						<?php if(isset($_SESSION['login'])){ ?>
						<form action="" method="post"><input style="margin-left: 30%; margin-top: 5%; margin-bottom: 5%;" class="btn btn-outline-success btn-lg" type="submit" name="btn_dat_hang" value="Đặt Hàng"> <input type="hidden" name="action" value="dat_hang"></form>
						<?php } ?>
						</ul>
						 
                   
        			</div>
						

					</div>
					
        		</div>
        	</div>
        </section>
        <!-- End Checkout Area -->