

<body>
    <br>
    <div class="container">
        <div class="row">
         
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Quản Lý Thể Loại</h3>
                            </div>
                            <div class="col col-xs-6 text-right">
                               <a href="?action=form_them_the_loai"> <button type="button" class="btn btn-sm btn-primary btn-create">Thêm mới</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>

                                    <th class="hidden-xs">ID thể loại</th>
                                    <th>Tên thể loại</th>
                                    <th>Tổng số tác phẩm (quyển)</th>
                                    <th colspan="2"><em class="fa fa-cog"></em>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($objs_the_loai as $value)
                                    { ?>
                                <tr>

                                    <td class="hidden-xs"><?php echo $value->getID_the_loai(); ?></td>
                                    <td><?php echo $value->getTen_the_loai(); ?></td>
                                    <td><?php echo sach_db::tong_so_sach_theo_the_loai($value->getID_the_loai());  ?></td>
                                    <td >
                                    <?php if($value->getHien() ==1 ){ ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="an">
                                        <input type="hidden" name="id_the_loai" value="<?php echo $value->getID_the_loai(); ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_xoa" value="Ẩn">
                                    </form>
                                    <?php }else{?>
                                        <form action="" method="post">
                                        <input type="hidden" name="action" value="hien">
                                        <input type="hidden" name="id_the_loai" value="<?php echo $value->getID_the_loai(); ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_xoa" value="Hiện">
                                    </form>
                                    <?php }
                                     ?>
                                    </td>
                                    <td>
                                                                            
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="form_sua_the_loai">
                                        <input type="hidden" name="id_the_loai" value="<?php echo $value->getID_the_loai(); ?>">
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