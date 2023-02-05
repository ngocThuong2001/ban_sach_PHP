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
							<h2 class="title__be--2"><span class="color--theme">Sách Theo Thể Loại</span></h2>
							
						</div>
					</div>
				</div>
				<br>
								

        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">
									<?php foreach($arr_sach_pt as $value){ ?>
	        						<!-- Start Single Product -->
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
											<a class="first__img" href="?action=xem_chi_tiet&amp;id_sach=<?php echo $value['id_sach']; ?>"><img src="<?php echo str_replace("../../","../",$value['link_anh']); ?>" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label"><?php echo the_loai_db::getTen_the_loai($value['id_the_loai'])['ten_the_loai']; ?></span>
											</div>
										</div>
										<div class="product__content content--center">
										<h4><a href=""><?php echo $value['ten_sach']; ?></a></h4>
											<ul class="prize d-flex">
												<li><?php echo number_format($value['gia']); ?></li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<form action="" method="post">
														<li ><a style="margin-left: 15px;" class="cart" href="?action=them_vao_gio&amp;id_sach=<?php echo $value['id_sach'];?>&amp;so_luong=1"><i class="bi bi-shopping-bag4"></i></a></li>
														</form>
													</ul>
												</div>
											</div>

										</div>
		        					</div>
									<!-- End Single Product -->
									
									<?php } ?>

	        					</div>
	        					<ul class="wn__pagination">
									<?php for($i = 1; $i <= $total_page; $i++){ ?>
	        						<li><a href=".?action=danh_sach_sach&amp;page=<?php echo $i;?>"><?php echo $i;?></a></li>
									<?php } ?>
	        						<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
								</ul>
								
										<br>
										<br>
										<br>
								<div class="row">
									<div class="col-lg-12">
										<div class="section__title text-center">
											<h2 class="title__be--2"><span class="color--theme">Top Sách Bán Chạy</span></h2>
										</div>
									</div>
								</div>
										
								<div class="row mt--60">
								
									<?php foreach($arr_top_sach as $value){ ?>
									<!-- Start Single Product -->
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
											<a class="first__img" href="?action=xem_chi_tiet&amp;id_sach=<?php echo $value['id_sach'] ?>"><img height="300px" src="<?php echo str_replace("../../","../",$value['link_anh']); ?>" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="def.php"><?php echo $value['ten_sach']; ?></a></h4>
											<ul class="prize d-flex">
												<li><?php echo number_format($value['gia']); ?></li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<form action="" method="post">
														<li><a class="cart" href="?action=them_vao_gio&amp;id_sach=<?php echo $value['id_sach'];?>&amp;so_luong=1"><i class="bi bi-shopping-bag4"></i></a></li>
														</form>
													</ul>
												</div>
											</div>

										</div>
		        					</div>
									<!-- Start Single Product -->
										<?php } ?>
								
							</div>

							</div>
							

        				</div>
        			</div>
        		</div>
        	</div>
        </div>