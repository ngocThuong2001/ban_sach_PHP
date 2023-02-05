<?php
ob_start();
session_start();


require("../model/gio_hang.php");
include("../view/head.php");
include("../view/header.php");
require("../model/database.php");
require("../model/sach.php");
require("../model/sach_db.php");
require("../model/the_loai.php");
require("../model/the_loai_db.php");
require("../model/tac_gia.php");
require("../model/tac_gia_db.php");
require("../model/binh_luan.php");
require("../model/thanh_vien.php");
require("../model/thanh_vien_db.php");
require("../model/footer.php");
require("../model/don_hang.php");
require("../model/banner.php");
require("../helper/url.php");
$arr_banner = banner::danh_sach_banner();



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
$uri=url::get_link($action);		

    if($action == "danh_sach_sach")
    {
		$id_the_loai = filter_input(INPUT_GET,'id_the_loai');
		if($id_the_loai == NULL || $id_the_loai == FALSE) 
		{  
			$id_the_loai=1;
		}
		$objs_the_loai = the_loai_db::danh_sach_the_loai_hien();
		$objs_sach = sach_db::sach_theo_the_loai($id_the_loai);
		$objs_tac_gia = tac_gia_db::danh_sach_tac_gia();
		$arr_top_sach = sach_db::top_ban_chay();
		include("../helper/phan_trang.php");
		$total_title = sach_db::so_sach_theo_the_loai($id_the_loai)['tong'];
		$total_page = ceil($total_title/$limit);
		$arr_sach_pt = sach_db::chon_limit($start,$limit,(int)$id_the_loai);

		include("../view/danh_sach_sach.php");


	}

	else if($action == "xem_chi_tiet")
    {
		$id_sach = filter_input(INPUT_GET,'id_sach');
		$obj_sach = sach_db::xem_chi_tiet_sach($id_sach);
		$objs_the_loai = the_loai_db::danh_sach_the_loai();
		$objs_tac_gia = tac_gia_db::danh_sach_tac_gia();
		$obj_the_loai = the_loai_db::the_loai_duoc_chon($obj_sach->getID_the_loai());
		$obj_tac_gia = tac_gia_db::tac_gia_duoc_chon($obj_sach->getID_tac_gia());
		$ten_tac_gia = tac_gia_db::getTen_tac_gia($obj_sach->getID_tac_gia());
		$ten_the_loai = the_loai_db::getTen_the_loai($obj_sach->getID_the_loai());
		$objs_sach = sach_db::sach_theo_the_loai($obj_sach->getID_the_loai());
		$arr_binh_luan = binh_luan::danh_sach_binh_luan($id_sach);
		

		include("../view/xem_chi_tiet.php");
	}

	else if($action == "them_vao_gio")
    {
		$id_sach="";
		$so_luong=0;
		if(isset($_GET['id_sach'])&&isset($_GET['so_luong']))
		{
			$id_sach= filter_input(INPUT_GET,'id_sach');
			$so_luong= filter_input(INPUT_GET,'so_luong');
		}
		else
		{
		$id_sach = filter_input(INPUT_POST,'id_sach');
		$so_luong = filter_input(INPUT_POST,'so_luong');
		}
		
		$obj_sach = sach_db::xem_chi_tiet_sach($id_sach);
		$ten_sach = $obj_sach->getTen_sach();
		$gia_sach =  $obj_sach->getGia();
		$link_anh = str_replace('../../', '../', $obj_sach->getLink_anh());
		gio_hang::them_vao_gio($id_sach,$ten_sach,$gia_sach,$so_luong,$link_anh);
		
		header("location: ?action=danh_sach_sach");
	}

	else if($action == "cap_nhat_gio_hang")
    {
		$arr_so_luong = filter_input(INPUT_POST, 'so_luong', FILTER_DEFAULT, 
		FILTER_REQUIRE_ARRAY);
	
		
		foreach($arr_so_luong as $key=> $value)
		{
			gio_hang::cap_nhat_gio_hang($key,$value);
		}
		header("location: ?action=hien_gio_hang");
		
	}

	else if($action == "cart")
    {
		
		echo"<pre>";
		print_r($_SESSION['gio_hang']);
		
	}

	else if($action == "hien_gio_hang")
    {
		
		$tong_tien=gio_hang::thanh_tien();
		include("../view/gio_hang.php");
		
	}

	else if($action == "lam_sach_gio")
    {
		unset($_SESSION['gio_hang']);
		header("location: ?action=hien_gio_hang");
	}

	else if($action == "xoa_khoi_gio")
    {
		$id_sach=filter_input(INPUT_GET,'id_sach');
		unset($_SESSION['gio_hang'][$id_sach]);
		header("location: ../view/gio_hang.php");
	}

	else if($action == "form_dang_nhap")
    {
		include("../view/form_dang_nhap.php");
	}

	else if($action == "dang_nhap")
    {		
		$email=filter_input(INPUT_POST,'email');
		$password=filter_input(INPUT_POST,'password');
		$dang_nhap = thanh_vien_db::dang_nhap($email,$password);
		
		if($dang_nhap == false)
		{
			$error[] ="Đăng nhập thất bại";
			include("../view/loi.php");
		}

		else
		{
			$thanh_vien=thanh_vien_db::thong_tin_thanh_vien($email);
			$_SESSION['id_thanh_vien']=$thanh_vien['id_thanh_vien'];
			$_SESSION['user']=$thanh_vien['ten'];
			$_SESSION['sdt']=$thanh_vien['sdt'];
			$_SESSION['dia_chi']=$thanh_vien['dia_chi'];
			$_SESSION['email']=$thanh_vien['email'];
			$_SESSION['login']=1;
			setcookie('ten',$thanh_vien['ten'], time()+6000, '/');
			if($thanh_vien['level'] == 1 )
			{
				$_SESSION['level'] =1;
				setcookie('login',1, time()+6000, '/');
				setcookie('level',1, time()+6000, '/');
				header("location: ../admin");
			}

			else if($thanh_vien['level'] ==2 )
			{
				setcookie('login',1, time()+6000, '/');
				setcookie('level',2, time()+6000, '/');
				header("location: ../admin");
				$_SESSION['level'] =2;
			}

			else if($thanh_vien['level'] ==3 )
			{
				header("location:?action=danh_sach_sach");
				$_SESSION['level'] =3;
			}

		}

		
	}

	else if($action == "dang_xuat")
    {	
		unset($_SESSION['id_thanh_vien']);	
		unset($_SESSION['user']);
		unset($_SESSION['sdt']);
		unset($_SESSION['dia_chi']);
		unset($_SESSION['email']);
		unset($_SESSION['level']);
		unset($_SESSION['login']);
		setcookie('level',1, time() - 6000, '/');
		setcookie('login',1, time()-6000, '/');
		setcookie('ten',1, time()-6000, '/');
		header("location:?action=danh_sach_sach");
	}

	else if($action == "form_dang_ky")
    {		
		include("../view/form_dang_ky.php");
	}

	else if($action == "dang_ky")
    {		
		$email= filter_input(INPUT_POST,'email');
		$password= filter_input(INPUT_POST,'password');
		$ten= filter_input(INPUT_POST,'ten');
		$sdt= filter_input(INPUT_POST,'sdt');
		$dia_chi= filter_input(INPUT_POST,'dia_chi');
		$obj_thanh_vien = new thanh_vien($email,$password,$ten,$sdt,$dia_chi);
		thanh_vien_db::them_thanh_vien($obj_thanh_vien);
		header("location:?action=danh_sach_sach");
	}

	else if($action == "form_dat_hang")
    {		
		$tong_tien=gio_hang::thanh_tien();
		include("../view/form_dat_hang.php");
	}

	else if($action == "dat_hang")
    {		
		don_hang::dat_hang();
		header("location: ?action=danh_sach_sach");
	}
	
	else if($action == "tim_kiem")
    {
		$objs_the_loai = the_loai_db::danh_sach_the_loai_hien();		
		$ten_sach=filter_input(INPUT_POST,'ten_sach');
		$objs_sach=sach_db::tim_kiem_theo_ten($ten_sach);
		include("../view/tim_kiem.php");
	}
	
	else if($action == "binh_luan")
	{
		$id_sach=filter_input(INPUT_POST,'id_sach',FILTER_VALIDATE_INT);
		$noi_dung=filter_input(INPUT_POST,'noi_dung');
		$id_thanh_vien =filter_input(INPUT_POST,'id_thanh_vien',FILTER_VALIDATE_INT);
		$star=filter_input(INPUT_POST,'star',FILTER_VALIDATE_INT);
		
		if($noi_dung=="")
		{
			$error[]="Vui lòng nhập nội dung bình luận và đánh giá";
			include("../view/loi.php");
		}
		else
		{
			binh_luan::them_binh_luan($id_sach,$id_thanh_vien,$noi_dung,$star);
			header("location: ?action=xem_chi_tiet&id_sach=$id_sach");
		}
		


	}

	include("../view/footer.php");
	ob_flush();
?>