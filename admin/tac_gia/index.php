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
                    $action='danh_sach_tac_gia';
                } 
        }

    if($action == "danh_sach_tac_gia")
    {
        
         
        $objs_tac_gia = tac_gia_db::danh_sach_tac_gia();
        
        include("danh_sach_tac_gia.php"); 
    }  
    else if($action == "form_them_tac_gia")
    {
        include("form_them_tac_gia.php");
    }  
    else if($action == "them_tac_gia")
    {
        $ten_tac_gia = filter_input(INPUT_POST , 'ten_tac_gia');
        $but_danh = filter_input(INPUT_POST , 'but_danh');
        $ngay_sinh = filter_input(INPUT_POST , 'ngay_sinh');
        $que_quan = filter_input(INPUT_POST , 'que_quan');
       
    
        $new_id = tac_gia_db::max_id_tac_gia() + 1 ;
        $target_dir ="../../images/tac_gia/";
        $error = array();
        $check=array();
        $trung_ten = 0;
        $check=tac_gia_db::check_trung_ten_tac_gia($ten_tac_gia);
        if(!empty($check)) {$trung_ten =1;} 
        $target_file = $target_dir . $new_id . ".jpg"; 
        
        $file_type = pathinfo($_FILES['file_anh']['name'], PATHINFO_EXTENSION);
        echo $ten_tac_gia ."<br>". $but_danh ."<br>". $ngay_sinh ."<br>".$que_quan."<br>".$_FILES['file_anh']['name'] ;

        move_uploaded_file($_FILES['file_anh']['tmp_name'],$target_file);



            $tac_gia_moi = new tac_gia($ten_tac_gia,
            $but_danh,
            $ngay_sinh,
            $que_quan,
            $target_file);
            tac_gia_db::them_tac_gia($tac_gia_moi);
            header("location:?action=danh_sach_tac_gia");
 

        
    }  
    else if($action == "xoa_tac_gia")
    {
        //CHÚ Ý DÙNG POST 'id_sach'
    }  
    else if($action == "sua_tac_gia")
    {}  
    include("../view/footer.php");
    ob_flush();
?>

<br>