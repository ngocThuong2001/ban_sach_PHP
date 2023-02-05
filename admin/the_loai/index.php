<?php
ob_start();

require("../../model/database.php");
require("../../model/sach.php");
require("../../model/sach_db.php");
require("../../model/the_loai.php");
require("../../model/the_loai_db.php");
require("../../model/tac_gia.php");
require("../../model/tac_gia_db.php");
require("../../model/don_hang.php");
require("../../model/thanh_vien.php");
require("../../model/thanh_vien_db.php");
include("../view/head.php");
include("../view/side_bar.php");
include("../view/header.php");

//lấy giá trị của biến action để điều hướng
$action= filter_input(INPUT_POST, 'action');
    if($action == NULL)
        {
            $action=filter_input(INPUT_GET, 'action');
            if($action== NULL)
                {
                    $action='danh_sach_the_loai';
                } 
        }
    
    if($action == "danh_sach_the_loai")
    {

        $objs_the_loai = the_loai_db :: danh_sach_the_loai();
        include("danh_sach_the_loai.php");
        
    }

    else if($action=="form_them_the_loai")
    {
        include("form_them_the_loai.php");
    }

    else if($action=="them_the_loai")
    {
        //lấy tên thể loại từ trong form ở trang them_the_loai.php
        $ten_the_loai = filter_input(INPUT_POST,'ten_the_loai');
       //tạo đối tượng thể loại mới
        echo $ten_the_loai;
       
        $obj_the_loai= new the_loai($ten_the_loai);
        the_loai_db :: them_the_loai($obj_the_loai);
        
        header("location:?action=danh_sach_the_loai");
        
    }

    else if($action=="form_sua_the_loai")
    {
        $id_the_loai = filter_input(INPUT_POST,'id_the_loai');
        $obj_the_loai = the_loai_db::the_loai_duoc_chon($id_the_loai);
        include("form_sua_the_loai.php");
    }
    else if($action=="sua_the_loai")
    {
        $id_the_loai = filter_input(INPUT_POST,'id_the_loai');
        $obj_the_loai = the_loai_db::the_loai_duoc_chon($id_the_loai);
        

        
    }
    else if($action=="hien")
    {
        $id_the_loai = filter_input(INPUT_POST,'id_the_loai');
        the_loai_db::hien_the_loai($id_the_loai);
        header("location: ?action=danh_sach_the_loai");
    }
    else if($action=="an")
    {
        $id_the_loai = filter_input(INPUT_POST,'id_the_loai');
        the_loai_db::an_the_loai($id_the_loai);
        header("location: ?action=danh_sach_the_loai");
    }
    else if($action=="xoa_the_loai")
    {
        $id_the_loai = filter_input(INPUT_POST,'id_the_loai');
    }

    include("../view/footer.php");
    ob_flush();
?>