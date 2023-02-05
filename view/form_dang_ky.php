<?php
include("link.php");
?>
<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Đăng Ký</h3>
							<form action="?action=dang_ky" method="post">
								<div class="account__form">
									<div class="input__box">
										<label>Email <span>*</span></label>
										<input type="text" name="email" required>
									</div>
									<div class="input__box">
										<label>Mật Khẩu<span>*</span></label>
										<input type="password" name="password" required>
									</div>

									<div class="input__box">
										<label>Tên <span>*</span></label>
										<input type="text" name="ten" required>
									</div>

									<div class="input__box">
										<label>Số điện thoại <span>*</span></label>
										<input type="text" name="sdt" required>
									</div>

									<div class="input__box">
										<label>Địa Chỉ <span>*</span></label>
										<input type="text" name="dia_chi" required>
									</div>




									<div class="form__btn">
										
										<input type="submit" name="btn_submit" value="Đăng Nhập">
										<label class="label-for-checkbox">
											<input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
											<span>Ghi nhớ</span>
										</label>
									</div>
									<a class="forget_pass" href="#">Bạn Quên Mật Khẩu?</a>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- End My Account Area -->