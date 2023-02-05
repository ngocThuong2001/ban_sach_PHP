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
                    $action='danh_sach_don_hang';
                } 
        }

    if($action == "danh_sach_don_hang")
    {

        $arr_don_hang = don_hang::danh_sach_don_hang();
        include("danh_sach_don_hang.php");

    }
    
    else if($action == "xu_ly_don_hang")
    {
        $id_don_hang = filter_input(INPUT_POST,'id_don_hang');
        $trang_thai = filter_input(INPUT_POST,'trang_thai');
        don_hang::xu_ly_don_hang($trang_thai,$id_don_hang);
        header("location: .?action=danh_sach_don_hang");
    } 
  
  
include("../view/footer.php");
ob_flush();
?>

