<?php include("slider.php"); ?>
<div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                            <img src="<?php echo(str_replace('../../', '', $obj_sach->getLink_anh())); ?>" alt=""></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1><?php echo $obj_sach->getTen_sach() ?></h1>

        								<div class="price-box">
        									<span>$52.00</span>
        								</div>
										<div class="product__overview">
                                            <?php echo $obj_sach->getNoi_dung(); ?>
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

										<div class="product_meta">
											<span class="posted_in">Thể Loại: 
												<a href="?action=danh_sach_sach&amp;id_the_loai=<?php $obj_the_loai->getID_the_loai(); ?>"><?php echo $obj_the_loai->getTen_the_loai(); ?></a>
											</span>
                                        </div>
                                        
                                        <div class="product_meta">
											<span class="posted_in">Tác Giả: 
												<a href="#"><?php echo $obj_tac_gia->getTen_tac_gia(); ?></a>

											</span>
										</div>
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

        			</div>
        			<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
                                <h3 class="wedget__title">Thể loại sách</h3>

        						<ul>
                                <?php foreach($objs_the_loai as $value)
                                        {
                                ?>
                                    <li><a href="#"><?php echo $value->getTen_the_loai(); ?></a></li>
                                <?php 
                                        }
                                ?>            
                                </ul>
                                
                            </aside>
                            
                            <aside class="wedget__categories poroduct--cat">
                                <h3 class="wedget__title">Tác Giả</h3>

        						<ul>
                                <?php foreach($objs_tac_gia as $value)
                                        {
                                ?>
                                    <li><a href="#"><?php echo $value->getTen_tac_gia(); ?></a></li>
                                <?php 
                                        }
                                ?>            
                                </ul>
                                
							</aside>


							
        					<aside class="wedget__categories pro--range">
        						<h3 class="wedget__title">Chọn sách theo giá</h3>
        						<div class="content-shopby">
        						    <div class="price_filter s-filter clear">
        						        <form action="#" method="GET">
        						            <div id="slider-range"></div>
        						            <div class="slider__range--output">
        						                <div class="price__output--wrap">
        						                    <div class="price--output">
        						                        <span>Price :</span><input type="text" id="amount" readonly="">
        						                    </div>
        						                    <div class="price--filter">
        						                        <a href="#">Filter</a>
        						                    </div>
        						                </div>
        						            </div>
        						        </form>
        						    </div>
        						</div>
        					</aside>
        					<aside class="wedget__categories poroduct--compare">
        						<h3 class="wedget__title">Compare</h3>
        						<ul>
        							<li><a href="#">x</a><a href="#">Condimentum posuere</a></li>
        							<li><a href="#">x</a><a href="#">Condimentum posuere</a></li>
        							<li><a href="#">x</a><a href="#">Dignissim venenatis</a></li>
        						</ul>
        					</aside>
        					<aside class="wedget__categories poroduct--tag">
        						<h3 class="wedget__title">Product Tags</h3>
        						<ul>
        							<li><a href="#">Biography</a></li>
        							<li><a href="#">Business</a></li>
        							<li><a href="#">Cookbooks</a></li>
        							<li><a href="#">Health & Fitness</a></li>
        							<li><a href="#">History</a></li>
        							<li><a href="#">Mystery</a></li>
        							<li><a href="#">Inspiration</a></li>
        							<li><a href="#">Religion</a></li>
        							<li><a href="#">Fiction</a></li>
        							<li><a href="#">Fantasy</a></li>
        							<li><a href="#">Music</a></li>
        							<li><a href="#">Toys</a></li>
        							<li><a href="#">Hoodies</a></li>
        						</ul>
        					</aside>
        					<aside class="wedget__categories sidebar--banner">
								<img src="images/others/banner_left.jpg" alt="banner images">
								<div class="text">
									<h2>new products</h2>
									<h6>save up to <br> <strong>40%</strong>off</h6>
								</div>
        					</aside>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>