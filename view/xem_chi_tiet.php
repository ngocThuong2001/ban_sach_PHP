<?php
include("link.php");
?>

<div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
										<a href=""><img src="<?php echo(str_replace('../../', '../', $obj_sach->getLink_anh())); ?>" alt=""></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1><?php echo $obj_sach->getTen_sach(); ?></h1>
        								<div class="product-reviews-summary d-flex">
        									<ul class="rating-summary d-flex">
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
        									</ul>
        								</div>
        								<div class="price-box">
        									<span><?php echo number_format($obj_sach->getGia()); ?> VNĐ</span>
        								</div>
										<div class="product__overview">
											<p>Thể Loại: <?php echo $ten_the_loai['ten_the_loai']; ?> </p>
        									<p>Tác Giả: <?php echo $ten_tac_gia['ten_tac_gia']; ?></p>
        									
        								</div>
										<form action="?action=them_vao_gio" method="post">
        								<div class="box-tocart d-flex">
        									<span>Số lượng</span>
                                            <input id="qty" class="input-text qty" name="so_luong" min="1" value="1" title="Qty" type="number">
                                            <input type="hidden" name="action" value="them_vao_gio">
                                            <input type="hidden" name="id_sach" value="<?php echo $obj_sach->getID_sach(); ?>">
        									<div class="addtocart__actions">
        										<input class="tocart" type="submit" value="Thêm vào giỏ hàng">
        									</div>
                                        </div>
                                        </form>
										<div class="product-share">
											<ul>
												<li class="categories-title">Share :</li>
												<li>
													<a href="#">
														<i class="icon-social-twitter icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-tumblr icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-facebook icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-linkedin icons"></i>
													</a>
												</li>
											</ul>
										</div>
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Đọc Thử</a>
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
										<p><?php echo $obj_sach->getNoi_dung(); ?></p>

									</div>
								</div>
								
								<!-- Start Single Tab Content -->
	                        	<!-- End Single Tab Content -->
	                        	<!-- Start Single Tab Content -->
	                        	<!-- End Single Tab Content -->
	                        </div>
						</div>
						<?php if(isset($_SESSION['login'])   && $_SESSION['level'] == 3 && don_hang::kiem_tra_sach_da_mua($id_sach,$_SESSION['id_thanh_vien']) == true) {?>
						<div class="comment_respond">
								<h3 class="reply_title">Để lại bình luận <small><a href="#"></a></small></h3>
								<form class="comment__form" method="post" action="">
									<div class="stars">
    									<input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
    									<label class="star star-5" for="star-5"></label>
    									<input class="star star-4" id="star-4" type="radio" name="star"  value="4"/>
    									<label class="star star-4" for="star-4"></label>
    									<input class="star star-3" id="star-3" type="radio" name="star"  value="3"/>
    									<label class="star star-3" for="star-3"></label>
    									<input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
    									<label class="star star-2" for="star-2"></label>
    									<input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
    									<label class="star star-1" for="star-1"></label>

									</div>
									<div class="input__box">
										<label>Bình Luận</label>
										<textarea name="noi_dung"></textarea>
									</div>
									<div class="submite__btn">
									<input class="btn btn-primary btn-lg" type="submit" name="btn_binh_luan" value="Bình Luận">
									<input type="hidden" name="action" value="binh_luan">
									<input type="hidden" name="id_sach" value="<?php echo $obj_sach->getID_sach(); ?>">
									<input type="hidden" name="id_thanh_vien" value="<?php echo $_SESSION['id_thanh_vien']; ?>">
									</div>
								</form>
						</div>
						<?php } ?>
						<?php  if(isset($_SESSION['login']) && $_SESSION['level'] == 3 && don_hang::kiem_tra_sach_da_mua($id_sach,$_SESSION['id_thanh_vien'] )== false) {?>
						<div class="comment_respond">
								<h3 class="reply_title">Bình luận <small><a href="?action=form_dang_nhap">Bạn chưa mua sản phẩm nên chưa thể bình luận</a></small></h3>

						</div>
						<?php } ?>
						<?php  if(!isset($_SESSION['login'])) {?>
						<div class="comment_respond">
								<h3 class="reply_title">Bình luận <small><a href="?action=form_dang_nhap">Bạn chưa đăng nhập, bấm vào đây để đăng nhập</a></small></h3>

						</div>	
						<?php } ?>
						
						<div class="wn__related__product pt--80 pb--50">
							<div class="section__title text-center">
								<h2 class="title__be--2">Sách cùng thể loại</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
									<?php foreach($objs_sach as $value){ ?>
									<!-- Start Single Product -->
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
											<a class="first__img" href="?action=xem_chi_tiet&amp;id_sach=<?php echo $value->getID_sach(); ?>"><img height="300px" src="<?php echo str_replace("../../","../",$value->getLink_anh()); ?>" alt="product image"></a>
										</div>
										<div class="product__content content--center">
											<h4><a href="def.php"><?php echo $value->getTen_sach(); ?></a></h4>
											<ul class="prize d-flex">
												<li><?php echo number_format($value->getGia()); ?></li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<form action="" method="post">
														<li><a class="cart" href="?action=them_vao_gio&amp;id_sach=<?php echo $value->getID_sach();?>&amp;so_luong=1"><i class="bi bi-shopping-bag4"></i></a></li>
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
						<div class="wn__related__product">
							<div class="section__title text-center">
								<h2 class="title__be--2">upsell products</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
									<!-- Start Single Product -->
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
											<a class="first__img" href="single-product.html"><img src="images/books/1.jpg" alt="product image"></a>
											<a class="second__img animation1" href="single-product.html"><img src="images/books/2.jpg" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="single-product.html">robin parrish</a></h4>
											<ul class="prize d-flex">
												<li>$35.00</li>
												<li class="old_prize">$35.00</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
									<!-- Start Single Product -->
								</div>
							</div>
						</div>
        			</div>
        			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Thể loại</h3>
        						<ul>
									<?php foreach($objs_the_loai as $value){ ?>
        							<li><a href="?action=danh_sach_sach&amp;id_the_loai=<?php $value->getID_the_loai(); ?>"><?php echo $value->getTen_the_loai(); ?></a></li>
									<?php } ?>
								</ul>
        					</aside>


							<aside class="widget comment_widget">
								<h3 class="widget-title">Bình Luận</h3>

								
								<ul>

								<?php foreach($arr_binh_luan as $value){ ?>
									<li>
										<div class="post-wrapper">
											<div class="thumb">
												<img src="../images/blog/comment/1.jpeg" alt="Comment images">
											</div>
											<div class="stars">
												<?php for($i = 0; $i < $value['star'];$i++){ ?>
													<label class="star star-<?php echo $i; ?>" for="star-<?php echo $i; ?>"></label>
												<?php } ?>	
											</div>
											<div class="content">
												<p><?php echo $value['ten']; ?>:</p>
												<?php echo $value['noi_dung']; ?>
											</div>

										</div>

									</li>	
								<?php } ?>	

								</ul>


							</aside>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>