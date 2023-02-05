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
                    $action='danh_sach_sach';
                } 
        }

    if($action == "danh_sach_sach")
    {
        //////////CHÚ Ý DÙNG GET HOẶC POST
        $id_the_loai = filter_input(INPUT_GET , 'id_the_loai', FILTER_VALIDATE_INT);
        $objs_sach = sach_db::danh_sach_sach();
        include("../../helper/phan_trang.php");
        $total_title = sach_db::tong_so_sach()['tong'];
		$total_page = ceil($total_title/$limit);
        $arr_sach_pt = sach_db::chon_limit_full($start,$limit);
        echo $total_title.$total_page;
        include("danh_sach_sach.php");

    }  
    else if($action == "form_them_sach")
    {
        $objs_the_loai= the_loai_db::danh_sach_the_loai();
        $objs_tac_gia = tac_gia_db::danh_sach_tac_gia();
        include("form_them_sach.php");
    }  
    else if($action == "them_sach")
    {
        $id_the_loai = filter_input(INPUT_POST , 'id_the_loai');
        $ten_sach = filter_input(INPUT_POST , 'them_ten_sach');
        $gia_sach = filter_input(INPUT_POST , 'them_gia_sach');
        $id_tac_gia = filter_input(INPUT_POST , 'id_tac_gia');
        $noi_dung = filter_input(INPUT_POST,'noi_dung');

        echo sach_db::max_id_sach();
        
        $new_id = sach_db::max_id_sach() + 1 ;
        $target_dir ="../../images/sach/";
        $error = array();
        $check=array();
        $trung_ten = 0;
        $check=sach_db::check_trung_ten_sach($ten_sach);
        if(!empty($check)) {$trung_ten =1;} 
        $target_file = $target_dir . $new_id . ".jpg"; 
        
        $file_type = pathinfo($_FILES['file_anh']['name'], PATHINFO_EXTENSION);
   
        $file_allow= array('jpg','jpeg','gif','png');
        if($trung_ten==1)
        {
            $error[]="Tên sản phẩm đã tồn tại";
       
        }

        if($_FILES['file_anh']['size'] > 10485760 ) 
        {
            $error[]="Dung lượng ảnh quá lớn!!!!!";
 
        }

        if(!in_array(strtolower($file_type),$file_allow))
        {
            $error[]="Chỉ hỗ trợ loại file(.png .jpg .gif .jpeg)!!!!!";
        
        }


        if($id_the_loai == NULL)
        {
            $error[]="Vui lòng điền thông tin thể loại!!";
          
        }

        if($ten_sach == NULL)
        {
            $error[]="Vui lòng điền tên sách!!";
            
        }

        if($gia_sach == NULL)
        {
            $error[]="Vui lòng điền giá sách!!";
            
        }

        if($id_tac_gia == NULL)
        {
            $error[]="Vui lòng điền chú thích cho sách";
           
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
            $sach_moi = new sach($id_the_loai,
            $ten_sach,
            $id_tac_gia,
            $gia_sach,
            $target_file,
            $noi_dung);
            sach_db::them_sach($sach_moi);
            header("location: .?id_the_loai=$id_the_loai");
        }
        
        
    }  
    else if($action == "xoa_sach")
    {
        $id_sach =filter_input(INPUT_POST,'id_sach',FILTER_VALIDATE_INT);
        $link_anh=filter_input(INPUT_POST,'link_anh');
        echo $id_sach."<br>".$link_anh;
        sach_db::xoa_sach($id_sach);
        unlink($link_anh);
        header("location: ?action=danh_sach_sach");
        

    }
    else if($action == "form_sua_sach")
    {
        $objs_the_loai= the_loai_db::danh_sach_the_loai();
        $objs_tac_gia = tac_gia_db::danh_sach_tac_gia();
        $id_sach = filter_input(INPUT_POST,'id_sach');
        $obj_sach=sach_db::xem_chi_tiet_sach($id_sach);
        include("form_sua_sach.php");
    }   
    else if($action == "sua_sach")
    {
        $id_tac_gia=filter_input(INPUT_POST,'id_tac_gia',FILTER_VALIDATE_INT);
        $noi_dung=filter_input(INPUT_POST,'noi_dung');
        $id_sach =filter_input(INPUT_POST,'id_sach',FILTER_VALIDATE_INT);
        $ten_sach =filter_input(INPUT_POST,'ten_sach');
        $id_the_loai =filter_input(INPUT_POST,'id_the_loai',FILTER_VALIDATE_INT);
        $gia_sach =filter_input(INPUT_POST,'gia_sach',FILTER_VALIDATE_INT);
        $obj_sach_cu = sach_db::xem_chi_tiet_sach($id_sach);
        $target_file="";
        $target_dir ="../../images/sach/";
       
        echo $_FILES['file_anh']['name'] == "";
        echo "<pre>";
        print_r($_FILES);
        
        if($_FILES['file_anh']['name'] == "")
        {
            $target_file=$obj_sach_cu->getLink_anh();
            
            
        }
        else
        {
            $target_file = $target_dir . $id_sach . ".jpg"; 
            unlink($target_file);
        }
        
         
        
        $error = array();



        
        $file_type = pathinfo($_FILES['file_anh']['name'], PATHINFO_EXTENSION);
   
        $file_allow= array('jpg','jpeg','gif','png');


        if($_FILES['file_anh']['size'] > 10485760 ) 
        {
            $error[]="Dung lượng ảnh quá lớn!!!!!";
 
        }




        if($id_the_loai == NULL)
        {
            $error[]="Vui lòng điền thông tin thể loại!!";
          
        }

        if($ten_sach == NULL)
        {
            $error[]="Vui lòng điền tên sách!!";
            
        }

        if($gia_sach == NULL)
        {
            $error[]="Vui lòng điền giá sách!!";
            
        }

        if($id_tac_gia == NULL)
        {
            $error[]="Vui lòng điền chú thích cho sách";
           
        }

        if($_FILES['file_anh']['name'] != "")
        {
            if(!move_uploaded_file($_FILES['file_anh']['tmp_name'],$target_file))
            {
                $error[] = "Upload file ảnh thất bại";
            }
        }


        if(!empty($error))
        {
            include("../../view/loi.php");
            return;
        }
        else
        {
            $sach_moi = new sach($id_the_loai,
            $ten_sach,
            $id_tac_gia,
            $gia_sach,
            $target_file,
            $noi_dung);
            $sach_moi->setID_sach($id_sach);
            sach_db::sua_sach($sach_moi);
            header("location: .?id_the_loai=$id_the_loai");
        }
     
       
        
    }  
  
include("../view/footer.php");
ob_flush();
?>

