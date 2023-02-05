<br>
<body>
    <div class="container">
        <div class="row">
           
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Quản Lý Tác Giả</h3>
                            </div>
                            <div class="col col-xs-6 text-right">
                               <a href="?action=form_them_tac_gia"> <button type="button" class="btn btn-sm btn-primary btn-create">Thêm mới</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>

                                    <th class="hidden-xs">ID tác giả</th>
                                    <th>Tên tác giả</th>
                                    <th>Bút danh</th>
                                    <th>Ngày sinh</th>
                                    <th>Quê quán</th>
                                    <th>Ảnh</th>
                                    <th colspan="2"><em class="fa fa-cog"></em>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($objs_tac_gia as $value)
                                    { ?>
                                <tr>

                                    <td class="hidden-xs"><?php echo $value->getID_tac_gia(); ?></td>
                                    <td><?php echo $value->getTen_tac_gia(); ?></td>
                                    <td><?php echo $value->getBut_danh();  ?></td>
                                    <td><?php echo $value->getNgay_sinh();  ?></td>
                                    <td><?php echo $value->getQue_quan();  ?></td>
                                    <td><img width="200px" src="<?php echo $value->getLink_anh();?>" alt=""></td>
                                    <td >
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="xoa_tac_gia">
                                        <input type="hidden" name="id_the_loai" value="<?php echo $value->getID_tac_gia(); ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_xoa" value="Xóa">
                                    </form>
                                    </td>
                                    <td>
                                                                            
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="sua_tac_gia">
                                        <input type="hidden" name="id_the_loai" value="<?php echo $value->getID_tac_gia(); ?>">
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