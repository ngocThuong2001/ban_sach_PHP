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
require("../../model/footer.php");
require("../../model/thanh_vien.php");
require("../../model/thanh_vien_db.php");
require("../../model/banner.php");

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
                    $action='danh_sach_banner';
                } 
        }

    if($action == "danh_sach_banner")
    {

        $arr_banner = banner::danh_sach_banner();
        include("danh_sach_banner.php");

    }  
    else if($action == "form_them_banner")
    {
        include("form_them_banner.php");
    }  
    else if($action == "them_banner")
    {

        $new_id = banner::max_id_banner() + 1 ;
        $target_dir ="../../images/banner/";
        $error = array();
        $target_file = $target_dir . $new_id . ".jpg"; 
        $file_type = pathinfo($_FILES['file_anh']['name'], PATHINFO_EXTENSION);
        $file_allow= array('jpg','jpeg','gif','png');
        
        if(!isset($_FILES['file_anh']))
        {
            $error[]="Vui lòng Upload ảnh";
        }

        if($_FILES['file_anh']['size'] > 10485760 ) 
        {
            $error[]="Dung lượng ảnh quá lớn!!!!!";

        }

        if(!in_array(strtolower($file_type),$file_allow))
        {
            $error[]="Chỉ hỗ trợ loại file(.png .jpg .gif .jpeg)!!!!!";
        
        }

        if(!move_uploaded_file($_FILES['file_anh']['tmp_name'],$target_file))
        {
            $error[] = "Upload file ảnh thất bại";
        }

        if(!empty($error))
        {
            include("../../view/loi.php");
            return;
        }
        else
        {
            banner::them_banner($target_file);
            header("location: .?action=danh_sach_banner");
        }

        
    }  
    else if($action == "xoa_banner")
    {
        $id_banner =filter_input(INPUT_POST,'id_banner',FILTER_VALIDATE_INT);
        $banner = banner::chi_tiet_banner($id_banner);
        banner::xoa_banner($id_banner);
        $link_anh= $banner['link_anh'];
        unlink($link_anh);
        header("location: .?action=danh_sach_banner");
    }  
  
include("../view/footer.php");
ob_flush();
?>

