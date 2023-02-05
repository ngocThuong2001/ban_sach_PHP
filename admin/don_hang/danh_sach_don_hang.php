

<body>
    <br>
    <div class="container">
        <div class="row">
         
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Quản Lý Đơn Hàng</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>

                                    <th class="hidden-xs">Mã đơn hàng</th>
                                    <th>Người nhận</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Chi tiết</th>
                                    <th>Trạng Thái</th>
                                    <th colspan="2">Xử Lý<em class="fa fa-cog"></em>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arr_don_hang as $value)
                                    { 
                                        $arr_chi_tiet=don_hang::chi_tiet_don_hang($value['ma_don_hang']);
                                ?>
                                <tr>
                                    
                                    <td class="hidden-xs"><?php echo $value['ma_don_hang']; ?></td>
                                    <td><?php echo $value['nguoi_nhan']; ?></td>
                                    <td><?php echo $value['sdt']; ?></td>
                                    <td><?php echo $value['dia_chi']; ?></td>
                                    <td><?php echo $value['ngay_tao']; ?></td>
                                    <td><?php echo $value['tong_tien']; ?></td>
                                    <td>
                                    <?php foreach($arr_chi_tiet as $chi_tiet) {?>
                                        <?php echo sach_db::getTen_sach($chi_tiet['id_sach'])['ten_sach']; ?> x <?php echo $chi_tiet['so_luong']."<br>"; ?>
                                    <?php }?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($value['trang_thai'] ==0){echo "Chưa xử lý";}
                                            if($value['trang_thai'] ==1){echo "Đã xử lý";}
                                            if($value['trang_thai'] ==2){echo "Đã hủy";}
                                        ?>
                                    </td>    
                                    <td >

                                    <?php if($value['trang_thai'] == 0 ){ ?>
                                    
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="xu_ly_don_hang">
                                        <input type="hidden" name="trang_thai" value="1">
                                        <input type="hidden" name="id_don_hang" value="<?php echo $value['id_don_hang']; ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_xoa" value="Duyệt Đơn Hàng">
                                    </form>

                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="xu_ly_don_hang">
                                        <input type="hidden" name="trang_thai" value="2">
                                        <input type="hidden" name="id_don_hang" value="<?php echo $value['id_don_hang']; ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_xoa" value="Hủy Đơn Hàng">
                                    </form>
                                    <?php } else if($value['trang_thai'] == 1 ){?>


                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="xu_ly_don_hang">
                                        <input type="hidden" name="trang_thai" value="2">
                                        <input type="hidden" name="id_don_hang" value="<?php echo $value['id_don_hang']; ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_xoa" value="Hủy Đơn Hàng">
                                    </form>

                                     <?php } else if($value['trang_thai'] == 2 ){?>


                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="xu_ly_don_hang">
                                        <input type="hidden" name="trang_thai" value="1">
                                        <input type="hidden" name="id_don_hang" value="<?php echo $value['id_don_hang']; ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_xoa" value="Khôi Phục Đơn Hàng">
                                    </form>
                                    <?php
                                     } 
                                     ?>

                                    </td>

                                </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-xs-4">Trang 1 của 5 </div>
                            <div class="col col-xs-8">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">1</a>
                                    </li>
                                    <li><a href="#">2</a>
                                    </li>
                                    <li><a href="#">3</a>
                                    </li>
                                    <li><a href="#">4</a>
                                    </li>
                                    <li><a href="#">5</a>
                                    </li>
                                </ul>
                                <ul class="pagination visible-xs pull-right">
                                    <li><a href="#">«</a>
                                    </li>
                                    <li><a href="#">»</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>