




    <div class="container">
        <div class="row">
            
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-xs-6">
                                <h3 class="panel-title">Quản Lý Banner</h3>
                            </div>
                            <div class="col col-xs-6 text-right">
                                <br>
                               <a href="?action=form_them_banner"> <button type="button" class="btn btn-sm btn-primary btn-create">Thêm mới</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>

                                    <th class="hidden-xs">ID Banner</th>
                                    <th>Ảnh</th>
                                    <th colspan="2"><em class="fa fa-cog"></em>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arr_banner as $value)
                                    { ?>
                                <tr>

                                    <td class="hidden-xs"><?php echo $value['id_banner']; ?></td>
                                    <td><img width="200px" src="<?php echo $value['link_anh'];?>" alt=""></td>
                                    <td >
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="xoa_banner">
                                        <input type="hidden" name="id_banner" value="<?php echo $value['id_banner']; ?>">
                                        <input class="btn btn-outline-success btn-sm" type="submit" name="btn_xoa" value="Xóa">
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
