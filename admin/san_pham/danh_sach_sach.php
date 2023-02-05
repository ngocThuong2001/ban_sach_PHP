




    <div class="container">
        <div class="row">
            
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <br>
                                <center><h3 class="panel-title">Quản Lý Sách</h3></center>
                            </div>
                            <div class="col col-xs-6 text-right">
                                <br>
                               <a href="?action=form_them_sach"> <button type="button" class="btn btn btn-primary btn-create">Thêm mới</button></a>
                               <br>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <br>
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>

                                    <th class="hidden-xs">ID Sách</th>
                                    <th>Tác Giả</th>
                                    <th>Thể Loại</th>
                                    <th>Tên sách</th>
                                    <th>giá Bán</th>

                                    <th>Ảnh</th>
                                    <th colspan="2"><em class="fa fa-cog"></em>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arr_sach_pt as $value)
                                    { ?>
                                <tr>

                                    <td class="hidden-xs"><?php echo $value['id_sach']; ?></td>
                                    <td><?php echo tac_gia_db::getTen_tac_gia($value['id_tac_gia'])['ten_tac_gia']; ?></td>
                                    <td><?php echo the_loai_db::getTen_the_loai($value['id_the_loai'])['ten_the_loai'];  ?></td>
                                    <td><?php echo $value['ten_sach'];  ?></td>
                                    <td><?php echo number_format($value['gia']);  ?> VNĐ</td>

                                    <td><img width="200px" src="<?php echo $value['link_anh'];?>" alt=""> </td>
                                    <td >
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="xoa_sach">
                                        <input type="hidden" name="id_sach" value="<?php echo $value['id_sach']; ?>">
                                        <input type="hidden" name="link_anh" value="<?php echo $value['link_anh']; ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_xoa" value="Xóa">
                                    </form>
                                    </td>
                                    <td>
                                                                            
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="form_sua_sach">
                                        <input type="hidden" name="id_sach" value="<?php echo $value['id_sach']; ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_sua" value="Sửa">
                                        
                                    </form>
                                    </td>
                                </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col col-xs-8">
                                <ul class="pagination hidden-xs pull-right">
                                <?php for($i = 1; $i <= $total_page; $i++){ ?>
	        						<li><a href=".?action=danh_sach_sach&amp;page=<?php echo $i;?>"><?php echo "|"?><?php echo $i;?></a></li>
									<?php } ?>
	        						<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
