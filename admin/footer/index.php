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
                    $action='noi_dung_footer';
                } 
        }

    if($action == "noi_dung_footer")
    {

        $noi_dung_footer=footer::noi_dung_footer();
        include("noi_dung_footer.php");

    }  
    else if($action == "sua_footer")
    {
        $noi_dung = filter_input(INPUT_POST,'noi_dung_footer');
        footer::sua_footer($noi_dung);
        header("location: .?action=noi_dung_footer");
    }  
    
  
include("../view/footer.php");
ob_flush();
?>

