<?php
include("slider.php");
?>

<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
				<?php 
					include("side_bar_user.php");
				?>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">

							
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2"><span class="color--theme">Kết Quả Tìm Kiếm Cho Từ Khóa'<?php echo $ten_sach; ?>'</span></h2>
							
						</div>
					</div>
				</div>
				<br>
								

        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">
									<?php foreach($objs_sach as $value){ ?>
	        						<!-- Start Single Product -->
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
											<a class="first__img" href="?action=xem_chi_tiet&amp;id_sach=<?php echo $value->getID_sach(); ?>"><img src="<?php echo str_replace("../../","../",$value->getLink_anh()); ?>" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label"><?php echo the_loai_db::getTen_the_loai($value->getID_the_loai())['ten_the_loai']; ?></span>
											</div>
										</div>
										<div class="product__content content--center">
										<h4><a href=""><?php echo $value->getTen_sach(); ?></a></h4>
											<ul class="prize d-flex">
												<li><?php echo number_format($value->getGia()); ?></li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<form action="" method="post">
														<li ><a style="margin-left: 15px;" class="cart" href="?action=them_vao_gio&amp;id_sach=<?php echo $value->getID_sach();?>&amp;so_luong=1"><i class="bi bi-shopping-bag4"></i></a></li>
														</form>
													</ul>
												</div>
											</div>

										</div>
		        					</div>
									<!-- End Single Product -->
									
									<?php } ?>

	        					</div>
								
										<br>
										<br>
										<br>
								
								
							</div>

							</div>
							

        				</div>
        			</div>
        		</div>
        	</div>