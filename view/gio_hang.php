<?php
include("link.php");
?>
<section class="wn__product__area brown--color pt--80  pb--30">				
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2"><span class="color--theme">Giỏ Hàng</span></h2>
							<p>Nơi bạn tiến hành thanh toán</p>
						</div>
					</div>
				</div>
		</section>	
<div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="" method="post">               
                            <div class="table-content wnro__table table-responsive">
                                
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Ảnh</th>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Thành tiền</th>
                                            <th class="product-remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($_SESSION['gio_hang'])){
                                        foreach($_SESSION['gio_hang'] as $value)
                                        {
                                        ?>
                                        <tr>
                                            <input type="hidden" name="id_sach" value="<?php echo $value['id_sach']; ?>">
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo $value['link_anh'];  ?>" alt="ảnh sản phẩm"></a></td>
                                            <td class="product-name"><a href="#"><?php echo $value['ten_sach']; ?></a></td>
                                            <td class="product-price"><span class="amount"><?php echo number_format($value['gia_tien']); ?> VNĐ</span></td>
                                            <td class="product-quantity"><input type="number" name="so_luong[<?php echo $value['id_sach']; ?>]" value="<?php echo $value['so_luong']; ?>"></td>
                                            <td class="product-subtotal"><?php echo number_format( $value['gia_tien']*$value['so_luong']); ?> VNĐ</td>
                                            <td class="product-remove"><a href="?action=xoa_khoi_gio&amp;id_sach=<?php echo $value['id_sach']; ?>">Xóa</a></td>
                                        </tr>
                                        <?php
                                        }
                                    
                                        ?>        
                                        <tr>
                                        <td class="product-name" colspan="4"><a href="#">Tổng tiền</a></td>
                                        <td class="product-name" colspan="2"><a href="#"><?php echo number_format($tong_tien); ?> VNĐ</a></td>
                                        </tr>
                                        <?php
                                        
                                    }
                                        ?> 

                                    </tbody>
                                </table>
                               

                            </div>
                        
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li class="btn btn-outline-success btn-sm" ><a href="?action=lam_sach_gio">Xóa tất cả</a></li>
                                <input type="hidden" name="action" value="cap_nhat_gio_hang">
                                <input class="btn btn-outline-success btn-sm" type="submit" name="btn_sua" value="Cập Nhật">
                                <li class="btn btn-outline-success btn-sm"><a href="?action=form_dat_hang">Đặt Hàng</a></li>
                            </ul>
                        </div>
                        </form> 
                    </div>
                </div>
            </div>  
        </div>