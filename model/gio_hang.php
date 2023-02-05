<?php
class gio_hang
{
    public function them_vao_gio($id_sach,$ten_sach,$gia_tien,$so_luong,$link_anh)
    {
        if(isset($_SESSION['gio_hang'][$id_sach]))
            {
                $_SESSION['gio_hang'][$id_sach]['so_luong'] += $so_luong;
            }
        else    
            {
                $_SESSION['gio_hang'][$id_sach]=array('id_sach' => $id_sach,
                'link_anh' => $link_anh,
                'ten_sach' => $ten_sach,'gia_tien' => $gia_tien,
                'so_luong' => $so_luong,
                'thanh_tien' => $so_luong*$gia_tien);
            }    


    }
    public function cap_nhat_gio_hang($id_sach,$so_luong)
    {
        $so_luong = (int)($so_luong); 

        if(isset($_SESSION['gio_hang'][$id_sach]))
            {
                if($so_luong <= 0)
                    {
                        unset($_SESSION['gio_hang'][$id_sach]['so_luong']);

                    }
                else
                    {
                        $_SESSION['gio_hang'][$id_sach]['so_luong']=$so_luong;
                        $_SESSION['gio_hang'][$id_sach]['thanh_tien']=$so_luong*sach_db::gia_sach($id_sach)['gia'];
                        
                    }    
            }

    }    
    public function thanh_tien()
    {
        $thanh_tien=0;
        if(isset($_SESSION['gio_hang']))
        {
        foreach($_SESSION['gio_hang'] as $key => $value )
            {
                $thanh_tien += $value['gia_tien']*$value['so_luong'];
            }
            return $thanh_tien;
        }
    } 
    
    public function xoa_khoi_gio_hang($id_sach)
    {
        unset($_SESSION['gio_hang'][$id_sach]);
    }
}
?>